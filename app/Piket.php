<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piket extends Model
{
    protected $table = 'piket';
    protected $fillable = ['id','siswa_id', 'kelas_id'];
    public $timestamps = false;
    public function Siswa() {
        return $this->belongsTo('App\Siswa', 'siswa_id');
    }
    public function Kelas() {
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
}
