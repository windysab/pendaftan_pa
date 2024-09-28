<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gugatan;

class GugatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'nama_penggugat' => 'John Doe',
            'binti_penggugat' => 'Jane Doe',
            'umur_penggugat' => '30',
            'agama_penggugat' => 'Islam',
            'pekerjaan_penggugat' => 'Engineer',
            'pendidikan_penggugat' => 'S1',
            'alamat_penggugat' => 'Jl. Merdeka No. 1',
            'nama_tergugat' => 'Jane Smith',
            'bin_tergugat' => 'John Smith',
            'umur_tergugat' => '28',
            'agama_tergugat' => 'Islam',
            'pekerjaan_tergugat' => 'Doctor',
            'pendidikan_tergugat' => 'S2',
            'alamat_tergugat' => 'Jl. Sudirman No. 2',
            'hari_pernikahan' => 'Monday',
            'tanggal_pernikahan' => '2020-01-01',
            'desa_pernikahan' => 'Desa A',
            'kecamatan_pernikahan' => 'Kecamatan B',
            'kabupaten_pernikahan' => 'Kabupaten C',
            'nomor_akta_nikah' => '123456',
            'tanggal_akta_nikah' => '2020-01-02',
            'kecamatan_kua' => 'Kecamatan D',
            'kabupaten_kua' => 'Kabupaten E',
            'tempat_tinggal' => 'Jl. Merdeka No. 1',
            'desa' => 'Desa A',
            'detail_lainnya' => 'Detail lainnya',
            'kumpul_baik_selama_tahun' => '2',
            'kumpul_baik_selama_bulan' => '6',
            'jumlah_anak' => '2',
            'anak_1' => 'Anak 1',
            'tanggal_lahir_anak_1' => '2021-01-01',
            'anak_2' => 'Anak 2',
            'tanggal_lahir_anak_2' => '2022-01-01',
            'tanggal_perselisihan' => '2023-01-01',
            'alasan_perselisihan' => 'Alasan perselisihan',
            'detail_alasan' => 'Detail alasan',
            'upaya_merukunkan' => 'Upaya merukunkan',
            'tanggal_perpisahan' => '2023-06-01',
            'jenis_perpisahan' => 'Jenis perpisahan',
            'siapa_meninggalkan' => 'Siapa meninggalkan',
            'alasan_meninggalkan' => 'Alasan meninggalkan',
        ];

        Gugatan::create($data);
    }
}
