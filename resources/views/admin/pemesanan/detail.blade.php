@extends('layouts.app')
@section('css')
    <style>
        .imgbukti {
            max-width: 80px;
            max-height: 80px;
        }
    </style>
@endsection
@section('content')
    <!-- Page Heading -->

    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800"> {{ $title }} </h1>
        <a href="{{ route('laporan.invoice',$pemesanan->id) }}" class="btn btn-sm btn-primary btn-icon-split p-0">

            <span class="icon text-white-50">
                <i class="fas fa-print"></i>
            </span>
            <span class="text"> Invoice </span>
        </a>

    </div>

    <hr class="sidebar-divider">




    <div class="row">
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                ID Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pemesanan->id }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hashtag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pemesanan->product_count }} Items
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Items</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pemesanan->sum_jumlah }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Bayar
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-0 font-weight-bold text-gray-800">
                                        <span class="badge badge-primary p-2">
                                            {{ $pemesanan->grand_total }}
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Pembayaran</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tanggal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pemesanan->updated_at->translatedFormat('l, j M Y H:i') }}
                            </div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Bank</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pemesanan->bank_bank }}
                            </div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Rekening</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pemesanan->bank_rekening }}
                            </div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pemilik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pemesanan->bank_pemilik }}
                            </div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Transfer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="{{ $pemesanan->bukti }}" target="_blank">
                                    <img src="{{ $pemesanan->bukti }}" class="imgbukti" alt="bukti">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Produk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped " width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Produk</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Produk</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($pemesanan->pemesanandetails as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $product->nama }} <br>
                                            <small>
                                                ({{ $product->hargaRp }} x {{ $product->jumlah }} =
                                                {{ $product->subTotal }})
                                            </small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Pemesan</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive table-billing-history">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>: {{ $pemesanan->user_nama }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: {{ $pemesanan->user_alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Telp</th>
                                    <td>: {{ $pemesanan->user_telp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>


    </div>
@endsection
