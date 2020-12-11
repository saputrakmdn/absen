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
                        <form action="{{ route('ukom.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                    <label class="control-label">Klaster 1</label>
                                    <input type="hidden" name="klaster1" value="1">
                                    <input type="file" name="file1" class="form-control" required>
                                </div>
                                <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                    <label class="control-label">Klaster 2</label>
                                    <input type="hidden" name="klaster2" value="2">
                                    <input type="file" name="file2" class="form-control" required>
                                </div>
                                <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                    <label class="control-label">Klaster 3</label>
                                    <input type="hidden" name="klaster3" value="3">
                                    <input type="file" name="file3" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary panel pull-right"><span
                                        class="ti-check"></span>&nbsp;Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
