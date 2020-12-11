<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('asset/Admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <title>ukom</title>
    <style>
        #something {
            position: absolute;
            /* height: 200px;
    width: 400px; */
            margin: -100px 0 0 -200px;
            top: 50%;
            left: 50%;
        }

    </style>
</head>

<body>
    <div class="row">
        <div id="something">
            <h1 style="margin-left:40px;">Download Soal</h1>
            <div style="margin-top: 50px;">
            @foreach($soal as $value)
            <a type="button" href="{{asset('soal/'.$value->nama_soal)}}" class="btn btn-primary btn-lg">Klaster {{$value->klaster}}</a>
            @endforeach
            </div>
            <a href="{{route('upload.index')}}" type="button" class="btn btn-primary btn-lg" style="margin-left:70px; margin-top: 50px;"> Upload Jawaban</a>
        </div>

    </div>
</body>
<script src="{{ asset('asset/Admin/assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset/Admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

</html>
