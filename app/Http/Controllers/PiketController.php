<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piket;
use App\Siswa;
use App\Kelas;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;

class PiketController extends Controller
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
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        if ($request->ajax()) {
            $pegawai = Piket::with(['siswa', 'kelas']);
            // return Datatables::of($pegawai)->make(true);
            return Datatables::of($pegawai)
            ->addColumn('action', function($pegawai){
                return view('materials._action', [
                'model'=> $pegawai,
                'delete_url'=> route('piket.destroy', $pegawai->id),
                'edit_url' => route('piket.edit', $pegawai->id),
                ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'siswa.nama', 'name'=>'siswa.nama', 'title'=>'Nama Siswa'])
        ->addColumn(['data' => 'kelas.nama_kelas', 'name'=>'kelas.nama_kelas', 'title'=>'Kelas'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('piket.index')->with(compact('html', 'siswa', 'kelas'));
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
        $pegawai = Piket::create($request->all());
        return redirect()->route('piket.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Piket::destroy($id);
        return redirect()->route('piket.index');
    }
}
