@extends('partials.navbar_cs')

@section('content')
    <!-- /.navbar -->
    <div class="row justify-content-md-center">
        <!-- left column -->
        <div class="col-md-6">
            @if (session('success'))
                <div class="alert alert-success text-dark" style="background-color: rgb(113, 196, 154);">
                    {{ session('success') }}
                </div>
            @elseif(session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif
            <!-- general form elements -->
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">Upload Bukti Foto/Video</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ url('/customer_service/update_bukti/' . $job->id_tugas) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        @if($job->bukti1 != null)
                            @if(pathinfo(storage_path($job->bukti1), PATHINFO_EXTENSION) == 'mp4')
                                <video height="300px" controls>
                                    <source src="{{asset('/storage/'.$job->bukti1)}}" type="video/mp4">
                                </video>
                            @else
                                <img src="{{asset('/storage/'.$job->bukti1)}}" height="200px">
                            @endif
                        @endif
                        <input type="file" id="bukti1" name="bukti1">

                        @if($job->bukti2 != null)
                            @if(pathinfo(storage_path($job->bukti2), PATHINFO_EXTENSION) == 'mp4')
                                <video height="300px" controls>
                                    <source src="{{asset('/storage/'.$job->bukti2)}}" type="video/mp4">
                                </video>
                            @else
                                <img src="{{asset('/storage/'.$job->bukti2)}}" height="200px">
                            @endif
                        @endif
                        <input type="file" id="bukti2" name="bukti2">

                        @if($job->bukti3 != null)
                            @if(pathinfo(storage_path($job->bukti3), PATHINFO_EXTENSION) == 'mp4')
                                <video height="300px" controls>
                                    <source src="{{asset('/storage/'.$job->bukti3)}}" type="video/mp4">
                                </video>
                            @else
                                <img src="{{asset('/storage/'.$job->bukti3)}}" height="200px">
                            @endif
                        @endif
                        <input type="file" id="bukti3" name="bukti3">

                        @if($job->bukti4 != null)
                            @if(pathinfo(storage_path($job->bukti4), PATHINFO_EXTENSION) == 'mp4')
                                <video height="300px" controls>
                                    <source src="{{asset('/storage/'.$job->bukti4)}}" type="video/mp4">
                                </video>
                            @else
                                <img src="{{asset('/storage/'.$job->bukti4)}}" height="200px">
                            @endif
                        @endif
                        <input type="file" id="bukti4" name="bukti4">

                        @if($job->bukti5 != null)
                            @if(pathinfo(storage_path($job->bukti5), PATHINFO_EXTENSION) == 'mp4')
                                <video height="300px" controls>
                                    <source src="{{asset('/storage/'.$job->bukti5)}}" type="video/mp4">
                                </video>
                            @else
                                <img src="{{asset('/storage/'.$job->bukti5)}}" height="200px">
                            @endif
                        @endif
                        <input type="file" id="bukti5" name="bukti5">
                        <!-- /.card-body -->
                        <div class="form-group card-footer">
                            <button type="submit" class="btn btn-success mr-2">Upload</button>
                            <a href="{{route('dashboard_cs')}}" class="btn btn-danger">Kembali</a>
                            <a href="{{ url('/customer_service/delete_bukti/' . $job->id_tugas)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    @endsection
