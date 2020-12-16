@extends('manager.dashboard_manager')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="container-fluid pt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Tugas</h3>
            </div>

            <form>
                <div class="form-row align-items-center pt-3 pl-4">
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary"><i class="nav-icon fas fa-plus"> Tambah </i></button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" style="background-color: rebeccapurple"><i
                                class="nav-icon fas fa-file"> Laporan </i></button>
                    </div>
                </div>
            </form>

            {{-- Tambah Tugas muncul ketika tombol +Tambah --}}
            <div class="container-fluid"></div>
            <div class="row pt-3 pl-4">
                <!-- left column -->
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Tugas</h3>
                        </div>
                        <!-- /.card-header -->

                    </div>
                </div>
            </div>

            {{-- pilih tanggal --}}
            <div class="row pt-3 pl-4">
                <!-- kolom -->
                <div class="col-md-2">
                    <select id="inputState" class="form-control">
                        <option selected>Pilih Tanggal</option>
                        {{-- default tanggal hari ini / pakek kalender untuk memilih tanggal
                        sebelumnya --}}
                    </select>
                </div>
            </div>

            <div class="row pt-3 pl-4">
                <!-- left column -->
                <div class="col-md-2">
                    <select id="inputState" class="form-control">
                        <option selected>Pilih Status</option>
                        <option>SEMUA</option>
                        <option>BELUM</option>
                        <option>SUDAH</option>
                    </select>
                </div>

            </div>

            <!-- Table Daftar Ruangan -->
            <div class="card-body">
                <div class="container-fluid">
                    <table id="table1" class="table table-bordered table-striped ">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Ruang</th>
                                <th>Nama CS</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $job->nama_ruang }}</td>
                                    <td>{{ $job->nama }}</td>
                                    <td>{{ $job->status }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning mr-2"><i
                                                class="nav-icon fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger"><i
                                                class="nav-icon fas fa-trash"></i></button>
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
