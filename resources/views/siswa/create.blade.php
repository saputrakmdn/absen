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
                        <div class="panel-heading" align="center">MASUKAN SISWA</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('nis') ? ' has-error' : '' }}">
                                <label class="control-label">NIS</label>
                                <input type="number" name="nis" class="form-control" required> @if ($errors->has('nis'))
                                <span class="help-block">
                                <strong>{{ $errors->first('nis') }}</strong>
                            </span> @endif
                            </div>
                            <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label class="control-label">Nama Siswa</label>
                                <input type="text" name="nama" class="form-control" required> @if ($errors->has('nama'))
                                <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span> @endif
                            </div>
                            <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label class="control-label">Tempat Lahir</label>
                                <input type="text" name="tempat" class="form-control" required> @if ($errors->has('nama'))
                                <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span> @endif
                            </div>
                            <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label class="control-label">Tanggal Lahir</label>
                                <input type="date" name="tanggallahir" class="form-control" required> @if ($errors->has('nama'))
                                <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span> @endif
                            </div>
                            <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label class="control-label">No. Handphone</label>
                                <input type="number" name="nohp" class="form-control" required> @if ($errors->has('nama'))
                                <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span> @endif
                            </div>
                            <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                <label class="control-label">Foto</label>
                                <input type="file" name="foto" class="form-control" required> @if ($errors->has('nama'))
                                <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span> @endif
                            </div>
                            <div class="form-group {{ $errors->has('jabatan_id') ? 'has error' : '' }}">
                                <label class="control-label">Jenis Kelamin</label>
                                <select name="jeniskelamin" class="form-control">
                                    <option>-</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @if ($errors->has('jabatan'))
                                <span class="help-block">
			  				<strong>{{ $errors->first('jabatan') }}</strong>
			  			</span> @endif
                            <div class="form-group {{ $errors->has('jabatan_id') ? 'has error' : '' }}">
                                <label class="control-label">Kelas</label>
                                <select name="kelas_id" class="form-control">
                                    <option>-</option>
                                    @foreach($jabatan as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jabatan'))
                                <span class="help-block">
			  				<strong>{{ $errors->first('jabatan') }}</strong>
			  			</span> @endif
                            </div>
                            <div class="form-group {{ $errors->has('jabatan_id') ? 'has error' : '' }}">
                                <label class="control-label">Jurusan</label>
                                <select name="jurusan_id" class="form-control">
                                    <option>-</option>
                                    @foreach($jurusan as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jabatan'))
                                <span class="help-block">
			  				<strong>{{ $errors->first('jabatan') }}</strong>
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