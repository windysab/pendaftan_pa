<?php
// app/Models/Gugatan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gugatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'penggugat_name', 'penggugat_address', 'tergugat_name', 'tergugat_address',
        'tanggal_pernikahan', 'desa_pernikahan', 'kecamatan_pernikahan', 'kabupaten_pernikahan',
        'tempat_tinggal', 'tanggal_perselisihan', 'alasan_perselisihan', 'detail_alasan',
        'upaya_merukunkan', 'tanggal_perpisahan', 'jenis_perpisahan', 'siapa_meninggalkan_rumah',
        'desa', 'alasan_meninggalkan_rumah'
    ];
}
