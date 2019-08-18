<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Absen;
use App\Info;
use App\Piket;
use Illuminate\Http\Request;

class QRCode extends Controller
{
    public function index(Request $request){
        $time = Carbon::now()->toDateString();
        $waktu = Carbon::now()->format('H');
        $jam = Carbon::now()->toTimeString();
        $absen = Absen::where('tanggal', $time)->orderBy('id', 'DESC')->with('siswa', 'kelas')->get();
        $info = Info::all();
        $piket = Piket::with(['siswa', 'kelas'])->get();
        $dt = base64_encode($time);
        if($request->ajax()){
            return response()->json(array('absen'=>$absen));
         }
        return view('welcome', compact('dt','piket', 'absen', 'jam','waktu', 'info'));
    }
}
