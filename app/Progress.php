<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $table = "t_progress";
    protected $fillable = ['badan_usaha','pic','anggota','entri_coa', 'entri_invoice', 'entri_biaya_penyesuaian', 'dwld_epnbp_provisional', 'dwld_epnbp_final', 'entri_epnbp_final', 'entri_epnbp_provisional', 'analisa_kurang_lebih_bayar', 'laporan', 'verifikasi_laporan','persentase'];
}
