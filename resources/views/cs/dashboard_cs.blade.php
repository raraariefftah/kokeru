<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard CS</title>
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
<body style="background-color: rgba(152, 207, 255, 0.2);">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('partials.navbar_cs')
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <section id="awal" class="awal">
            <div class="container">
                <div class="row mb-4 pt-2">
                    <div class="col text-center" style="color :rgb(63, 112, 206);" ">
                        <h4>Monitoring Kebersihan dan Kerapihan Ruang</h4>
                        <h4>Gedung Bersama Maju</h4>
                        <h4 class="pt-3">{{$waktu}} WIB</h4>
                    </div>
                </div>


                 <!-- row -->
                <div class=" row">
                        @foreach ($cs_jobs as $job)
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div
                                    class="small-box text-center {{ $job->status == 'SUDAH' ? 'bg-success' : 'bg-warning' }}">
                                    <div class="inner">
                                        <h3>{{ $job->nama_ruang }}</h3>
                                        <p>{{ $job->status }}</p>
                                        <p>{{ $job->nama }}</p>
                                        <a href="#" class="box-link" style="color: white">&lt;&lt;detil&gt;&gt;</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.container -->
        </section>
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
