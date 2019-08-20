<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['nama', 'mapel'];
    public $timestamps = false;
    public function AbsenGuru() {
        return $this->hasMany('App\AbsenGuru', 'guru_id');
    }
}
