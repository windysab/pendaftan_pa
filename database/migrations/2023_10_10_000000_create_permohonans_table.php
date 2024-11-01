<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah');
            $table->integer('umur_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('pendidikan_ayah');
            $table->text('alamat_ayah');
            $table->string('nama_ibu');
            $table->integer('umur_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('pendidikan_ibu');
            $table->text('alamat_ibu');
            $table->string('nama_calon_suami');
            $table->date('tanggal_lahir_calon_suami');
            $table->string('pekerjaan_calon_suami');
            $table->string('pendidikan_calon_suami');
            $table->text('alamat_calon_suami');
            $table->string('nama_calon_isteri');
            $table->date('tanggal_lahir_calon_isteri');
            $table->string('pekerjaan_calon_isteri');
            $table->string('pendidikan_calon_isteri');
            $table->text('alamat_calon_isteri');
            $table->string('tempat_menikah');
            $table->string('no_surat_penolakan');
            $table->string('lama_hubungan');
            $table->integer('penghasilan_suami');
            $table->string('nama_mertua_laki');
            $table->integer('umur_mertua_laki');
            $table->string('pekerjaan_mertua_laki');
            $table->string('pendidikan_mertua_laki');
            $table->text('alamat_mertua_laki');
            $table->string('nama_mertua_perempuan');
            $table->integer('umur_mertua_perempuan');
            $table->string('pekerjaan_mertua_perempuan');
            $table->string('pendidikan_mertua_perempuan');
            $table->text('alamat_mertua_perempuan');
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
        Schema::dropIfExists('permohonans');
    }
}
