<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>laporan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/style/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/style/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="text-center pt-5">
        <h5 style="font-weight: bold">Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju</h5>
        <h5 style="font-weight: bold">Hari Kamis Tanggal 12 November 2020 Jam 07.11 WIB</h5>
        <p>&lt;&lt;Tanggal Cetak {{$waktu}} WIB&gt;&gt;</p>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th width="5px">No</th>
                    <th width="200px">Ruang</th>
                    <th width="400px">Nama CS</th>
                    <th width="200px">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$job->nama_ruang}}</td>
                    <td>{{$job->nama}}</td>
                    <td>{{$job->status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col" style="margin-left: 80%">
                <p>Approval</p>
                <p>&lt;&lt;ttd&gt;&gt;</p>
                <p>Nama Manajer</p>
                <p>Manajer</p>
            </div>
        </div>
    </div>


    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('/style/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/style/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/style/dist/js/demo.js') }}"></script>
</body>

</html>
