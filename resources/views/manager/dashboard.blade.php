@extends('manager.dashboard_manager')

@section('content')
    <div class="container-fluid">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 mt-3 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Jumlah CS -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah CS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Ruang -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Ruang</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Tugas -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Tugas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Persentase Tugas Selesai -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tugas Selesai</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="awal" class="awal">
            <div class="container">
                <div class="row mb-4 pt-4">
                    <div class="col text-center" style="color :rgb(63, 112, 206);" ">
                        <h4>Monitoring Kebersihan dan Kerapihan Ruang</h4>
                        <h4>Gedung Bersama Maju</h4><br>
                        <h4>Hari Kamis Tanggal 12 November 2020 Jam 07.11 WIB</h4>
                    </div>
                </div>


                <!-- row -->
                {{-- <div class=" row">
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
        </section> --}}
    </div>
@endsection
