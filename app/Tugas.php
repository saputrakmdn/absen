<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = ['id', 'nama_guru', 'kelas_id', 'tugas', 'file'];
    public $timestamps = false;

    public function Kelas(){
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
}
