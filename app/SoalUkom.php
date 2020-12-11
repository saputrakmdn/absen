<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalUkom extends Model
{
    protected $table = "soal_ukom";
    protected $fillable = ['id', 'nama_soal', 'kaster'];
    public $timestamps = false;
}
