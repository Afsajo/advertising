@extends('layouts.app')
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Galery Produk</h1>
    <hr class="sidebar-divider">

    <div class="row">
        @forelse ($products as $data)
            <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                {{-- <a class="d-block lift rounded overflow-hidden mb-2" href="account-billing.html"><img class="img-fluid"
                        src="https://assets.startbootstrap.com/img/screenshots-product-pages/sb-admin-pro/pages/account-billing.png"
                        alt="..."></a>
                <div class="text-center small">Account - Billing</div> --}}
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ $data->gambar }}" alt="{{ $data->nama }}">
                    <div class="card-body">

                        <h5 class="card-title mb-0">{{ $data->nama }}</h5>
                        <p class="card-text">{{ $data->keterangan }}</p>
                        <div class="font-weight-bold text-primary">Rp. {{ $data->hargaRp }}</div>
                    </div>
                    <div class="card-footer">

                        <div class="float-right">
                            <a href="{{ route('guest.product.show',$data->id) }}" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                    </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center">
                <h2 class="text-danger">There are no data.</h2>
            </div>
        @endforelse
    </div>
    <hr class="sidebar-divider">
    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div>
@endsection

@section('js')
@endsection
