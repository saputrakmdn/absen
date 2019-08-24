<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $fillable = ['nama', 'id', 'kode_jurusan'];
    public $timestamps = false;
    public function Siswa() {
        return $this->hasMany('App\Siswa', 'jurusan_id');
    }
}
