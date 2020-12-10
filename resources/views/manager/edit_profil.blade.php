@extends('manager.dashboard_manager')

@section('content')

    <div class="container-fluid"></div>
    <div class="row pt-3 pl-4">
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
                    <h3 class="card-title">Edit profil</h3>
                </div>
            <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{url('/manager/update_profil/'.Auth::user()->id_user)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputNama">Nama</label>
                            <input name="nama" class="form-control"
                                   placeholder="Masukkan Nama CS" value="{{old('nama') ?? $manager->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input name="email" class="form-control" placeholder="Masukkan Email"
                                   value="{{old('email') ?? $manager->email}}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputNoHp">No Hp</label>
                            <input name="no_hp" class="form-control" placeholder="Masukkan No Hp"
                                   value="{{old('no_hp') ?? $manager->no_hp}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNama">Masukkan password</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class=" card-footer">
                            <button type="submit" class="btn btn-success mr-2">Ubah</button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
