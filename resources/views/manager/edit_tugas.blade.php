@extends('manager.dashboard_manager')

@section('content')

    {{-- Tambah Ruangan --}}
    <div class="container-fluid">
        <div class="row pt-3 pl-4 justify-content-md-center">
            <!-- left column -->
            <div class="col-md-6">
                @if (session('success'))
                    <div class="alert alert-success text-dark" style="background-color: rgb(113, 196, 154);">
                        {{ session('success') }}
                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit Tugas</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!-- form start -->
                    <form role="form" action="{{ url('/manager/update_tugas/' . $job[0]->id_tugas) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputRuangan">Ruang</label>
                                <select name="ruang" id="inputState" class="form-control">
                                    <option selected value="{{ $job[0]->nama_ruang }}" disabled>{{ $job[0]->nama_ruang }}
                                    </option>
                                    @if ($errors->any())
                                        <option value="{{ old('ruang') }}" selected>{{ old('ruang') }}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_cs">Nama CS</label>
                                <select name="nama_cs" id="nama_cs" class="form-control">
                                    <option selected disabled value="Pilih CS..">Pilih CS..</option>
                                    <option value="{{ $job[0]->nama }}" selected>{{ $job[0]->nama }}</option>
                                    @if ($errors->any())
                                        <option value="{{ old('nama_cs') }}" selected>{{ old('nama_cs') }}</option>
                                    @endif
                                    @foreach ($cs as $c)
                                        <option value="{{ $c->nama }}">{{ $c->nama }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('nama_cs'))
                                    <span class="text-danger">{{ $errors->first('nama_cs') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Status</div>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="status1" name="status" class="custom-control-input"
                                            value="SUDAH" {{ old('status') === 'SUDAH' ?? 'checked' }}>
                                        <label class="custom-control-label" for="status1">SUDAH</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="status2" name="status" class="custom-control-input"
                                            value="BELUM" {{ old('status') === 'BELUM' ?? 'checked' }}>
                                        <label class="custom-control-label" for="status2">BELUM</label>
                                    </div>
                                    @if ($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success mr-2">Ubah</button>
                            <a href="{{ route('dashboard_manager') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
