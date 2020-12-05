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
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('partials.sidebar_manager')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @section('content')
      <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h1 class="pt-4 pb-3">Dashboard</h1>

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info" >
                                <div class="inner">
                                    <h3>50</h3>
                                    <p>Jumlah CS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box " style="background-color: rgb(145, 123, 212)">
                                <div class="inner" style="color: white">
                                    <h3>10</h3>
                                    <p>Jumlah Ruangan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-home"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>50</h3>
                                    <p>Sudah Dibersihkan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-checkmark"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>50</h3>
                                    <p>Belum Dibersihkan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-close"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="card">
                    <section id="awal" class="awal">
                        <div class="container">
                            <div class="row mb-4 pt-4">
                                <div class="col text-center" style="color :rgb(63, 112, 206);"">
                                <h4>Monitoring Kebersihan dan Kerapihan Ruang</h4>
                                <h4>Gedung Bersama Maju</h4><br>
                                <h4>Hari Kamis Tanggal 12 November 2020 Jam 07.11 WIB</h4>
                            </div>
                        </div>


                    <!-- row -->
                    <div class=" row">
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                                <div class="small-box text-center bg-success">
                                    <div class="inner">
                                        <h3>R.123</h3>
                                        <p>SUDAH</p>
                                        <p>Doni Kusumah</p>
                                        <a href="#" class="box-link" style="color: white">&lt;&lt;detil&gt;&gt;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /.content-wrapper -->
                    
              {{-- <!-- row -->
              <div class="row">
                  @foreach($tugas as $job)
                      <div class="col-lg-3 col-6">
                          <!-- small card -->
                          <div class="small-box text-center {{$job->status == 'SUDAH'? 'bg-success' : 'bg-warning'}}">
                              <div class="inner">
                                  <h3>{{$job->nama_ruang}}</h3>
                                  <p>{{$job->status}}</p>
                                  <p>{{$job->nama}}</p>
                                  <a href="#" class="box-link" style="color: white">&lt;&lt;detil&gt;&gt;</a>
                              </div>
                          </div>
                      </div>
              @endforeach --}}

              <!-- ./col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container -->
      </section>

    @endsection
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
