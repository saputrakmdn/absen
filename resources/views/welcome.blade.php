<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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
        <div class="row">
            <div class="col-sm-6">
                <p class="text-center h2">Scan Here</p>
                <p class="text-center">{!! QrCode::size(380)->margin(1)->generate($dt); !!}</p>
            </div>
            <div class="col-sm-6">
                <img class="img-responsive center-block" src="{{ asset('asset/Admin/assets/img/TKJ.png') }}"
                    width="100px" height="100px" style="margin-top:15px;" alt="">
                <p class="text-center h2">Status Absen</p>
                <div style="height: 400px;margin: 0px auto 0px auto; overflow: auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="absen" class="absen">
                            @foreach($absen as $item)
                            <tr>
                                <td>{{$item->siswa->nama}}</td>
                                <td>{{$item->kelas->nama_kelas}}</td>
                                <td>{{$item->tanggal}}</td>
                                <td><strong class="alert-success">Berhasil</strong></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright pull-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())

                </script>, made with <i class="fa fa-heart heart"></i> by Saputra Kamandanu.
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
                                '</td><td>' + response.absen[i]['tanggal'] +
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
