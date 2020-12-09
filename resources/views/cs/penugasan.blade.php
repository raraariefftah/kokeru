@extends('dashboard_cs')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Penugasan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="container-fluid">
            <table id="table1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nama Ruang</th>
                <th>Bukti</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>-</td>
                <td> <button type="button" class="btn btn-success">Danger</button></td>
            </tr>
            </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
@endsection
