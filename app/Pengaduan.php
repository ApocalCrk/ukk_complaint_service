<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    // Connection Table
    protected $table = 'pengaduan';

    // Fillable
    protected $fillable = ['tgl_pengaduan', 'nik', 'judul_laporan', 'isi_laporan', 'foto', 'status', 'read_by_admin'];

    public function tanggapan(){
        return $this->belongsTo('App\Tanggapan', 'id', 'id_pengaduan');
    }

    public function user() {
        return $this->belongsTo('App\User', 'nik', 'nik');
    }
}
