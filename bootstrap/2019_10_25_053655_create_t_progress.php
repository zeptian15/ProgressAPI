<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTProgress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_progress', function (Blueprint $table) {
            $table->bigIncrements('id_progress');
            $table->string('badan_usaha');
            $table->string('pic');
            $table->string('anggota');
            $table->float('entri_coa');
            $table->float('entri_invoice');
            $table->float('entri_biaya_penyesuaian');
            $table->float('dwld_epnbp_provisional');
            $table->float('dwld_epnbp_final');
            $table->float('entri_epnbp_final');
            $table->float('entri_epnbp_provosional');
            $table->float('analisa_kurang_lebih_bayar');
            $table->float('laporan');
            $table->float('verifikasi_laporan');
            $table->float('persentase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_progress');
    }
}
