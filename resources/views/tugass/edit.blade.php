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
                        <div class="panel-heading" align="center">EDIT Info</div>
                    </div>
                    <div class="panel-body">
                    <form action="{{ route('tugas.update', $pegawai->id) }}" method="post" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH"> {{ csrf_field() }}
                <div class="form-group {{ $errors->has('siswa_id') ? 'has error' : '' }}">
                        <label class="control-label">Guru</label>
                        <select name="nama_guru" class="form-control">
                            <option>{{$pegawai->nama_guru}}</option>
                            @foreach($guru as $data)
                            <option value="{{$data->nama}}">{{$data->nama}}</option>
                            @endforeach
                            
                        </select>
                        @if ($errors->has('siswa_id'))
                        <span class="help-block">
                      <strong>{{ $errors->first('siswa_id') }}</strong>
                  </span> @endif
                    </div>
                    <div class="form-group {{ $errors->has('siswa_id') ? 'has error' : '' }}">
                        <label class="control-label">Kelas</label>
                        <select name="kelas_id" class="form-control">
                            <option value="{{$pegawai->kelas_id}}">{{$pegawai->kelas->nama_kelas}}</option>
                            @foreach($kelas as $data)
                            <option value="{{$data->id}}">{{$data->nama_kelas}}</option>
                            @endforeach
                            
                        </select>
                        @if ($errors->has('siswa_id'))
                        <span class="help-block">
                      <strong>{{ $errors->first('siswa_id') }}</strong>
                  </span> @endif
                    </div>
                    <div class="form-group {{ $errors->has('siswa_id') ? 'has error' : '' }}">
                        <label class="control-label">Tugas</label>
                        <textarea name="tugas" id="tugas" rows="7" class="form-control ckeditor">{{$pegawai->tugas}}</textarea>
                        @if ($errors->has('siswa_id'))
                        <span class="help-block">
                      <strong>{{ $errors->first('siswa_id') }}</strong>
                  </span> @endif
                    </div>
                    <div class="form-group {{ $errors->has('siswa_id') ? 'has error' : '' }}">
                        <label class="control-label">File</label>
                        <input type="file" name="file" id="file">
                        @if ($errors->has('siswa_id'))
                        <span class="help-block">
                      <strong>{{ $errors->first('siswa_id') }}</strong>
                  </span> @endif
                    </div>    
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary panel pull-right"><span class="ti-check"></span>&nbsp;Selesai</button>
            </div>
        </div>
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script src="{{asset('asset/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
         CKEDITOR.replace( 'isi',{
            customConfig : 'config.js',
          toolbar : 'simple'
         })
</script>