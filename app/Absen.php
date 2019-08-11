<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa;
use App\Kelas;

class Absen extends Model
{
    protected $table = 'absens';
    protected $fillable = ['tanggal','jam_masuk',
    'jam_pulang', 'keterangan',
    'siswa_id', 'kelas_id'];
    public $timestamp = 'true';

    public function Siswa() {
        return $this->belongsTo('App\Siswa', 'siswa_id');
    }
    public function Kelas(){
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
}
