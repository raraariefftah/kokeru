@extends('partials.navbar_cs')

@section('content')
    <!-- /.navbar -->
    <div class="row justify-content-md-center">
        <!-- left column -->
        <div class="col-md-6">
            @if (session('success'))
                <div class="alert alert-success">
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
                <form role="form" action="{{url('/customer_service/update_bukti/'.$job->id_tugas)}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <form>
                            @if($job->bukti1 != null)
                                @if(session('extensionfile') == 'mp4')
                                    <video height="300px" controls>
                                        <source src="{{asset('/storage/'.$job->bukti1)}}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{asset('/storage/'.$job->bukti1)}}" height="200px">
                                    @if($job->bukti2 != null)
                                        <img src="{{asset('/storage/'.$job->bukti2)}}" height="200px">
                                        @if($job->bukti3 != null)
                                            <img src="{{asset('/storage/'.$job->bukti3)}}" height="200px">
                                            @if($job->bukti4 != null)
                                                <img src="{{asset('/storage/'.$job->bukti4)}}" height="200px">
                                                @if($job->bukti5 != null)
                                                    <img src="{{asset('/storage/'.$job->bukti5)}}" height="200px">
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            @endif
                            <div class="form-group">
                                <label for="bukti">Bukti (max 5 file)</label>
                                <input type="file" class="form-control-file" id="bukti" name="bukti[]" multiple>
                                @if ($errors->has('bukti[]'))
                                    <span class="text-danger">{{ $errors->first('bukti[]') }}</span>
                                @endif
                            </div>
                            {{--                            @if($job->bukti2 != null)--}}
                            {{--                                <img src="{{asset('/storage/'.$job->bukti2)}}" height="200px">--}}
                            {{--                            @endif--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="bukti2">Bukti 2 (Opsional)</label>--}}
                            {{--                                <input type="file" class="form-control-file" id="bukti2" name="bukti2">--}}
                            {{--                            </div>--}}
                            {{--                            @if($job->bukti3 != null)--}}
                            {{--                                <img src="{{asset('/storage/'.$job->bukti3)}}" height="200px">--}}
                            {{--                            @endif--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="bukti3">Bukti 3 (Opsional)</label>--}}
                            {{--                                <input type="file" class="form-control-file" id="bukti3" name="bukti3">--}}
                            {{--                            </div>--}}
                            {{--                            @if($job->bukti4 != null)--}}
                            {{--                                <img src="{{asset('/storage/'.$job->bukti4)}}" height="200px">--}}
                            {{--                            @endif--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="bukti4">Bukti 4 (Opsional)</label>--}}
                            {{--                                <input type="file" class="form-control-file" id="bukti4" name="bukti4">--}}
                            {{--                            </div>--}}
                            {{--                            @if($job->bukti5 != null)--}}
                            {{--                                <img src="{{asset('/storage/'.$job->bukti5)}}" height="200px">--}}
                            {{--                            @endif--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="bukti5">Bukti 5 (Opsional)</label>--}}
                            {{--                                <input type="file" class="form-control-file" id="bukti5" name="bukti5">--}}
                            {{--                            </div>--}}
                        </form>
                        <!-- /.card-body -->
                        <div class="form-group card-footer">
                            <button type="submit" class="btn btn-success mr-2">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
@endsection
