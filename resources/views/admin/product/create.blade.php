@extends('layouts.app')
@section('css')
@endsection
@section('content')



    <h1 class="h3 mb-2 text-gray-800">Produk Baru</h1>
    <div class="card shadow mb-4">
         <div class="card-header py-3">
            <a href="{{ route('product.index') }}" class="btn btn-secondary btn-icon-split">
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

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input value="{{ old('nama') }}" name="nama" id="nama" type="text" placeholder="Spand**" class="form-control @error('nama') is-invalid @enderror" required>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="merk">Merk</label>
                    <input value="{{ old('merk') }}" name="merk" id="merk" type="text" placeholder="Inf***" class="form-control @error('merk') is-invalid @enderror" required>
                    @error('merk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bahan">Bahan</label>
                    <input value="{{ old('bahan') }}" name="bahan" id="bahan" type="text" placeholder="Fle**" class="form-control  @error('bahan') is-invalid @enderror" required>
                    @error('bahan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ukuran">Ukuran</label>
                    <input value="{{ old('ukuran') }}" name="ukuran" id="ukuran" type="text" placeholder="32x5**" class="form-control  @error('ukuran') is-invalid @enderror" required>
                    @error('ukuran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stok">Stok</label>
                    <input value="{{ old('stok') }}" name="stok" id="stok" type="number" placeholder="50**" class="form-control  @error('stok') is-invalid @enderror" required>
                    @error('stok')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga">Harga</label>
                    <input value="{{ old('harga') }}" name="harga" id="harga" type="number" placeholder="10000**" class="form-control  @error('harga') is-invalid @enderror" required>
                    @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="satuan">Satuan</label>
                    <input value="{{ old('satuan') }}" name="satuan" id="satuan" type="text" placeholder="Mete**" class="form-control  @error('satuan') is-invalid @enderror" required>
                    @error('satuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input value="{{ old('keterangan') }}" name="keterangan" id="keterangan" type="text" placeholder="-**" class="form-control  @error('keterangan') is-invalid @enderror" required>
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar">Gambar</label>
                    <input value="{{ old('gambar') }}" name="gambar" id="gambar" type="file" placeholder="Spand**" class="form-control-file  @error('gambar') is-invalid @enderror" accept=".jpeg,.png,.jpg,.gif" required>
                    @error('gambar')
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
