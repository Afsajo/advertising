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

    <h1 class="h3 mb-2 text-gray-800"> {{ $title }} </h1>

    <hr class="sidebar-divider">

    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">
            <strong> {{ $message }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <strong> {{ $message }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


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

    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Informasi</h4>
        <ol>
            <li>Masukkan ID PESANAN di berita acara transfer saat melakukan transfer ke rekening Admin.</li>
            <li>Setelah melakukan pembayaran transfer harap segera konfirmasi bukti pembayaran ke nomor Admin : WA 0813 4537
                2617</li>
        </ol>
    </div>

    @if ($pemesanan->bukti == null)
        <form action="{{ route('member.pemesanan.bayar.store', $pemesanan->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Metode Pembayaran</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="h5 mb-0 mr-0 font-weight-bold text-gray-800">
                                <span class="badge badge-info p-2 mb-2">
                                    Nominal Transfer : {{ $pemesanan->grand_total }}
                                </span>
                            </div>
                            <div class="table-responsive table-billing-history">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            @forelse ($bank as $data)
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="bank_id"
                                                            id="bank_{{ $data->id }}" value="{{ $data->id }}"
                                                            required>
                                                        <label class="form-check-label" for="bank_{{ $data->id }}">
                                                            {{ $data->bank }} <br>
                                                            {{ $data->rekening }} <br>
                                                            {{ $data->pemilik }} <br>
                                                        </label>

                                                    </div>
                                                </td>

                                            @empty
                                                <td>Belum Tersedia</td>
                                            @endforelse
                                            @error('bank_id')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Sudah Transfer!</h4>
                        <p class="mb-1">Ayok kirim bukti tansfer anda disini.</p>
                          <div class="h5 mb-0  font-weight-bold text-gray-800">
                                <span class="badge badge-info p-2">
                                    Nominal Transfer : {{ $pemesanan->grand_total }}
                                </span>
                            </div>
                        <hr class="mb-2 mt-2">


                        <div class="custom-file">
                            <input name="bukti" type="file"
                                class="custom-file-input text-primary @error('bukti') is-invalid @enderror" id="bukti"
                                accept=".jpeg,.png,.jpg,.gif" required>
                            <label class="custom-file-label" for="bukti" data-browse="Cari">Bukti Transfer
                                Belum Ada</label>
                        </div>
                        @error('bukti')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <button type="submit" class="btn btn-primary btn-icon-split mt-3 ">
                            <span class="text">Kirim Sekarang</span>
                            <span class="icon text-white-50">
                                <i class="fas fa-save"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <hr>

            </div>

        </form>
    @else
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
    @endif



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

@section('js')
    <script>
        $(document).ready(function() {
            $('#bukti').on('change', function() {
                // Get the file name
                var fileName = $(this).val().split('\\').pop();
                // Replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });
        });
    </script>
@endsection
