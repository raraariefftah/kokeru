@extends('manager.dashboard_manager')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="container-fluid pt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Ruang</h3>
      </div>

      {{-- Buttom Tambah --}}
      <form action="" class="pt-3 pl-4">
            <button type="button" class="btn btn-primary"><i class="nav-icon fas fa-plus"> Tambah </i></button>
      </form>

      {{-- Tambah Ruangan --}}
      <div class="container-fluid"></div>
          <div class="row pt-3 pl-4">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">Tambah Ruang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputNamaRuangan">Nama Ruang</label>
                      <input type="nama" class="form-control" id="exampleInputNamaRuangan" placeholder="Masukkan Nama Ruangan">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success mr-2">Tambah</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                  </div>
                </form>
              </div>
          </div>
      </div>


      <!-- Table Daftar Ruangan -->
      <div class="card-body">
        <div class="container-fluid">
            <table id="table1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$room->nama_ruang}}</td>
                <td>
                  <button type="button" class="btn btn-warning mr-2"><i class="nav-icon fas fa-edit"></i></button>
                  <button type="button" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></button>
                </td>
            </tr>
                @endforeach
            </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection
