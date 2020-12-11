<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Kelas;
use App\Guru;
use Yajra\DataTables\Html\Builder;
use Image;
use Yajra\Datatables\Datatables;

class TugasController extends Controller
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
        $kelas = Kelas::all();
        $guru = Guru::all();
        if ($request->ajax()) {
            $jabatan = Tugas::with(['kelas']);
            // return Datatables::of($jabatan)->make(true);
            return Datatables::of($jabatan)
            ->addColumn('picture', function ($jabatan) {
                return '<a href="absen/public/tugass/'.$jabatan->file.'"style="width:100px;height:100px;">Download File</a>';
            })->addColumn('isi', function($jabatan){
                return $jabatan->tugas;
            })
            ->addColumn('action', function($jabatan){
                return view('materials._action', [
                'model'=> $jabatan,
                'delete_url'=> route('tugas.destroy', $jabatan->id),
                'edit_url'=>route('tugas.edit', $jabatan->id),
                ]);
            })->rawColumns(['picture', 'action', 'isi'])->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_guru', 'name'=>'nama_guru', 'title'=>'Nama Guru'])
        ->addColumn(['data' => 'kelas.nama_kelas', 'name'=>'isi', 'title'=>'Kelas'])
        ->addColumn(['data' => 'isi', 'name'=>'tugas', 'title'=>'Tugas'])
        ->addColumn(['data' => 'picture', 'name'=>'picture', 'title'=>'File',])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('tugass.index')->with(compact('html', 'guru', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->file('file') != null){
            $filename = $request->file('file')->getClientOriginalName();
            $request->file->move(base_path('public/tugass'), $filename);
            $jabatan = new Tugas();
        $jabatan->nama_guru = $request->nama_guru;
        $jabatan->kelas_id = $request->kelas_id;
        $jabatan->tugas = $request->tugas;
        $jabatan->file = $filename;
        $jabatan->save();
        }else{
            $jabatan = new Tugas();
        $jabatan->nama_guru = $request->nama_guru;
        $jabatan->kelas_id = $request->kelas_id;
        $jabatan->tugas = $request->tugas;
        $jabatan->file = 0;
        $jabatan->save();
        }
        
        return redirect()->route('tugas.index');
    }
    public function getFileName($file)
    {
        if($file != null){
            return str_random(32) . '.' . $file->extension();
        }
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
        $pegawai = Tugas::findOrFail($id)->with('kelas')->first();
        $guru = Guru::all();
        $kelas = Kelas::all();
        return view('tugass.edit', compact('pegawai', 'guru', 'kelas'));
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
        if($request->hasFile('file')){
            $filename = $request->file('file')->getClientOriginalName();
            $request->file->move(base_path('public/tugass'), $filename);
        
        $jabatan = Tugas::find($id);
        $jabatan->nama_guru = $request->nama_guru;
        $jabatan->kelas_id = $request->kelas_id;
        $jabatan->tugas = $request->tugas;
        $jabatan->file = $filename;
        $jabatan->save();
        return redirect()->route('tugas.index');
        }else{
                $jabatan = Tugas::find($id);
                $jabatan->nama_guru = $request->nama_guru;
                $jabatan->kelas_id = $request->kelas_id;
                $jabatan->tugas = $request->tugas;
            $jabatan->save();
            return redirect()->route('tugas.index');
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
        Tugas::destroy($id);
        return redirect()->route('tugas.index');
    }
}
