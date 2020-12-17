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
                                <div class="h5 mb-0 font-weight-bold text-white">{{ $jumlahcs }}</div>
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
                                <div class="h5 mb-0 font-weight-bold text-white">{{ $jumlahruang }}</div>
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
                                <div class="h5 mb-0 font-weight-bold text-white">{{ $jumlahtugas }}</div>
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
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-dark">
                                            {{ ($tugasselesai / $jumlahtugas) * 100 }}%
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-dark" role="progressbar"
                                                 style="width: {{ ($tugasselesai / $jumlahtugas) * 100 }}%"
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

        <div class="container-fluid">
            <div class="row pt-3 pr-3">
                <div class="col-auto ml-auto">
                    <form action="{{ url('/reset_tugas') }}" method="post"
                          onsubmit="return confirm('Apakah Anda yakin ingin mereset data tugas?')">
                        @method('patch')
                        @csrf
                        <button class="btn btn-danger"><i class="nav-icon fas fa-undo">
                                Reset </i></button>
                    </form>
                </div>
                <div class="col-auto">
                    <a type="button" class="btn btn-primary" href="/manager/tambah_tugas"><i
                            class="nav-icon fas fa-plus">
                            Tambah </i></a>
                </div>
                <div class="col-auto">
                    <a type="button" class="btn btn-primary" style="background-color: rebeccapurple"
                       href="{{ url('manager/laporan') }}"><i class="nav-icon fas fa-file">
                            Laporan </i></a>
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                <div class="col text-center" style="color :rgb(63, 112, 206);">
                    <h4>Monitoring Kebersihan dan Kerapihan Ruang</h4>
                    <h4>Gedung Bersama Maju</h4>
                    <h4 class="pt-2">Hari {{ $hari }} Tanggal {{ $tanggal }} Jam {{ $waktu }} WIB</h4>
                </div>
            </div>
            <!-- row -->
            <div class=" row mt-3 pl-2 pr-2">
                @foreach ($jobs as $job)
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box text-center {{ $job->status == 'SUDAH' ? 'bg-success' : 'bg-warning' }}">
                            <div class="inner">
                                <h3>{{ $job->nama_ruang }}</h3>
                                <p>{{ $job->status }}</p>
                                <p>{{ $job->nama }}</p>
                                <a href="#exampleModal{{ $job->id_tugas }}" class="box-link" data-toggle="modal"
                                   data-target="#exampleModal{{ $job->id_tugas }}"
                                   style="color : {{ $job->status == 'SUDAH' ? 'white' : 'black' }}">&lt;&lt;detil&gt;&gt;</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.container -->
        </div>
    </div>
    @foreach ($jobs as $job)
        <div class="modal fade" id="exampleModal{{ $job->id_tugas }}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Ruang {{ $job->nama_ruang }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-offset-2 text-center">
                            @if ($job->bukti1 != null)
                                @if (pathinfo(storage_path($job->bukti1), PATHINFO_EXTENSION) == 'mp4')
                                    <video height="200px" controls>
                                        <source src="{{ asset('/storage/' . $job->bukti1) }}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('/storage/' . $job->bukti1) }}" height="200px" width="360px">
                                @endif
                            @endif
                            @if ($job->bukti2 != null)
                                @if (pathinfo(storage_path($job->bukti2), PATHINFO_EXTENSION) == 'mp4')
                                    <video height="200px" controls>
                                        <source src="{{ asset('/storage/' . $job->bukti2) }}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('/storage/' . $job->bukti2) }}" height="200px" width="360px">
                                @endif
                            @endif
                            @if ($job->bukti3 != null)
                                @if (pathinfo(storage_path($job->bukti3), PATHINFO_EXTENSION) == 'mp4')
                                    <video height="200px" controls>
                                        <source src="{{ asset('/storage/' . $job->bukti3) }}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('/storage/' . $job->bukti3) }}" height="200px" width="360px">
                                @endif
                            @endif
                            @if ($job->bukti4 != null)
                                @if (pathinfo(storage_path($job->bukti4), PATHINFO_EXTENSION) == 'mp4')
                                    <video height="200px" controls>
                                        <source src="{{ asset('/storage/' . $job->bukti4) }}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('/storage/' . $job->bukti4) }}" height="200px" width="360px">
                                @endif
                            @endif
                            @if ($job->bukti5 != null)
                                @if (pathinfo(storage_path($job->bukti5), PATHINFO_EXTENSION) == 'mp4')
                                    <video height="200px" controls>
                                        <source src="{{ asset('/storage/' . $job->bukti5) }}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('/storage/' . $job->bukti5) }}" height="200px" width="360px">
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-auto">
                                <form action="{{ url('/manager/edit_tugas/' . $job->id_tugas) }}" method="get">
                                    @csrf
                                    <button class="btn btn-warning"><i class="nav-icon fas fa-edit"></i></button>
                                </form>
                            </div>
                            <div class="col-auto">
                                <form action="{{ url('/manager/delete_tugas/' . $job->id_tugas) }}" method="post"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger"><i class="nav-icon fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
