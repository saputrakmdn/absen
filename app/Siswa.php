<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nis','nama','kelas_id'];
    public $timestamps = false;
    public function Kelas() {
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
}
