<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use Yajra\DataTables\Html\Builder;
use Image;
use Yajra\Datatables\Datatables;

class InfoController extends Controller
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
            $jabatan = Info::select(['id', 'judul', 'isi', 'file']);
            // return Datatables::of($jabatan)->make(true);
            return Datatables::of($jabatan)
            ->addColumn('picture', function ($jabatan) {
                return '<img src="file/'.$jabatan->file.'" alt="tidak ada file" style="width:100px;height:100px;"/>';
            })->addColumn('isi', function($jabatan){
                return $jabatan->isi;
            })
            ->addColumn('action', function($jabatan){
                return view('materials._action', [
                'model'=> $jabatan,
                'delete_url'=> route('info.destroy', $jabatan->id),
                'edit_url'=>route('info.edit', $jabatan->id),
                ]);
            })->rawColumns(['picture', 'action', 'isi'])->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'judul', 'name'=>'judul', 'title'=>'Judul'])
        ->addColumn(['data' => 'isi', 'name'=>'isi', 'title'=>'Informasi'])
        ->addColumn(['data' => 'picture', 'name'=>'picture', 'title'=>'File',])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('info.index')->with(compact('html'));
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
        $filename = $this->getFileName($request->file);
        if($request->file != null){
            $request->file->move(base_path('public/file'), $filename);
        }
        $jabatan = new Info();
        $jabatan->judul = $request->judul;
        $jabatan->isi = $request->isi;
        $jabatan->file = $filename;
        $jabatan->save();
        return redirect()->route('info.index');
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
        $pegawai = Info::findOrFail($id);
        return view('info.edit', compact('pegawai'));
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
        $filename = $this->getFileName($request->file);
        $request->file->move(base_path('public/file'), $filename);
        $jabatan = Info::find($id);
        $jabatan->judul = $request->judul;
        $jabatan->isi = $request->isi;
        $jabatan->file = $filename;
        $jabatan->save();
        return redirect()->route('info.index');
        }else{
        $jabatan = Info::find($id);
        $jabatan->judul = $request->judul;
        $jabatan->isi = $request->isi;
        $jabatan->save();
        return redirect()->route('info.index');
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
        Info::destroy($id);
        return redirect()->route('info.index');
    }
}
