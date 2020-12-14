<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/style/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/style/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( function() {
            // $( "#datepicker" ).datepicker();
            $('.datepicker').datepicker();
        } );
    </script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
@include('partials.navbar_manager')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('partials.sidebar_manager')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @yield('content')
    <!-- Content Header (Page header) -->
        <div class="container-fluid pt-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan Daftar Tugas</h3>
                </div>

                <form>
                    <div class="form-row align-items-center pt-3 pl-4">
                        <div class="col-auto">
                            <a type="button" class="btn btn-primary" href="{{url('manager/print_laporan_pdf')}}"><i
                                    class="nav-icon fas fa-file">
                                    Print as PDF </i></a>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" style="background-color: rebeccapurple"><i
                                    class="nav-icon fas fa-file"> Print as Excel </i></button>
                        </div>
                    </div>
                </form>

                {{-- pilih tanggal --}}
                <div class="row pt-4 pl-4">
                    <!-- kolom -->
                    <div class="col-md-2">
                            {{-- default tanggal hari ini / pakek kalender untuk memilih tanggal sebelumnya --}}
                        <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                            <label for="tanggal">Pilih Tanggal</label>
                            <input placeholder="Select date" type="date" id="tanggal" class="form-control" name="tanggal">
                        </div>
                    </div>
                </div>

                {{-- pilih status --}}
                <div class="row pt-3 pl-4">
                    <!-- left column -->
                    <div class="col-md-2">
                        <label for="inputState">Pilih Status</label>
                        <select id="inputState" class="form-control" name="status">
                            <option selected>Pilih Status</option>
                            <option>SEMUA</option>
                            <option>BELUM</option>
                            <option>SUDAH</option>
                        </select>
                    </div>
                </div>

                <form>
                    <div class="form-row align-items-center pt-3 pl-4">
                        <div class="col-auto">
                            <button type="button" class="btn btn-warning"><b> Tampil </b></button>
                        </div>
                    </div>
                </form>

                {{--             Isi Laporan--}}
                <section id="isi" class="isi">
                    <div class="container-fluid">
                        <div class="row pt-4">
                            <div class="col text-center">
                                <h5>Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju</h5>
                                <h5>Hari Kamis Tanggal 12 November 2020 Jam 07.11 WIB</h5>
                                <p>&lt;&lt;Dicetak pada {{$waktu}} WIB&gt;&gt;</p>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>


                <!-- Table Daftar Ruangan -->
                <div class="card-body">
                    <div class="container-fluid">
                        <table id="table1" class="table table-bordered table-striped ">
                            <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Ruang</th>
                                <th>Nama CS</th>
                                <th>Status</th>
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
                        </table>
                    </div>
                </div>

                {{--             Tanda tangan--}}
                <section id="isi" class="isi">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right pr-5">
                                <p>Approval</p>
                                <p>&lt;&lt;ttd&gt;&gt;</p>
                                <p>Nama Manajer</p>
                                <p>Manajer</p>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>
                --}}
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/style/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/style/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/style/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/style/dist/js/demo.js')}}"></script>
</body>
</html>
