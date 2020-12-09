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
</head>
<body>
<!-- Site wrapper -->
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="container-sm">
    @yield('content')

            {{-- Isi Laporan --}}
            <section id="isi" class="isi">
                <div class="container-fluid">
                    <div class="row pt-4">
                        <div class="col text-center">
                            <h5>Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju</h5>
                            <h5>Hari Kamis Tanggal 12 November 2020 Jam 07.11 WIB</h5>
                            <p>&lt;&lt;Tanggal Cetak 12 November 2020 Jam 10:10 WIB&gt;&gt;</p>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </section>


            <!-- Table Daftar Ruangan -->
            <div class="card-body">
            <div class="container-fluid">
                <table id="table1" class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Ruang</th>
                    <th>Nama CS</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>R.1313</td>
                    <td>zubaeda</td>
                    <td>SUDAH</td>
                </tr>
                </table>
            </div>
            </div>
        
            {{-- Tanda tangan --}}
            <section id="isi" class="isi">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-right pr-5" >
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
