<?php

namespace App\Http\Controllers;
use App\Siswa;
use App\Absen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenApiController extends Controller
{
    public function login(Request $request){
        $cari = $request->get('nis');
        $data = Siswa::where('nis', 'like', '%' .  $cari . '%')->first();
        if($data){
            return $data;
        }else{}
    }
    public function absenMasuk(Request $request){
        $dt = Carbon::now()->toTimeString();
        $time = base64_decode($request->tanggal);
        $absen = new Absen();
        $absen->tanggal = $time;
        $absen->jam_masuk = $dt;
        $absen->siswa_id = $request->id;
        $absen->kelas_id = $request->kelas;
        $absen->save();
        return $absen;
    }
    public function absenPulang(Request $request){
        $dt = Carbon::now()->toTimeString();
        $absen = Absen::find($request->id_absen);
        $absen->jam_pulang = $dt;
        $absen->save();
        return $absen;
    }
}
