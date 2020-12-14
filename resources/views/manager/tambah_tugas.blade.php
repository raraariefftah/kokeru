@extends('manager.dashboard_manager')

@section('content')

    {{-- Tambah Ruangan --}}
    <div class="container-fluid"></div>
    <div class="row pt-3 pl-4 justify-content-md-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Tambah Tugas</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <!-- form start -->
                <form role="form" action="{{ route('tugas_store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputRuangan">Ruang</label>
                            <select name="ruang" id="inputState" class="form-control">
                                <option selected>Pilih ruang..</option>
                                @foreach($rooms as $room)
                                    <option>{{$room->nama_ruang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_cs">Nama CS</label>
                            <select name="nama_cs" id="nama_cs" class="form-control">
                                <option selected>Pilih CS..</option>
                                @foreach($cs as $c)
                                    <option>{{$c->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Status</div>
                            <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="status1" name="status" class="custom-control-input" value="SUDAH">
                                        <label class="custom-control-label" for="status1">SUDAH</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="status2" name="status" class="custom-control-input" value="BELUM">
                                        <label class="custom-control-label" for="status2">BELUM</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mr-2">Tambah</button>
                        <a href="{{route('dashboard_manager')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
