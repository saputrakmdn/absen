<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Siswa;
use App\Kelas;
use Carbon\Carbon;
use Excel;
use Telegram;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Validator;

class AbsenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
    // {
    //     //
    //     $pegawai = Pegawai::all();
    //     $absen = Absen::orderBy('created_at','decs')->paginate(10);
    //     return view('Absen.index', compact('absen','pegawai'));
    // }
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $absen = Siswa::where('status', false)->with('kelas');
            return Datatables::of($absen)->addColumn('action', function($absen){
                return view('materials._ket', [
                'model'=> $absen,
                'delete_url'=> route('absen.store')
                ]);
            })->make(true);
            }
            $html = $htmlBuilder
            ->addColumn(['data' => 'nis', 'name'=>'siswa.nis', 'title'=>'NIS'])
            ->addColumn(['data' => 'nama', 'name'=>'siswa.nama', 'title'=>'Nama'])
            ->addColumn(['data' => 'kelas.nama_kelas', 'name'=>'kelas.nama_kelas', 'title'=>'Kelas'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

            return view('Absen.index')->with(compact('html'));
    }
    public function input(Request $request, Builder $htmlBuilder)
    {
        $pegawai = Siswa::all();
        $absen = Absen::all();
        // return view('Pegawai.create', compact('pegawai','jabatan'));
        if ($request->ajax()) {
        $pegawai = Siswa::with(['absen']);
        return Datatables::of($pegawai)
        ->addColumn('action', function($pegawai){
            return view('materials._absen', [
            'model'=> $pegawai,
            //
            // 'keluar' => $pegawai->id,
            ]);
        }
        )
        ->make(true);
    }
    $html = $htmlBuilder
    ->addColumn(['data' => 'nis', 'name'=>'nis', 'title'=>'NIS'])
    ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama']);
    // ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
    return view('Absen.input')->with(compact('html','pegawai'));
    }
    public function kelas(Request $request, Builder $htmlBuilder){
        if($request->ajax()){
            $kelas = Kelas::all();
            return Datatables::of($kelas)->addColumn('action', function($kelas){
                return view('materials._view', [
                    'view_url'=> route('kelas', $kelas->id),
                ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'nama_kelas', 'name'=>'nama_kelas', 'title'=>'Nama Kelas'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action', 'orderable'=>false, 'searchable'=>false]);
        return view('Absen.kelas')->with(compact('html'));
    }
    public function absen(Request $request, $id, Builder $htmlBuilder){
        $pegawai = Siswa::where('kelas_id', $id)->get();
        $cok = Kelas::where('id', $id)->first();
        if($request->ajax()){
            $absen = Absen::where('kelas_id', $id)->with('siswa')->get();
            return Datatables::of($absen)->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'siswa.nis', 'name'=>'siswa.nis', 'title'=>'NIS'])
            ->addColumn(['data' => 'siswa.nama', 'name'=>'siswa.nama', 'title'=>'Nama'])
            ->addColumn(['data' => 'tanggal', 'name'=>'tanggal', 'title'=>'Tanggal'])
            ->addColumn(['data' => 'jam_masuk', 'name'=>'jam_masuk', 'title'=>'Jam Masuk'])
            ->addColumn(['data' => 'jam_pulang', 'name'=>'jam_pulang', 'title'=>'Jam Keluar'])
            ->addColumn(['data' => 'keterangan', 'name'=>'keterangan', 'title'=>'keterangan']);

            return view('Absen.input')->with(compact('html', 'pegawai', 'cok'));


    }

    public function store(Request $request)
    {

        $dt = Carbon::now()->toTimeString();
        $time = Carbon::now()->toDateString();
        $absen = new Absen();
        $siswa = Siswa::find($request->id);
        $kelas = Kelas::where('id', $siswa->kelas_id)->first();
        $siswa->status = true;
        if($request->hadir == "hadir"){
            $absen->tanggal = $time;
            $absen->jam_masuk = $dt;
            $absen->keterangan = $request->hadir;
            $absen->siswa_id = $request->id;
            $absen->kelas_id = $siswa->kelas_id;
            $absen->save();
        }else{
            $absen->tanggal = $time;
            $absen->keterangan = $request->hadir;
            $absen->siswa_id = $request->id;
            $absen->kelas_id = $siswa->kelas_id;;
            $absen->save();
        }
        $text = "<b>Absen</b>\n"
                                ."Tanggal: {$time}\n"
                                ."Nama: {$siswa->nama}\n"
                                ."NIS: {$siswa->nis}\n"
                                ."Kelas: {$kelas->nama_kelas}\n"
                                ."Keterangan: {$request->hadir}";
        Telegram::sendMessage([
            'chat_id' => -371554893,
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
        $siswa->save();
        return back();
    }
    public function excel($id){
        $time = Carbon::now()->toDateString();
        $matchThese = ['kelas_id' => $id, 'tanggal' => $time,];
        $kelas = Kelas::where('id', $id)->first();
        $absen = Absen::where($matchThese)->with('siswa', 'kelas')->get();
        $absen_array[] = array('Nama', 'Kelas', 'Tanggal', 'Jam Masuk', 'Jam Keluar', 'Keterangan');
        foreach($absen as $data){
            $absen_array[] = array(
                'Nama' => $data->siswa->nama,
                'kelas' => $data->kelas->nama_kelas,
                'Tanggal' => $data->tanggal,
                'Jam Masuk' => $data->jam_masuk,
                'Jam Keluar' => $data->jam_pulang,
                'Keterangan' => $data->keterangan
            );
        }
        $t = $kelas->nama_kelas.'-'.$time;
        Excel::create('Rekap Absensi-'.$t, function($excel) use ($absen_array){
            $excel->setTitle('Rekap Absensi');
            $excel->sheet('RekapAbsensi', function($sheet) use ($absen_array){
                $sheet->getDefaultStyle()->getAlignment()->setWrapText(true);
                $sheet->getDefaultStyle()->getFont()->setName('Arial');
                $sheet->getDefaultStyle()->getFont()->setSize(12);
                $sheet->fromArray($absen_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }
    public function excelAll($id){
        $kelas = Kelas::where('id', $id)->first();
        $absen = Absen::where('kelas_id', $id)->with('siswa', 'kelas')->get();
        $absen_array[] = array('Nama', 'Kelas', 'Tanggal', 'Jam Masuk', 'Jam Keluar', 'Keterangan');
        foreach($absen as $data){
            $absen_array[] = array(
                'Nama' => $data->siswa->nama,
                'kelas' => $data->kelas->nama_kelas,
                'Tanggal' => $data->tanggal,
                'Jam Masuk' => $data->jam_masuk,
                'Jam Keluar' => $data->jam_pulang,
                'Keterangan' => $data->keterangan
            );
        }
        $t = $kelas->nama_kelas;
        Excel::create('Rekap Absensi-'.$t, function($excel) use ($absen_array){
            $excel->setTitle('Rekap Absensi');
            $excel->sheet('RekapAbsensi', function($sheet) use ($absen_array){
                $sheet->getDefaultStyle()->getAlignment()->setWrapText(true);
                $sheet->getDefaultStyle()->getFont()->setName('Arial');
                $sheet->getDefaultStyle()->getFont()->setSize(12);
                $sheet->fromArray($absen_array, null, 'A2', false, false);
            });
        })->download('xlsx');
    }
}
