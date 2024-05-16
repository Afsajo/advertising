@extends('layouts.app')
@section('css')
    <style>
        .img-data {
            max-width: 50px;
        }
    </style>
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bank</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('bank.create') }}" class="btn btn-primary btn-icon-split">
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
                            <th>Bank</th>
                            <th>Rekening</th>
                            <th colspan="2">Pemilik</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Bank</th>
                            <th>Rekening</th>
                            <th colspan="2">Pemilik</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($banks as $data)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td> {{ $data->bank }}</td>
                                <td> {{ $data->rekening }}</td>
                                <td> {{ $data->pemilik }}</td>

                                <td>
                                     <div class="btn-group" role="group" aria-label="Basic example">

                                    <a href="{{ route('bank.edit', $data->id) }}"
                                        class="btn btn-info  btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" data-toggle="modal" data-target="#deleteModal"
                                        data-lock="{{ $data->id }}" class="btn btn-danger  btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                     </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-danger">
                                    There are no data.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="float-right">
                    {!! $banks->links() !!}
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
            document.getElementById('deleteModal').querySelector('form').action = "{{ route('bank.destroy', ':data') }}".replace(':data', xLock);
        })

    });
    </script>
@endsection
