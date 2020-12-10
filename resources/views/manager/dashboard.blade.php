@extends('manager.dashboard_manager')

@section('content')
<div class="container-fluid pt-2">
    <!-- Content Row -->
    <div class="row">
        <!-- Jumlah CS -->
        <div class="col-xl-3 col-md-6 mb-4 ">
            <div class="card border-left-primary shadow h-100 py-2" style="background-color: rgb(49, 26, 56)">
                <div class="card-body" style="background-color: rgb(49, 26, 56)">
                    <div class="row no-gutters align-items-center ">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah CS</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{$jumlahcs}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Ruang -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="background-color: rgb(212, 123, 153)">
                <div class="card-body" style="background-color: rgb(212, 123, 153)">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah Ruang</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{$jumlahruang}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Tugas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="background-color: rgb(179, 150, 98)">
                <div class="card-body" style="background-color: rgb(179, 150, 98)">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah Tugas</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{$jumlahtugas}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Persentase Tugas Selesai -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 bg-info">
                <div class="card-body bg-info">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Tugas Selesai</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-dark">{{($tugasselesai/$jumlahtugas)*100}}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{($tugasselesai/$jumlahtugas)*100}}%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="b2" class="b2">
        <div class="container-fluid mt-3">
            <div class="card shadow h-100">
                <div class="row pt-3 pr-3">
                    <div class="col-auto ml-auto">
                        <a type="button" class="btn btn-warning" href="#"><i class="nav-icon fas fa-undo">
                                Reset </i></a>
                    </div>
                    <div class="col-auto">
                        <a type="button" class="btn btn-primary" href="#"><i class="nav-icon fas fa-plus">
                                Tambah </i></a>
                    </div>
                    <div class="col-auto">
                        <a type="button" class="btn btn-primary" style="background-color: rebeccapurple" href="#"><i
                                class="nav-icon fas fa-file">
                                Laporan </i></a>
                    </div>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col text-center" style="color :rgb(63, 112, 206);">
                        <h4>Monitoring Kebersihan dan Kerapihan Ruang</h4>
                        <h4>Gedung Bersama Maju</h4>
                        <h4 class="pt-3">Hari Kamis Tanggal 12 November 2020 Jam 07.11 WIB</h4>
                    </div>
                </div>
                <!-- row -->
                <div class=" row">
                    @foreach ($jobs as $job)
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
                <!-- /.container -->
            </div>
        </div>
    </section>
</div>
@endsection
