<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('asset/Admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <title>Upload</title>
</head>
<body>
<div class="content">
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-10">
            <div style="margin-top:10px;" class="panel"><a href="{{ route('index')}}">
                    <button class="btn btn-default">Home</button>
                </a>
                <br>
                <br></div>
                <div class="card">
                    <div class="panel-body">
                            <div class="form-group">
                                <form action="{{ route('upload.store', ['slug' => 1]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                    <label class="control-label">Klaster 1</label>
                                    <input type="hidden" name="klaster1" value="1">
                                    <input type="file" name="file1" class="form-control" required>
                                    <button type="submit" class="btn btn-primary "><span
                                        class="ti-check"></span>&nbsp;Upload</button>
                                </div>
                                </form>
                                <form action="{{ route('upload.store', ['slug' => 2]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                    <label class="control-label">Klaster 2</label>
                                    <input type="hidden" name="klaster1" value="1">
                                    <input type="file" name="file1[]" class="form-control" multiple required>
                                    <button type="submit" class="btn btn-primary "><span
                                        class="ti-check"></span>&nbsp;Upload</button>
                                </div>
                                </form>
                                <form action="{{ route('upload.store', ['slug' => 3]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                    <label class="control-label">Klaster 3</label>
                                    <input type="hidden" name="klaster1" value="1">
                                    <input type="file" name="file1" class="form-control" required>
                                    <button type="submit" class="btn btn-primary "><span
                                        class="ti-check"></span>&nbsp;Upload</button>
                                </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{ asset('asset/Admin/assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset/Admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
</html>
