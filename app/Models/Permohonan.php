<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ayah',
        'umur_ayah',
        'pekerjaan_ayah',
        'pendidikan_ayah',
        'alamat_ayah',
        'nama_ibu',
        'umur_ibu',
        'pekerjaan_ibu',
        'pendidikan_ibu',
        'alamat_ibu',
        'nama_calon_suami',
        'tanggal_lahir_calon_suami',
        'pekerjaan_calon_suami',
        'pendidikan_calon_suami',
        'alamat_calon_suami',
        'nama_calon_isteri',
        'tanggal_lahir_calon_isteri',
        'pekerjaan_calon_isteri',
        'pendidikan_calon_isteri',
        'alamat_calon_isteri',
        'tempat_menikah',
        'no_surat_penolakan',
        'lama_hubungan',
        'penghasilan_suami',
        'nama_mertua_laki',
        'umur_mertua_laki',
        'pekerjaan_mertua_laki',
        'pendidikan_mertua_laki',
        'alamat_mertua_laki',
        'nama_mertua_perempuan',
        'umur_mertua_perempuan',
        'pekerjaan_mertua_perempuan',
        'pendidikan_mertua_perempuan',
        'alamat_mertua_perempuan',
    ];
}
