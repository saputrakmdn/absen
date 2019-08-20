<?php

namespace App;
use App\Absen;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['id','nis','nama', 'jeniskelamin','kelas_id'];
    public $timestamps = false;
    public function Kelas() {
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
    public function Absen() {
        return $this->hasMany('App\Absen', 'siswa_id');
    }
    public function Piket() {
        return $this->hasMany('App\Piket', 'siswa_id');
    }
}
