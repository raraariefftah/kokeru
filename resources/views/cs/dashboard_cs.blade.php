@extends('partials.navbar_cs')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section id="awal" class="awal">
    <div class="container">
        <div class="row mb-4 pt-2">
            <div class="col text-center" style="color :rgb(63, 112, 206);">
                <h4>Monitoring Kebersihan dan Kerapihan Ruang</h4>
                <h4>Gedung Bersama Maju</h4>
                <h4 class="pt-3">{{$waktu}} WIB</h4>
            </div>
        </div>
        <!-- row -->
        <div class=" row">
            @foreach ($cs_jobs as $job)
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div
                        class="small-box text-center {{ $job->status == 'SUDAH' ? 'bg-success' : 'bg-warning' }}">
                        <div class="inner">
                            <h3>{{ $job->nama_ruang }}</h3>
                            <p>{{ $job->status }}</p>
                            <p>{{ $job->nama }}</p>
                            <a href="{{url('/cleaning_service/upload_bukti/'.$job->id_tugas)}}" class="box-link" style="color : {{$job->status == 'SUDAH'? 'white' : 'black'}}">&lt;&lt;detil&gt;&gt;</a>
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
