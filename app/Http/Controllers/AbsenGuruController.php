<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\AbsenGuru;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;

class AbsenGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        $guru = Guru::all();
        if($request->ajax()){
            $kelas = AbsenGuru::with('guru');
            return Datatables::of($kelas)->addColumn('action', function($kelas){
                return view('materials._view', [
                    'view_url'=> route('kelas', $kelas->id),
                ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'tanggal', 'name'=>'tanggal', 'title'=>'Tanggal'])
        ->addColumn(['data'=>'guru.nama', 'name'=>'nama', 'title'=>'Nama Guru'])
        ->addColumn(['data'=>'alasan', 'name'=>'alasan', 'title'=>'Alasan'])
        ->addColumn(['data'=>'keterangan', 'name'=>'keterangan', 'title'=>'Keterangan']);
        return view('absenguru.input')->with(compact('html', 'guru'));
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
        
        $jabatan = AbsenGuru::create($request->all());
        return redirect()->route('absenguru.index');
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
        //
    }
}
