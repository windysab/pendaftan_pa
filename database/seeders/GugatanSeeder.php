<?php
// database/seeders/GugatanSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gugatan;

class GugatanSeeder extends Seeder
{
    public function run()
    {
        Gugatan::create([
            'penggugat_name' => 'John Doe',
            'penggugat_address' => '123 Main St',
            'tergugat_name' => 'Jane Doe',
            'tergugat_address' => '456 Elm St',
            'tanggal_pernikahan' => '2020-01-01',
            'desa_pernikahan' => 'Desa A',
            'kecamatan_pernikahan' => 'Kecamatan B',
            'kabupaten_pernikahan' => 'Kabupaten C',
            'tempat_tinggal' => 'rumah_sendiri',
            'tanggal_perselisihan' => '2021-01-01',
            'alasan_perselisihan' => 'minum_keras',
            'detail_alasan' => 'Detail alasan perselisihan',
            'upaya_merukunkan' => 'ada',
            'tanggal_perpisahan' => '2022-01-01',
            'jenis_perpisahan' => 'berpisah_tempat_tinggal',
            'siapa_meninggalkan_rumah' => 'penggugat',
            'desa' => 'Desa D',
            'alasan_meninggalkan_rumah' => 'Alasan meninggalkan rumah'
        ]);
    }
}
