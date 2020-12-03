@extends('dashboard_manager')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Tugas</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="container-fluid">
            <table id="table1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nama Ruang</th>
                <th>Nama CS</th>
                <th>Bukti</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td> <button type="button" class="btn btn-danger">Reset</button></td>
            </tr>
            </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
@endsection
