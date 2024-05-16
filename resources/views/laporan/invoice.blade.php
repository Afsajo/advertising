<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    {{-- <link rel="stylesheet" href="{{ asset('pdf/css/bootstrap.css') }}" > --}}
    <link rel="stylesheet" href="{{ public_path('pdf/css/bootstrap.css') }}" >
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <h1>Invoice #{{ $pemesanan->id }}</h1>
                <address>
                    <strong>CV. Fajar Advertising</strong><br>
                    Jalan Sutomo No. 24 RT/RW 008/002 Kelurahan Tanah Patah Kecamatan Ratu Agung Kota Bengkulu.<br>
                    +62-813-6636-1991
                </address>
            </div>
            <div class="col-xs-5 text-right">
                <h1>Member</h1>
                <address>
                    <strong>{{ $pemesanan->user_nama }}</strong><br>
                    {{ $pemesanan->user_alamat }}<br>
                    {{ $pemesanan->user_tep }}<br>
                    {{ $pemesanan->updated_at->translatedFormat('l, j M Y H:i') }}<br>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h3>Produk</h3>
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th class="text-right">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach ($pemesanan->pemesanandetails as $product)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->nama }}</td>
                            <td class="text-right">{{ $product->hargaRp }}</td>
                            <td class="text-center">{{ $product->jumlah }}</td>
                            <td class="text-right">{{ $product->subTotal }}</td>
                        </tr>
                          @endforeach

                        <tr>
                            <td colspan="4" class="text-right"><strong>Grand Total</strong></td>
                            <td class="text-right">{{ $pemesanan->grand_total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h3>Metode Pembayaran</h3>
                <address>
                    <strong> {{ $pemesanan->bank_bank }}</strong><br>
                    {{ $pemesanan->bank_rekening }}
                    <br> {{ $pemesanan->bank_pemilik }}
                </address>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
