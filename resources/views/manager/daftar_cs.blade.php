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

            <div class="row">
                <div class="col-sm ml-4 mt-3">
                    <a type="button" class="btn btn-primary" href="/manager/tambah_data_cs"><i class="nav-icon fas fa-plus"> Tambah </i></a>
                </div>
            </div>


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
                                    <form action="{{url('/manager/edit_data_cs/'.$c->id_user)}}" method="get" >
                                        @csrf
                                        <button class="btn btn-warning mr-2"><i
                                                class="nav-icon fas fa-edit"></i></button>
                                    </form>

                                    <form action="{{url('/manager/delete_data_cs/'.$c->id_user)}}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger"><i class="nav-icon fas fa-trash"></i>
                                        </button>
                                    </form>

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
