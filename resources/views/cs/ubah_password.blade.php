@extends('partials.navbar_cs')

@section('content')

    <div class="container-fluid">
        <div class="row pt-3 pl-4 justify-content-md-center">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('/cleaning_service/update_password/' . Auth::user()->id_user) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputNama">Password Baru</label>
                                <input name="newpassword" type="password" class="form-control"
                                    value="{{ old('newpassword') }}">
                                @if ($errors->has('newpassword'))
                                    <span class="text-danger">{{ $errors->first('newpassword') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNama">Konfirmasi Password</label>
                                <input name="confirmnewpassword" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNama">Password Lama</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class=" card-footer">
                            <button type="submit" class="btn btn-success mr-2" onclick="return confirm('Are you sure?')">Ubah</button>
                            <a href="{{ route('dashboard_cs') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
