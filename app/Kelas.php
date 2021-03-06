<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas'];
    public $timestamps = false;
    public function Siswa() {
        return $this->hasMany('App\Siswa', 'kelas_id');
    }
    public function Absen(){
        return $this->hasMany('App\Absen', 'kelas_id');
    }
    public function Piket() {
        return $this->hasMany('App\Piket', 'kelas_id');
    }
    public function Tugas(){
        return $this->hasMany('App\Tugas', 'kelas_id');
    }
}
