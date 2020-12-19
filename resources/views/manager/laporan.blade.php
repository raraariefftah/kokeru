<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
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

    <link rel="stylesheet" href="{{asset('/air-datepicker/dist/css/datepicker.css')}}">

    <script src="{{asset('/air-datepicker/dist/js/datepicker.js')}}"></script>
    <script src="{{asset('/air-datepicker/dist/js/i18n/datepicker.en.js')}}"></script>

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
        <div class="container-fluid mt-3 pb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan Daftar Tugas</h3>
                </div>

                {{--                <form>--}}
                {{--                    <div class="form-row align-items-center pt-3 pl-4">--}}
                {{--                        <div class="col-auto">--}}
                {{--                            <a type="button" class="btn btn-primary" href="{{url('manager/print_laporan_pdf')}}"><i--}}
                {{--                                    class="nav-icon fas fa-file">--}}
                {{--                                    Print as PDF </i></a>--}}
                {{--                        </div>--}}
                {{--                        <div class="col-auto">--}}
                {{--                            <a type="button" class="btn btn-primary" href="{{url('manager/print_laporan_excel')}}"--}}
                {{--                               style="background-color: rgb(36, 119, 47)"><i class="nav-icon fas fa-file">--}}
                {{--                                    Print as Excel </i></a>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </form>--}}

                {{-- pilih tanggal --}}
                <form role="form" action="{{ url('/manager/laporan_daftar_tugas') }}" method="get">
                    @csrf
                        <div class="form-row align-items-center pt-3 pl-4">
                            <div class="col-auto">
                                <a type="button" class="btn btn-primary"
                                   href="{{url('manager/print_laporan_pdf/'.$waktu_tugas.'/SUDAH')}}">
                                    <i class="nav-icon fas fa-file">
                                        Print as PDF </i></a>
                            </div>
                            <div class="col-auto">
                                <a type="button" class="btn btn-primary"
                                   href="{{url('manager/print_laporan_excel/'.$waktutugas.'/SUDAH')}}"
                                   style="background-color: rgb(36, 119, 47)">
                                    <i class="nav-icon fas fa-file">
                                        Print as Excel </i></a>
                            </div>
                        </div>
                    <div class="row pt-3 ml-3">
                        <!-- kolom -->
                        <div class="col-md-2">
                            {{-- default tanggal hari ini / pakek kalender untuk memilih tanggal sebelumnya --}}
                            <label for="datepicker">Pilih Tanggal</label>
                            {{--                            <input type='text' class="datepicker-here form-control" data-position="right top"--}}
                            {{--                                   id="datepicker" name="datepicker" data-language='en'>--}}
                            <input type="date" class="form-control" id="datepicker" name="datepicker">

                        </div>
                    </div>

                    {{-- pilih status --}}
                    <div class="row pt-3 ml-3">
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

                    <div class="form-row align-items-center pt-3 pl-4">
                        <div class="col-auto">
                            <button class="btn btn-warning"><b>Tampil </b></button>
                        </div>
                    </div>
                </form>


                {{-- Table laporan --}}
                <div class="container-fluid pr-4">
                    <div class="row pt-4 text-center">
                        <div class="col">
                            <h5 style="font-weight: bold">Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama
                                Maju</h5>
                            <h5 style="font-weight: bold">Hari {{$waktutugas}}</h5>
                            <p>&lt;&lt;Tanggal Cetak {{$tanggal}} Jam {{$waktu}} WIB&gt;&gt;</p>
                        </div>
                    </div>

                    <table id="table1" class="table table-bordered table-striped ">
                        <thead>
                        <tr class="text-center">
                            <th width="5px">No</th>
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

                    <div class="row">
                        <div class="col" style="margin-left: 80%">
                            <p>Approval</p>
                            <p>&lt;&lt;ttd&gt;&gt;</p>
                            <p>{{ Auth::user()->nama }}</p>
                            <p>Manager</p>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>

        </div>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
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
