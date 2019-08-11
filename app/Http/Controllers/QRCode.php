<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;

class QRCode extends Controller
{
    public function index(){
        $time = Carbon::now()->toDateString();
        $dt = base64_encode($time);
        return view('welcome', compact('dt'));
    }
}
