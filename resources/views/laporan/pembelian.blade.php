<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $title }}</title>
    {{-- <link rel="stylesheet" href="{{ asset('pdf/css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ public_path('pdf/css/bootstrap.css') }}">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <h1>{{ $title }}</h1>
                <address>
                    <strong>CV. Fajar Advertising</strong><br>
                    Jalan Sutomo No. 24 RT/RW 008/002 Kelurahan Tanah Patah Kecamatan Ratu Agung Kota Bengkulu.<br>
                    +62-813-6636-1991
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th>IDPesanan</th>
                            <th>Tanggal</th>
                            <th>Produk</th>
                            <th>Member</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelian as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>#{{ $data->id }}</td>
                                <td>
                                    {{ $data->updated_at->translatedFormat('l, j M Y H:i') }}
                                </td>
                                <td>
                                    <ol style="padding-left:15px;">
                                    @foreach ($data->pemesanandetails as $product)
                                    <li >
                                        {{ $product->nama }} <br>
                                        <small>
                                            ({{ $product->hargaRp }} x
                                            {{ $product->jumlah }} =
                                            {{ $product->sub_total }})
                                        </small>
                                    </li>
                                    @endforeach
                                </ol>
                                </td>
                                <td>{{ $data->user_nama }} <br>
                                    <small>
                                        {{ $data->user_alamat }} <br>
                                        {{ $data->user_telp }}
                                    </small>
                                </td>
                                <td class="text-right">{{ $data->grand_total }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>
</body>

</html>
