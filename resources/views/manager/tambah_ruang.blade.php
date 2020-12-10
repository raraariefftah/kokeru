@extends('manager.dashboard_manager')

@section('content')

    <div class="container-fluid">
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
                    <form role="form" action="{{ route('ruang_store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputNamaRuangan">Nama Ruang</label>
                                <input name="nama" class="form-control" id="exampleInputNamaRuangan"
                                    placeholder="Masukkan Nama Ruangan">
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
    </div>
    <!-- /.card -->
@endsection
