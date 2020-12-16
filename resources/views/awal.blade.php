@extends('layouts.app')

@section('css')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/style/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')
    <section id="awal" class="awal">
        <div class="container">
            <div class="row mt-2">
                <div class="col text-center" style="color :rgb(63, 112, 206);">
                    <h4>Monitoring Kebersihan dan Kerapihan Ruang</h4>
                    <h4>Gedung Bersama Maju</h4>
                    <h4 class="mt-3">Hari {{ $hari }} Tanggal {{ $tanggal }} Jam {{ $waktu }} WIB</h4>
                </div>
            </div>


            <!-- row -->
            <div class="row mt-2">
                @foreach ($jobs as $job)
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box text-center {{ $job->status == 'SUDAH' ? 'bg-success' : 'bg-warning' }}">
                            <div class="inner">
                                <h3>{{ $job->nama_ruang }}</h3>
                                <p>{{ $job->status }}</p>
                                <p>{{ $job->nama }}</p>
                                <a href="#exampleModal{{$job->id_tugas}}" class="box-link"
                                    data-toggle="modal" data-target="#exampleModal{{$job->id_tugas}}"
                                    style="color : {{ $job->status == 'SUDAH' ? 'white' : 'black' }}">&lt;&lt;detil&gt;&gt;</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @foreach ($jobs as $job)
                <div class="modal fade" id="exampleModal{{$job->id_tugas}}" tabindex="-1" role="dialog"
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
                                <div class="col-md-offset-2">
                                    <div class="form-group">
                                        <label for="Gambar 1">Gambar 1</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- /.container -->
    </section>
@endsection
