@extends('layouts.admin') @section('content')
<div class="content">
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-10">
                <a href="{{ url()->previous() }}">
                    <button class="btn btn-default"><span class="ti-back-left"></span>&nbsp;&nbsp;Kembali</button>
                </a>
                <br>
                <br>
                <div class="card">
                    <div class="panel panel">
                        <div class="panel-heading" align="center">EDIT KELAS</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('guru.update',$guru->id) }}" method="post" enctype="multipart/form-data">
                            <input name="_method" type="hidden" value="PATCH"> {{ csrf_field() }}
                            <br>
                            <br>
                            <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label class="control-label">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required> @if ($errors->has('nama'))
                                <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                                </span> @endif
                                <label class="control-label">Mata Pelajaran</label>
                                <input type="text" name="mapel" class="form-control" value="{{ $guru->mapel }}" required> @if ($errors->has('mapel'))
                                <span class="help-block">
                                <strong>{{ $errors->first('mapel') }}</strong>
                            </span> @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary panel pull-right"><span class="ti-check"></span>&nbsp;Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection