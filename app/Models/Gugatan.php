<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gugatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penggugat',
        'binti_penggugat',
        'umur_penggugat',
        'agama_penggugat',
        'pekerjaan_penggugat',
        'pendidikan_penggugat',
        'alamat_penggugat',
        'nama_tergugat',
        'bin_tergugat',
        'umur_tergugat',
        'agama_tergugat',
        'pekerjaan_tergugat',
        'pendidikan_tergugat',
        'alamat_tergugat',
        'hari_pernikahan',
        'tanggal_pernikahan',
        'desa_pernikahan',
        'kecamatan_pernikahan',
        'kabupaten_pernikahan',
        'nomor_akta_nikah',
        'tanggal_akta_nikah',
        'kecamatan_kua',
        'kabupaten_kua',
        'tempat_tinggal',
        'desa',
        'detail_lainnya',
        'kumpul_baik_selama_tahun',
        'kumpul_baik_selama_bulan',
        'jumlah_anak',
        'anak_1',
        'tanggal_lahir_anak_1',
        'anak_2',
        'tanggal_lahir_anak_2',
        'anak_3',
        'tanggal_lahir_anak_3',
        'anak_4',
        'tanggal_lahir_anak_4',
        'anak_5',
        'tanggal_lahir_anak_5',
        'anak_6',
        'tanggal_lahir_anak_6',
        'anak_7',
        'tanggal_lahir_anak_7',
        'anak_8',
        'tanggal_lahir_anak_8',
        'anak_9',
        'tanggal_lahir_anak_9',
        'anak_10',
        'tanggal_lahir_anak_10',
        'tanggal_perselisihan',
        'alasan_perselisihan',
        'detail_alasan',
        'upaya_merukunkan',
        'tanggal_perpisahan',
        'jenis_perpisahan',
        'siapa_meninggalkan',
        'alasan_meninggalkan',
    ];
}
