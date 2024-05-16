<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $title }}</title>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->telp }}</td>
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
