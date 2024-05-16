@extends('layouts.app')
@section('css')
    <style>
        .img-product {
            max-width: 50px;
            margin-right: 5px;
        }
    </style>
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Produk</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('product.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Baru</span>
            </a>
        </div>
        <div class="card-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <strong> {{ $message }} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th>Bahan</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th colspan="2">Ket</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th>Bahan</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th colspan="2">Ket</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td class="d-flex">
                                    <img src="{{ $product->gambar }}" alt="{{ $product->nama }}"
                                        class="img-product img-thumbnail">{{ $product->nama }}</td>
                                <td> {{ $product->merk }}</td>
                                <td> {{ $product->bahan }}</td>
                                <td> {{ $product->ukuran }}</td>
                                <td class="text-right"> {{ $product->hargaRp }}</td>
                                <td> {{ $product->satuan }}</td>
                                <td class="text-center"> {{ $product->stok }}</td>
                                <td> {{ $product->keterangan }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-info  btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" data-toggle="modal" data-target="#deleteModal"
                                        data-lock="{{ $product->id }}" class="btn btn-danger  btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-danger">
                                    There are no data.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="float-right">
                    {!! $products->links() !!}
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h3 id="cek"> Hapus Data? </h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn btn-danger btn-sm">Iya. Hapus!</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
    $( document ).ready(function() {
        $('#deleteModal').on('shown.bs.modal', function (event) {
            xLock = event.relatedTarget.getAttribute('data-lock');
            document.getElementById('deleteModal').querySelector('form').action = "{{ route('product.destroy', ':product') }}".replace(':product', xLock);
        })

    });
    </script>
@endsection
