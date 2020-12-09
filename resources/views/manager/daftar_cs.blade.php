@extends('manager.dashboard_manager')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="container-fluid pt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Cleaning Service</h3>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            {{-- Buttom Tambah --}}
            <form href="{{url('/manager/tambah_data_cs')}}" method="get" class="pt-3 pl-4">
                <button type="button" class="btn btn-primary"><i class="nav-icon fas fa-plus"> Tambah </i></button>
            </form>


            <!-- Table Daftar Ruangan -->
            <div class="card-body">
                <div class="container-fluid">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama CS</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cs as $c)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$c->nama}}</td>
                                <td>{{$c->email}}</td>
                                <td>{{$c->no_hp}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-2"><i
                                            class="nav-icon fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.card -->
@endsection
