<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="200">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('asset/Admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <title>Absensi TKJ</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #000;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            font-color: black;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
    <h1 class="text-center display-1" style="margin-top:50px;">Pusat Informasi TKJ SMKN 5 Kab. Tangerang</h1>
        <div style="margin-top:20px;" class="row">
            <div class="col-sm-4">
                
                @switch($waktu)
                @case('06')
                <p class="text-center h2">Scan Here</p>
                <p class="text-center">{!! QrCode::size(380)->margin(1)->generate($dt); !!}</p>
                @break
                @case('07')
                <p class="text-center h2">Scan Here</p>
                <p class="text-center">{!! QrCode::size(380)->margin(1)->generate($dt); !!}</p>
                @break
                @case('15')
                <p class="text-center h2">Scan Here</p>
                <p class="text-center">{!! QrCode::size(380)->margin(1)->generate($dt); !!}</p>
                @break
                @case('16')
                <p class="text-center h2">Scan Here</p>
                <p class="text-center">{!! QrCode::size(380)->margin(1)->generate($dt); !!}</p>
                @break
                @case('17')
                <p class="text-center h2">Scan Here</p>
                <p class="text-center">{!! QrCode::size(380)->margin(1)->generate($dt); !!}</p>
                @break
                @default
                <pre style="background: #0258c9;"><p class="text-center h3">Informasi</p></pre>
                <div style="height: 400px;margin: 0px auto 0px auto; overflow: auto; border: 3px solid black;">
                @forelse($info as $data)
                <h3 class="text-center display-3"><b>{{$data->judul}}</b></h3>
                <pre>{!!$data->isi!!}</pre>           
                <p class="text-center"><img src="file/{{$data->file}}" class="img-responsive"  alt="" srcset=""></p>
                @empty
                <p class="text-center h1">Tidak Ada Informasi</p>
                @endforelse
                </div>
                @endswitch

                
                
            </div>
            <div class="col-sm-8">
                <pre style="background: #0258c9;"><p class="text-center h3">Status Absen</p></pre>
                <div style="height: 200px;margin: 0px auto 0px auto; overflow: auto;">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="absen" class="absen">
                            @foreach($absen as $item)
                            <tr>
                                <td>{{$item->siswa->nama}}</td>
                                <td>{{$item->kelas->nama_kelas}}</td>
                                <td>{{$item->tanggal}}</td>
                                <td>{{$item->keterangan}}</td>
                                <td><strong class="alert-success">Berhasil</strong></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                <pre style="background: #0258c9;"><p class="text-center h4">Piket Jurusan</p></pre>
                <table class="table table-striped table-bordered">
                        <thead >
                            <tr>
                                <th>Nama</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($piket as $data)
                        <tr>
                        <td>{{$data->siswa->nama}}</td>
                        <td>{{$data->kelas->nama_kelas}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                </div>
                <div class="col-sm-6"><pre style="background: #0258c9;"><p class="text-center h4">Guru Tidak Hadir</p></pre>
                <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Guru</th>
                                <th>Alasan</th>
                                <th>Keteranagan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($absenguru as $data)
                        <tr>
                        <td>{{$data->guru->nama}}</td>
                        <td>{{$data->alasan}}</td>
                        <td>{{$data->keterangan}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer" style="margin-top:40px;">
        <div class="container-fluid">
        <div class="pull-left">
    Supported by:
    <img src="{{asset('asset/logo/TKJ.png')}}" style="height:60px; width:50px; margin-right: 10px;"  alt="" srcset="">
    <img src="{{asset('asset/logo/smkn5.png')}}"  alt="" style="height:50px; width:50px;"  srcset="">
    <img src="{{asset('asset/logo/bestkj.png')}}" style="height:60px; width:60px; margin-left: 10px;"  alt="" srcset="">
    </div>
            <div class="copyright pull-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())

                </script>, Created by Saputra Kamandanu.
            </div>
        </div>
    </footer>
</body>
<script src="{{ asset('asset/Admin/assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset/Admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        setInterval(function () {
            $.ajax({
                url: '/',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (response.absen.length > 0) {
                        var absen = '';
                        for (var i = 0; i < response.absen.length; i++) {
                            absen = absen + '<tr><td>' + response.absen[i].siswa['nama'] +
                                '</td><td>' + response.absen[i].kelas['nama_kelas'] +
                                '</td><td>' + response.absen[i]['tanggal'] +'</td><td>'+response.absen[i]['keterangan']+
                                '</td><td><strong class="alert-success">Berhasil</strong></td></tr>';
                        }
                        $('#absen').empty();
                        $('#absen').append(absen);
                    }
                },
                error: function (err) {

                }
            })
        }, 1000);
    });

</script>

</html>
