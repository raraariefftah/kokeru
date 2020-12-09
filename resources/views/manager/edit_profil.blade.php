@extends('dashboard_manager')

@section('content')
    <div class="container-fluid"></div>
          <div class="row pt-5 pr-5 pl-5">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">Edit Profil</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputnama">Nama</label>
                      <input type="nama" class="form-control" id="exampleInputnama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNoHP">No Hp</label>
                      <input type="password" class="form-control" id="exampleInputNoHP" placeholder="Masukkan No HP">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success mr-2">Selesai</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
<!-- /.card -->
@endsection
