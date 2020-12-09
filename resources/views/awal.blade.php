@extends('layouts.app')

@section('css')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/style/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')
    <section id="awal" class="awal">
        <div class="container">
            <div class="row mb-4 pt-4">
                <div class="col text-center" style="color :rgb(63, 112, 206);"
                ">
                <h4>Monitoring Kebersihan dan Kerapihan Ruang</h4>
                <h4>Gedung Bersama Maju</h4><br>
                <h4>Hari Kamis Tanggal 12 November 2020 Jam 07.11 WIB</h4>
            </div>
        </div>


        <!-- row -->
        <div class="row">
            @foreach($jobs as $job)
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
            @endforeach
        </div>
        <!-- /.container -->
    </section>
@endsection

