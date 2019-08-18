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
                        <form action="{{ route('info.update',$pegawai->id) }}" method="post" enctype="multipart/form-data">
                            <input name="_method" type="hidden" value="PATCH"> {{ csrf_field() }}
                            <br>
                            <br>
                            <div class="form-group {{ $errors->has('siswa_id') ? 'has error' : '' }}">
                        <label class="control-label">Judul</label>
                        <input value="{{$pegawai->judul}}" type="text" name="judul" class="form-control" required>
                        @if ($errors->has('siswa_id'))
                        <span class="help-block">
                      <strong>{{ $errors->first('siswa_id') }}</strong>
                  </span> @endif
                    </div>
                    <div class="form-group {{ $errors->has('siswa_id') ? 'has error' : '' }}">
                        <label class="control-label">Isi Informasi</label>
                        <textarea name="isi" id="isi"rows="7" class="form-control ckeditor">{{$pegawai->isi}}</textarea>
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
</div>
@endsection
<script src="{{asset('asset/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
         CKEDITOR.replace( 'isi',{
            customConfig : 'config.js',
          toolbar : 'simple'
         })
</script>