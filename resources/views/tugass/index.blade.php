@extends('layouts.admin') @section('content')
<div class="content">
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-12">
                <a href="{{ url()->previous() }}">
                    <button class="btn btn-default"><span class="ti-back-left"></span>&nbsp;&nbsp;Kembali</button>
                </a>
                <br>
                <br>
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tugas</h4>
                    </div>
                    <div class="panel pull-right">
                    <a class="btn btn-info" data-toggle="modal" data-target="#masuk" ><span class="ti-plus"></span>&nbsp;Tambah</a>&nbsp;
                    </div>
                    <div class="panel-body">
                        {!! $html->table(['class'=>'table-striped']) !!}
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div id="masuk" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Tugas</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('tugas.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('siswa_id') ? 'has error' : '' }}">
                        <label class="control-label">Guru</label>
                        <select name="nama_guru" class="form-control">
                            <option>-</option>
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
                            <option>-</option>
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
                        <textarea name="tugas" id="tugas" rows="7" class="form-control ckeditor"></textarea>
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
<!-- Modal -->
<div id="keluar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Jam Keluar</h4>
            </div>
            <div class="modal-body">
               <form action="{{ route('absen.update', 'test') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
                        <label class="control-label">Pegawai</label>
                        <input type="text" name="pegawai_id" id="pegawai_id" class="form-control" required> @if ($errors->has('pegawai_id'))
                        <span class="help-block">
                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                    </span> @endif
                </div>
                <div class="form-group {{ $errors->has('jam_keluar') ? ' has-error' : '' }}">
                        <label class="control-label">Jam Keluar</label>
                        <input type="time" name="jam_keluar" value="{{ carbon\carbon::now()->timezone('Asia/Jakarta')->format('H:i:s') }}" class="form-control" readonly> @if ($errors->has('jam_keluar'))
                        <span class="help-block">
                        <strong>{{ $errors->first('jam_keluar') }}</strong>
                    </span> @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary panel pull-right"><span class="ti-check"></span>&nbsp;Selesai</button>
                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    //     $('#keluar').on('show.bs.modal', function (event) {
    //         var button = $(event.relatedTarget) 
    //         var pegawai = button.data('mypegawai')            
    //         var modal = $(this)
    //         modal.find('.modal-body #title').val(pegawai);
    //   })
    //     $('#delete').on('show.bs.modal', function (event) {
    //         var button = $(event.relatedTarget) 
    //         var cat_id = button.data('catid') 
    //         var modal = $(this)
    //         modal.find('.modal-body #cat_id').val(cat_id);
    //   })
    function AbsenEdit(url)
    {
        $.('.update').hide();
        $.('#keluar').show();
        $.('.keluar').attr('hidden',false);
        $.ajax({
        url:url,
        _token:token,
        type:'get',
        cache:true,
        contentType:false,
        processData:false,
        async:false,
        dataType:'json',
        success:function(respone){
            $("input#pegawai_id").val(respone.data.pegawai_id);
        },
        complete: function() {
            $('#index').attr('hidden',false);
        }
    });
    }
</script>
<script src="{{asset('asset/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
         CKEDITOR.replace( 'isi',{
            customConfig : 'config.js',
          toolbar : 'simple'
         })
</script> 
@section('scripts') 
{!! $html->scripts() !!} 
@endsection