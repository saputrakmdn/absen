<?php

namespace App\Http\Controllers;
use App\Siswa;
use App\Kelas;
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
            $pegawai = Siswa::with(['kelas']);
            // return Datatables::of($pegawai)->make(true);
            return Datatables::of($pegawai)
            ->addColumn('action', function($pegawai){
                return view('materials._action', [
                'model'=> $pegawai,
                'delete_url'=> route('siswa.destroy', $pegawai->id),
                'edit_url' => route('siswa.edit', $pegawai->id),
                ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nis', 'name'=>'nis', 'title'=>'NIS'])
        ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama'])
        ->addColumn(['data'=> 'jeniskelamin', 'name'=>'jeniskelamin', 'title'=>'Jenis Kelamin'])
        ->addColumn(['data' => 'kelas.nama_kelas', 'name'=>'jabatan.kelas.nama_kelas', 'title'=>'Kelas'])
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
        return view('siswa.create', compact('pegawai','jabatan'));
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
        $pegawai = Siswa::create($request->all());
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
        $jabatanselect = Siswa::findOrFail($pegawai->id)->kelas_id;
        return view('siswa.edit',compact('pegawai','jabatan','jabatanselect'));
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
        $this->validate($request, 
        [
            'nama' => 'required',
            'kelas_id' => 'required'
        ]);
        $pegawai = Siswa::find($id);
        $pegawai->update($request->all());
        return redirect()->route('siswa.index');
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
