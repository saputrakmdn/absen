<?php

namespace App\Http\Controllers;
use DB;
use App\Kelas;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;

class KelasController extends Controller
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
            $jabatan = Kelas::select(['id', 'nama_kelas']);
            // return Datatables::of($jabatan)->make(true);
            return Datatables::of($jabatan)
            ->addColumn('action', function($jabatan){
                return view('materials._action', [
                'model'=> $jabatan,
                'delete_url'=> route('kelas.destroy', $jabatan->id),
                'edit_url' => route('kelas.edit', $jabatan->id),
                ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_kelas', 'name'=>'nama_kelas', 'title'=>'Nama Kelas'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('kelas.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama_kelas' => 'required|unique:kelas']);
        $jabatan = Kelas::create($request->all());
        return redirect()->route('kelas.index');
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
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit',compact('kelas'));
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
        $this->validate($request, ['nama_kelas' => 'required|unique:kelas']);
        $jabatan = Kelas::find($id);
        $jabatan->update($request->all());
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::destroy($id);
        return redirect()->route('kelas.index');
    }
}
