<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\SoalUkom;
use App\JawabanUkom;

class UkomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, Builder $htmlBuilder){
        if ($request->ajax()) {
            $jabatan = JawabanUkom::all();
            // return Datatables::of($jabatan)->make(true);
            return Datatables::of($jabatan)
            ->addColumn('picture', function ($jabatan) {
                return '<a href="jawaban/klaster'.$jabatan->klaster.'/'.$jabatan->nama_jawaban.'" style="width:100px;height:100px;">Download File</a>';
            })->rawColumns(['picture'])->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_jawaban', 'name'=>'nama_jawaban', 'title'=>'Jawaban'])
        ->addColumn(['data' => 'format_file', 'name'=>'format_file', 'title'=>'Format File'])
        ->addColumn(['data'=> 'klaster', 'name'=> 'klaster', 'title'=> 'Klaster'])
        ->addColumn(['data' => 'picture', 'name'=>'picture', 'title'=>'File',]);
        return view('ukom.index')->with(compact('html'));
    }

    public function upload(){
        return view('ukom.upload');
    }

    public function uploadFile(Request $request){
    //    dd($request);
    $klaster1 = new SoalUkom();
    $filename = $request->file('file1')->getClientOriginalName();
    $request->file1->move(base_path('public/soal'), $filename);
    $klaster1->nama_soal = $filename;
    $klaster1->klaster = $request->klaster1;
    $klaster1->save();
    $klaster2 = new SoalUkom();
    $filename2 = $request->file('file2')->getClientOriginalName();
    $request->file2->move(base_path('public/soal'), $filename2);
    $klaster2->nama_soal = $filename2;
    $klaster2->klaster = $request->klaster2;
    $klaster2->save();
    $klaster3 = new SoalUkom();
    $filename3 = $request->file('file3')->getClientOriginalName();
    $request->file3->move(base_path('public/soal'), $filename3);
    $klaster3->nama_soal = $filename3;
    $klaster3->klaster = $request->klaster3;
    $klaster3->save();
    return redirect()->back();
    }
}
