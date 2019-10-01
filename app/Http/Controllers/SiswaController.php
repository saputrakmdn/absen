<?php

namespace App\Http\Controllers;
use App\Siswa;
use App\Kelas;
use App\Jurusan;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
		
        if ($request->ajax()) {
            $pegawai = Siswa::with(['kelas', 'jurusan']);
            // return Datatables::of($pegawai)->make(true);

            return Datatables::of($pegawai)
            ->addColumn('action', function($pegawai){
                return view('materials._action', [
                'model'=> $pegawai,
                'delete_url'=> route('siswa.destroy', $pegawai->id),
                'edit_url' => route('siswa.edit', $pegawai->id),
                ]);
            })->addColumn('picture', function ($jabatan) {
                return '<img src="absen/public/fotosiswa/'.$jabatan->foto.'" alt="tidak ada file" style="width:100px;height:100px;"/>';
            })->rawColumns(['action', 'picture'])->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nis', 'name'=>'nis', 'title'=>'NIS'])
        ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama'])
        ->addColumn(['data' => 'tempat', 'name'=>'nama', 'title'=>'Tempat Lahir'])
        ->addColumn(['data' => 'tanggallahir', 'name'=>'nama', 'title'=>'Tanggal Lahir'])
        ->addColumn(['data'=> 'jeniskelamin', 'name'=>'jeniskelamin', 'title'=>'Jenis Kelamin'])
        ->addColumn(['data' => 'nohp', 'name'=>'nama', 'title'=>'No. Handphone'])
        ->addColumn(['data' => 'kelas.nama_kelas', 'name'=>'kelas.nama_kelas', 'title'=>'Kelas'])
        ->addColumn(['data' => 'jurusan.nama', 'name'=>'jurusan.nama', 'title'=>'Jurusan'])
        ->addColumn(['data' => 'picture', 'name'=>'picture', 'title'=>'Foto'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('siswa.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Siswa::all();
        $jabatan = Kelas::all();
        $jurusan = Jurusan::all();
        return view('siswa.create', compact('pegawai','jabatan', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        ['nis' => 'required|numeric|unique:siswa',
        'nama' => 'required',
        'kelas_id' => 'required']);
        $filename = $request->file('foto')->getClientOriginalName();
        $request->foto->move(base_path('public/fotosiswa'), $filename);
        $jabatan = new Siswa();
        $jabatan->nis = $request->nis;
        $jabatan->nama = $request->nama;
        $jabatan->tempat = $request->tempat;
        $jabatan->tanggallahir = $request->tanggallahir;
        $jabatan->nohp = $request->nohp;
        $jabatan->jeniskelamin = $request->jeniskelamin;
        $jabatan->foto = $filename;
        $jabatan->jurusan_id = $request->jurusan_id;
        $jabatan->kelas_id = $request->kelas_id;
        $jabatan->save();
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Siswa::findOrFail($id);
        $jabatan = Kelas::all();
        $jurusan = Jurusan::all();
        $jurusanselect = Siswa::findOrFail($pegawai->id)->jurusan_id;
        $jabatanselect = Siswa::findOrFail($pegawai->id)->kelas_id;
        return view('siswa.edit',compact('pegawai','jabatan','jabatanselect', 'jurusan', 'jurusanselect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if($request->hasFile('foto')){
            $jabatan = Siswa::find($id);
            $filename = $jabatan->foto;
        $request->foto->move(base_path('public/fotosiswa'), $filename);
        $jabatan = Siswa::find($id);
        $jabatan->nis = $request->nis;
        $jabatan->nama = $request->nama;
        $jabatan->tempat = $request->tempat;
        $jabatan->tanggallahir = $request->tanggallahir;
        $jabatan->nohp = $request->nohp;
        $jabatan->jeniskelamin = $request->jeniskelamin;
        $jabatan->foto = $filename;
        $jabatan->jurusan_id = $request->jurusan_id;
        $jabatan->kelas_id = $request->kelas_id;
        $jabatan->save();
        return redirect()->route('siswa.index');
        }else{
        $jabatan = Siswa::find($id);
        $jabatan->nis = $request->nis;
        $jabatan->nama = $request->nama;
        $jabatan->tempat = $request->tempat;
        $jabatan->tanggallahir = $request->tanggallahir;
        $jabatan->nohp = $request->nohp;
        $jabatan->jeniskelamin = $request->jeniskelamin;
        $jabatan->jurusan_id = $request->jurusan_id;
        $jabatan->kelas_id = $request->kelas_id;
        $jabatan->update();
        return redirect()->route('siswa.index');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::destroy($id);
        return redirect()->route('siswa.index');
    }
}
