<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
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
                            <p>&lt;&lt;Dicetak pada {{$waktu}} WIB&gt;&gt;</p>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </section>


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
</body>
</html>
