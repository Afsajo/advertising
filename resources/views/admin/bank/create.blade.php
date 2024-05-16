@extends('layouts.app')
@section('css')
@endsection
@section('content')



    <h1 class="h3 mb-2 text-gray-800">Bank Baru</h1>
    <div class="card shadow mb-4">
         <div class="card-header py-3">
            <a href="{{ route('bank.index') }}" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-backward"></i>
                                        </span>
                                        <span class="text">Kembali</span>
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

            <form action="{{ route('bank.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="bank">Nama Bank</label>
                    <input value="{{ old('bank') }}" name="bank" id="bank" type="text" placeholder="BR*" class="form-control @error('bank') is-invalid @enderror" required>
                    @error('bank')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rekening">Rekening</label>
                    <input value="{{ old('rekening') }}" name="rekening" id="rekening" type="text" placeholder="8000*" class="form-control @error('rekening') is-invalid @enderror" required>
                    @error('rekening')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pemilik">Pemilik</label>
                    <input value="{{ old('pemilik') }}" name="pemilik" id="pemilik" type="text" placeholder="Jay***" class="form-control  @error('pemilik') is-invalid @enderror" required>
                    @error('pemilik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <hr class="sidebar-divider">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Sekarang</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
