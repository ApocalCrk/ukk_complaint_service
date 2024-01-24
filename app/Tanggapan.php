<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    // Connection Table
    protected $table = 'tanggapan';

    // Fillable
    protected $fillable = ['id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas', 'read_by_user'];

    public function pengaduan(){
        return $this->belongsTo('App\Pengaduan', 'id_pengaduan');
    }

    public function petugas(){
        return $this->belongsTo('App\User', 'id_petugas', 'nik');
    }
}
