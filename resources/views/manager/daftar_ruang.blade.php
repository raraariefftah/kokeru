@extends('manager.dashboard_manager')

@section('content')
<!-- Content Header (Page header) -->
<div class="container-fluid">
    <div class="row ml-1 mt-3 ">
        <!-- left column -->
        <div class="col-md-6.5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Ruangan</h3>
                </div>
                {{-- alert --}}
                @if (session('success'))
                <div class="container-fluid mt-2">
                    <div class="alert alert-success text-dark" style="background-color: rgb(113, 196, 154);">
                        {{ session('success') }}
                    </div>

                </div>
                @endif

                {{-- Buttom Tambah --}}
                <div class="row">
                    <div class="col-sm ml-4 mt-3">
                        <a type="button" class="btn btn-primary" href="/manager/tambah_ruang"><i
                                class="nav-icon fas fa-plus">
                                Tambah </i></a>
                    </div>
                </div>

                <!-- Table Daftar Ruangan -->
                <div class="card-body">
                    <div class="container-fluid">
                        <table id="table1" class="table table-bordered table-striped" style="width: 600px">
                            <thead style="text-align: center">
                                <tr>
                                    <th width="5px">No</th>
                                    <th>Nama Ruang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $room->nama_ruang }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-2 mr-2">
                                                <form action="{{ url('/manager/edit_ruang/' . $room->id_ruang) }}"
                                                    method="get">
                                                    @csrf
                                                    <button class="btn btn-warning"><i
                                                            class="nav-icon fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-sm-2">
                                                <form action="{{ url('/manager/delete_ruang/' . $room->id_ruang) }}"
                                                    method="post"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"><i class="nav-icon fas fa-trash"></i>
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
    </div>
</div>
@endsection
