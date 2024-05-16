@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800">Pemesanan </h1>

    <hr class="sidebar-divider">

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <strong> {{ $message }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


      <div class="card mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Pesanan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped " width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Pesanan</th>
                                <th >Tanggal</th>
                                <th >Produk</th>
                                <th class="text-center">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                               <tr>
                                <th>#</th>
                                <th>ID Pesanan</th>
                                <th >Tanggal</th>
                                <th >Produk</th>
                                <th class="text-center">Total</th>
                                <th></th>
                            </tr>

                        </tfoot>
                        <tbody>
                            @forelse ($pemesanan as $data)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> <strong>{{ $data->id }}</strong></td>
                                <td> {{ $data->created_at->translatedFormat('l, j M Y - H:i') }}</td>
                                <td>
                                    <ol>
                                          @foreach ( $data->pemesanandetails as $product )
                                        <li>
                                            {{ $product->nama }} <br>
                                            <small>
                                                ({{ $product->hargaRp }} x {{ $product->jumlah }} = {{ $product->subTotal }})
                                            </small>

                                        </li>
                                    @endforeach
                                    </ol>
                                </td>
                                <td class="text-right">{{ $data->grand_total }}</td>
                                <td class="text-right">
                                    @if($data->bukti == null)
                                        <a href={{ route('member.pemesanan.bayar', $data->id) }} class="btn btn-sm btn-primary btn-icon-split p-0">
                                            <span class="text"> Lanjut Bayar</span>
                                            <span class="icon text-white-50">
                                                <i class="fas fa-angle-right"></i>
                                            </span>
                                        </a>
                                        @else
                                             <a href={{ route('member.pemesanan.bayar', $data->id) }} class="btn btn-sm btn-info btn-icon-split p-0">
                                            <span class="text"> Detail </span>
                                            <span class="icon text-white-50">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </a>
                                        @endif
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-danger">
                                        There are no data.
                                    </td>
                                </tr>
                            @endforelse


                        </tbody>

                    </table>
                </div>

            </div>
        </div>
@endsection

@section('js')
@endsection
