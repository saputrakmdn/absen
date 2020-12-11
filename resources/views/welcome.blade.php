<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="200">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#"><img src="https://home.smkn5kabtangerangmauk.sch.id/wp-content/uploads/2020/07/LOGO-SMK-150x150.png" alt="" srcset="" style="width: 50px; height:50px;"><span class="font-weight-bolder m-2">SMKN 5 Kab. Tangerang</span></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     
    </ul>
    <div class=" my-2 my-lg-0 ">
        <h2 class=" badge-pill badge-primary btn btn-primary btn-sm " id="date"><i class="fa fa-calendar mr-2" aria-hidden="true"></i>Kamis, 11 Desember 2020</h2>
        <h2 class=" badge-pill badge-danger btn btn-danger btn-sm" id="time"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>20:20</h2>
    </div>
  </div>
    </nav>
    <main>
    <div class="container-fluid">
    <p class="text-center display-4" style="margin-top:10px;">Pusat Informasi TKJ SMKN 5 Kab. Tangerang</p>
        <div style="margin-top:10px;" class="row">
            <div class="col-sm-6">
                
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
                <div style="height: 380px;margin: 0px auto 0px auto; overflow: auto; border: 3px solid black;">
                @forelse($info as $data)
                <!-- <h3 class="text-center display-3"><b>{{$data->judul}}</b></h3> -->
                <pre>{!!$data->isi!!}</pre>           
                <p class="text-center"><img src="file/{{$data->file}}" class="img-responsive"  alt="" srcset=""></p>
                @empty
                <p class="text-center h1">Tidak Ada Informasi</p>
                @endforelse
                </div>
                @endswitch

                
                
            </div>
            <div class="col-sm-6">
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
                <div class="row">
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
    </div>
    </main>
    <footer class="navbar navbar-expand-sm bg-secondary navbar-secondary fixed-bottom">
      <div class="container">
      <div class="pull-left">
        <span class="text-light">Support By: <img src="{{asset('asset/logo/bestkj.png')}}" style="height:50px; width:50px; margin-left: 10px;"  alt="" srcset=""></span>
        </div>
      </div>
      <div class=" pull-right w-25 ">
      <span class="text-light">
                &copy;
                <script>
                    document.write(new Date().getFullYear())

                </script>, Created by <a href="https://skmdn.com" style="text-decoration: none;color: inherit;" target="_blank">skmdn.com</a>.</span>
            </div>
        </div>
    </footer>
 
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        var date = new Date();
        var tahun = date.getFullYear();
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();
        
        switch (hari) {
            case 0:
                hari = "Minggu";
                break;
            case 1:
                hari = "Senin";
                break;
            case 2:
                hari = "Selasa";
                break;
            case 3:
                hari = "Rabu";
                break;
            case 4:
                hari = "Kamis";
                break;
            case 5:
                hari = "Jum'at";
                break;
            case 6:
                hari = "Sabtu";
                break;
        }
        switch (bulan) {
            case 0:
                bulan = "Januari";
                break;
            case 1:
                bulan = "Februari";
                break;
            case 2:
                bulan = "Maret";
                break;
            case 3:
                bulan = "April";
                break;
            case 4:
                bulan = "Mei";
                break;
            case 5:
                bulan = "Juni";
                break;
            case 6:
                bulan = "Juli";
                break;
            case 7:
                bulan = "Agustus";
                break;
            case 8:
                bulan = "September";
                break;
            case 9:
                bulan = "Oktober";
                break;
            case 10:
                bulan = "November";
                break;
            case 11:
                bulan = "Desember";
                break;
        }
        var date = "<i class='fa fa-calendar mr-2' aria-hidden='true'></i>" + hari + ", " + tanggal + " " + bulan + " " + tahun;
        
        $('#date').html(date)
        setInterval(function(){
            var date = new Date();
            var jam = date.getHours();
            var menit = date.getMinutes();
            var detik = date.getSeconds();
            var tampilWaktu = "<i class='fa fa-clock-o mr-2' aria-hidden='true'></i>" + jam + ":" + menit + ":" + detik;
            $('#time').html(tampilWaktu);
        }, 1);
    });

</script>

</html>
