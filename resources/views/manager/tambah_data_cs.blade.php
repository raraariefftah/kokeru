@extends('manager.dashboard_manager')

@section('content')

    {{-- Tambah Ruangan --}}
    <div class="container-fluid">
        <div class="row pt-3 pl-4 justify-content-md-center">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Tambah CS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('cs_store') }}" method="post">
                        @csrf
                        <div class="card-body justify-content-md-center">
                            <div class="form-group row">
                                <label for="exampleInputNama">Nama CS</label>
                                <input name="nama" class="form-control" placeholder="Masukkan Nama CS"
                                    value="{{ old('nama') }}">
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail">Email</label>
                                <input name="email" class="form-control" placeholder="Masukkan Email"
                                    value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputNoHp">No Hp</label>
                                <input name="no_hp" class="form-control" placeholder="Masukkan No Hp"
                                    value="{{ old('no_hp') }}">
                                @if ($errors->has('no_hp'))
                                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer row">
                            <button type="submit" class="btn btn-success mr-2">Tambah</button>
                            <a href="{{ route('daftar_cs') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
