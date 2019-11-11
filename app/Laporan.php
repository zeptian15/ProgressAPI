<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = "t_laporan";
    protected $fillable = ['berkas_laporan', 'berkas_verifikasi', 'id_progress'];
}