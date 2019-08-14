<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Absen;
use Illuminate\Http\Request;

class QRCode extends Controller
{
    public function index(Request $request){
        $time = Carbon::now()->toDateString();
        $absen = Absen::where('tanggal', $time)->orderBy('id', 'DESC')->with('siswa', 'kelas')->get();
        $dt = base64_encode($time);
        if($request->ajax()){
            return response()->json(array('absen'=>$absen));
         }
        return view('welcome', compact('dt', 'absen'));
    }
}
