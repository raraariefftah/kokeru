@extends('manager.dashboard_manager')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="container-fluid pt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Ruang</h3>
      </div>

      {{-- Buttom Tambah --}}
      <div class="row">
        <div class="col-sm ml-4 mt-3">
            <a type="button" class="btn btn-primary" href="/manager/tambah_ruang"><i class="nav-icon fas fa-plus"> Tambah </i></a>
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
