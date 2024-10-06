<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGugatansTable extends Migration
{
    public function up()
    {
        Schema::create('gugatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penggugat');
            $table->string('binti_penggugat');
            $table->string('umur_penggugat');
            $table->string('agama_penggugat');
            $table->string('pekerjaan_penggugat');
            $table->string('pendidikan_penggugat');
            $table->string('alamat_penggugat');
            $table->string('nama_tergugat');
            $table->string('bin_tergugat');
            $table->string('umur_tergugat');
            $table->string('agama_tergugat');
            $table->string('pekerjaan_tergugat');
            $table->string('pendidikan_tergugat');
            $table->string('alamat_tergugat');
            $table->string('hari_pernikahan');
            $table->date('tanggal_pernikahan');
            $table->string('desa_pernikahan');
            $table->string('kecamatan_pernikahan');
            $table->string('kabupaten_pernikahan');
            $table->string('nomor_akta_nikah');
            $table->date('tanggal_akta_nikah');
            $table->string('kecamatan_kua');
            $table->string('kabupaten_kua');
            $table->string('tempat_tinggal');
            $table->string('desa');
            $table->string('detail_lainnya')->nullable();
            $table->string('kumpul_baik_selama_tahun');
            $table->string('kumpul_baik_selama_bulan');
            $table->string('jumlah_anak');
            for ($i = 1; $i <= 10; $i++) {
                $table->string("anak_{$i}")->nullable();
                $table->date("tanggal_lahir_anak_{$i}")->nullable();
            }
            $table->date('tanggal_perselisihan')->nullable();
            $table->string('alasan_perselisihan')->nullable();
            $table->text('detail_alasan')->nullable();
            $table->string('upaya_merukunkan');
            $table->date('tanggal_perpisahan')->nullable();
            $table->string('jenis_perpisahan');
            $table->string('siapa_meninggalkan');
            $table->string('desa');
            $table->string('alasan_meninggalkan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gugatans');
    }
}
