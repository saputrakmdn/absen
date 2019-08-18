<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';
    protected $fillable = ['judul', 'isi', 'file'];
    public $timestamps = false;
}
