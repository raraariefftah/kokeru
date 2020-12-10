@extends('manager.dashboard_manager')

@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- Jumlah CS -->
            <div class="col-xl-3 col-md-6 mb-4 ">
                <div class="card border-left-primary shadow h-100 py-2" style="background-color: rgb(49, 26, 56)">
                    <div class="card-body" style="background-color: rgb(49, 26, 56)">
                        <div class="row no-gutters align-items-center ">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah CS</div>
                                <div class="h5 mb-0 font-weight-bold text-white">4</div>
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
                                <div class="h5 mb-0 font-weight-bold text-white">10</div>
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
                                <div class="h5 mb-0 font-weight-bold text-white">10</div>
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
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-dark">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-dark" role="progressbar" style="width: 50%"
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
        <section id="awal" class="awal">
            <div class="row">
                <div class="col-auto ml-auto mb-5">
                    <a type="button" class="btn btn-primary" href="#"><i class="nav-icon fas fa-plus">
                            Tambah </i></a>
                </div>
                <div class="col-auto mb-5">
                    <a type="button" class="btn btn-primary" style="background-color: rebeccapurple" href="#"><i class="nav-icon fas fa-plus">
                            Laporan </i></a>
                </div>
            </div>
            <div class="container">

                <!-- row -->
                <div class=" row">
                    @foreach ($jobs as $job)
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box text-center {{ $job->status == 'SUDAH' ? 'bg-success' : 'bg-warning' }}">
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
@endsection
