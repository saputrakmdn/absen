<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;

class QRCode extends Controller
{
    public function index(){
        $dt = Carbon::now()->toDateString();

        return view('welcome', compact('dt'));
    }
}
