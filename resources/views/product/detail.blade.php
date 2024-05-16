@extends('layouts.app')
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800">Detail Produk <strong> {{ $product->nama }}</strong></h1>

    <hr class="sidebar-divider">

     @if ($message = Session::get('success'))
                         <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                             <strong> {{ $message }} </strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

    <div class="row">
        <div class="col-lg-4 mb-4">
            <!-- Billing card 1-->
            <div class="card h-100 border-start-lg border-start-primary">
                <div class="card-body">
                    <img class="card-img-top img-fluid" src="{{ $product->gambar }}" alt="{{ $product->nama }}">
                    <div class="h3 pt-2">Rp. {{ $product->hargaRp }}</div>

                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4">
            <!-- Billing card 2-->
            <div class="card h-100 border-start-lg border-start-secondary">
                <div class="card-header">Informasi Product,</div>

                <div class="card-body p-0">
                    <!-- Billing history table-->
                    <div class="table-responsive table-billing-history">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>: {{ $product->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Merk</th>
                                    <td>: {{ $product->merk }}</td>
                                </tr>
                                <tr>
                                    <th>Bahan</th>
                                    <td>: {{ $product->bahan }}</td>
                                </tr>
                                <tr>
                                    <th>Ukuran</th>
                                    <td>: {{ $product->ukuran }}</td>
                                </tr>
                                <tr>
                                    <th>Stok</th>
                                    <td>: {{ $product->stok }}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>: Rp. {{ $product->hargaRp }}</td>
                                </tr>
                                <tr>
                                    <th>Satuan</th>
                                    <td>: {{ $product->satuan }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>: {{ $product->keterangan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-4">
            <!-- Billing card 3-->
            <div class="card h-100 border-start-lg border-start-success">
                <div class="card-body">



                    <div class="small text-muted">Pesan Sekarang,</div>
                    <div class="h3 d-flex align-items-center">Tertarik Dengan Produk Kami</div>

                    <form action="{{ route('member.keranjang.add') }}" method="POST">
                    @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="text">Masukkan Keranjang</span>
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">

    </div>
@endsection

@section('js')
@endsection
