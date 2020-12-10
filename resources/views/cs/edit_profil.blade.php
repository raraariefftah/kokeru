<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard CS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/style/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/style/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body style="background-color: rgba(152, 207, 255, 0.2);">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
@include('partials.navbar_cs')
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
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="{{ asset('/style/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('/style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('/style/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('/style/dist/js/demo.js') }}"></script>
</body>

</html>
