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
                    <h3 class="card-title">Edit Profil</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{url('/customer_service/update_profil/'.Auth::user()->id_user)}}"
                      method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input name="email" class="form-control"
                                   value="{{old('email') ?? $cs->email}}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputNoHp">No Hp</label>
                            <input name="no_hp" class="form-control"
                                   value="{{old('no_hp') ?? $cs->no_hp}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNama">Masukkan password</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class=" card-footer">
                        <button type="submit" class="btn btn-success mr-2">Ubah</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
@endsection
