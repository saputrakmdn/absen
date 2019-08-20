<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsenGuru extends Model
{
    protected $table = 'absenguru';
    protected $fillable = ['tanggal', 'keterangan',
    'guru_id', 'alasan'];
    public $timestamps = false;

    public function Guru() {
        return $this->belongsTo('App\Guru', 'guru_id');
    }
}
