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
                        <h3 class="card-title">Edit Data CS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('manager/update_data_cs/' . $cs->id_user) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputNama">Nama CS</label>
                                <input name="nama" class="form-control" value="{{ $cs->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Email</label>
                                <input name="email" class="form-control" value="{{ $cs->email }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNoHp">No Hp</label>
                                <input name="no_hp" class="form-control" value="{{ $cs->no_hp }}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success mr-2" onclick="return confirm('Apakah kamu yakin?')">Ubah</button>
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
