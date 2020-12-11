<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanUkom extends Model
{
    protected $table = "jawaban_ukom";
    protected $fillable = ['id', 'nama_jawaban', 'format_file', 'kaster'];
    public $timestamps = false;
}
