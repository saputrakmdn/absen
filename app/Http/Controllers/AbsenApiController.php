<?php

namespace App\Http\Controllers;
use App\Siswa;
use App\Absen;
use App\Tugas;
use App\Piket;
use App\Kelas;
use Telegram;
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
    public function profile($id){
        $data = Siswa::where('id', $id)->with('kelas', 'jurusan')->first();
        return $data;
    }
    public function tugas($id){
        $data = Tugas::where('kelas_id', $id)->with('kelas')->get();
        if($data){
            return $data;
        }else{}
    }
    public function absen($id){
        $month = Carbon::now()->format('m');
        $data = Absen::where('siswa_id', $id)->whereMonth('created_at', '=', $month)->with(['siswa', 'kelas'])->get();
        if($data){
            return $data;
        }else{}
    }
    public function piket(){
        $data = Piket::with(['siswa', 'kelas'])->get();
        return $data;
    }
    public function absenMasuk(Request $request){
        $dt = Carbon::now()->toTimeString();
        $time = base64_decode($request->tanggal);
        $absen = new Absen();
        $absen->tanggal = $time;
        $absen->jam_masuk = $dt;
        $absen->keterangan = "hadir";
        $absen->siswa_id = $request->id;
        $absen->kelas_id = $request->kelas;
        $absen->save();
        $siswa = Siswa::find($request->id);
        $siswa->status = true;
        $siswa->save();
        $kelas = Kelas::where('id', $request->kelas)->first();
        $text = "<b>Absen</b>\n"
                                ."Tanggal: {$time}\n"
                                ."Nama: {$siswa->nama}\n"
                                ."NIS: {$siswa->nis}\n"
                                ."Kelas: {$kelas->nama_kelas}\n"
                                ."Keterangan: Hadir";
        // Telegram::sendMessage([
        //     'chat_id' => -371554893,
        //     'parse_mode' => 'HTML',
        //     'text' => $text
        // ]);
        return $absen;
    }
    public function absenPulang(Request $request){
        $dt = Carbon::now()->toTimeString();
        $absen = Absen::findOrFail($request->id_absen);
        $absen->jam_pulang = $dt;
        $absen->save();
        if($absen){
            return $absen;
        }else{}
    }

    public function jancuk(){
        $c = json_encode("Aku suka dia, dianya kaga");

        return response()->json($c);
    }
}
