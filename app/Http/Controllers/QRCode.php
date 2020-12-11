<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Absen;
use App\Info;
use App\Piket;
use App\AbsenGuru;
use Illuminate\Http\Request;
use Telegram;
use App\SoalUkom;
use App\JawabanUkom;

class QRCode extends Controller
{
    public function index(Request $request){
        // $activity = Telegram::getUpdates();
        // dd($activity);
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
        $soal = SoalUkom::get();
        return view('welcome', compact('waktu', 'info', 'absenguru', 'piket', 'dt', 'absen'));
    }

    public function upload(){
        return view('upload');
    }

    public function uploadFile($slug, Request $request){
        switch($slug){
            case 1:
                $jawaban = new JawabanUkom();
                $filename = $request->file('file1')->getClientOriginalName();
                $type = $request->file('file1')->getClientOriginalExtension();
                $request->file1->move(base_path('public/jawaban/klaster1'), $filename);
                $jawaban->nama_jawaban = $filename;
                $jawaban->format_file = $type;
                $jawaban->klaster = 1;
                $jawaban->save();
                return redirect()->back();
            break;
            case 2:
                // dd($request);
                foreach($request->file('file1') as $val ){
                    $jawaban = new JawabanUkom();
                    $filename = $val->getClientOriginalName();
                    $type = $val->getClientOriginalExtension();
                    $val->move(base_path('public/jawaban/klaster2'), $filename);
                    $jawaban->nama_jawaban = $filename;
                    $jawaban->format_file = $type;
                    $jawaban->klaster = 2;
                    $jawaban->save();
                }
                return redirect()->back();
            break;
            case 3:
                $jawaban = new JawabanUkom();
                $filename = $request->file('file1')->getClientOriginalName();
                $type = $request->file('file1')->getClientOriginalExtension();
                $request->file1->move(base_path('public/jawaban/klaster3'), $filename);
                $jawaban->nama_jawaban = $filename;
                $jawaban->format_file = $type;
                $jawaban->klaster = 3;
                $jawaban->save();
                return redirect()->back();
            break;
        }
    }

}
