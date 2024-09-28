<?php
// database/migrations/xxxx_xx_xx_create_gugatans_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGugatansTable extends Migration
{
    public function up()
    {
        Schema::create('gugatans', function (Blueprint $table) {
            $table->id();
            $table->string('penggugat_name');
            $table->text('penggugat_address');
            $table->string('tergugat_name');
            $table->text('tergugat_address');
            $table->date('tanggal_pernikahan');
            $table->string('desa_pernikahan');
            $table->string('kecamatan_pernikahan');
            $table->string('kabupaten_pernikahan');
            $table->string('tempat_tinggal');
            $table->date('tanggal_perselisihan');
            $table->string('alasan_perselisihan');
            $table->text('detail_alasan')->nullable();
            $table->string('upaya_merukunkan');
            $table->date('tanggal_perpisahan');
            $table->string('jenis_perpisahan');
            $table->string('siapa_meninggalkan_rumah');
            $table->string('desa');
            $table->string('alasan_meninggalkan_rumah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gugatans');
    }
}
