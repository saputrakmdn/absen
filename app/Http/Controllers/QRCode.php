<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Absen;
use App\Info;
use App\Piket;
use App\AbsenGuru;
use Illuminate\Http\Request;
use Telegram;

class QRCode extends Controller
{
    public function index(Request $request){
        $activity = Telegram::getUpdates();
        dd($activity);
        $time = Carbon::now()->toDateString();
        $waktu = Carbon::now()->format('H');
        $jam = Carbon::now()->toTimeString();
        $absen = Absen::where('tanggal', $time)->orderBy('id', 'DESC')->with('siswa', 'kelas')->get();
        $info = Info::all();
        $absenguru = AbsenGuru::where('tanggal', $time)->with('guru')->get();
        $piket = Piket::with(['siswa', 'kelas'])->get();
        $dt = base64_encode($time);
        if($request->ajax()){
            return response()->json(array('absen'=>$absen));
         }
        return view('welcome', compact('dt','piket', 'absen', 'jam','waktu', 'info','time', 'absenguru'));
    }
}
