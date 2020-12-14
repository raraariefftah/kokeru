@extends('manager.dashboard_manager')

@section('content')
<!-- Content Header (Page header) -->
<div class="container-fluid">
    <div class="card mt-3 ml-1">
        <div class="card-header">
            <h3 class="card-title">Daftar Cleaning Service</h3>
        </div>

        @if (session('success'))
        <div class="container-fluid pt-2">
            <div class="alert alert-success text-dark" style="background-color: rgb(113, 196, 154);">
                {{ session('success') }}
            </div>
        </div>
        @endif

        {{-- Buttom Tambah --}}
        <div class="row">
            <div class="col-sm ml-4 mt-3">
                <a type="button" class="btn btn-primary" href="/manager/tambah_data_cs"><i class="nav-icon fas fa-plus">
                        Tambah </i></a>
            </div>
        </div>

        <!-- Table Daftar Ruangan -->
        <div class="card-body">
            <div class="container-fluid">
                <table id="table1" class="table table-bordered table-striped">
                    <thead style="text-align: center">
                        <tr>
                            <th width="5px">No</th>
                            <th width="250px">Nama CS</th>
                            <th width="250px">Email</th>
                            <th width="100px">No Hp</th>
                            <th width="100px">Action</th>
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
                                <div class="row">
                                    <div class="col-sm-2 mr-3">
                                        <form action="{{url('/manager/edit_data_cs/'.$c->id_user)}}" method="get">
                                            @csrf
                                            <button class="btn btn-warning"><i
                                                    class="nav-icon fas fa-edit"></i></button>
                                        </form>
                                    </div>
                                    <div class="col-sm-2 ml-2 mr-3">
                                        <form action="{{url('/manager/delete_data_cs/'.$c->id_user)}}" method="post"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger"><i class="nav-icon fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-sm-2 ml-1">
                                        <form action="{{url('/manager/reset_password_cs/'.$c->id_user)}}" method="post"
                                            onsubmit="return confirm('Apakah Anda yakin ingin reset password CS {{$c->nama}}?')">
                                            @method('patch')
                                            @csrf
                                            <button class="btn btn-info"><i class="nav-icon fas fa-key"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
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
