<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Gugatan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GugatanControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test storing valid data.
     *
     * @return void
     */
    public function test_store_valid_data()
    {
        $data = [
            'nama_penggugat' => $this->faker->name,
            'binti_penggugat' => $this->faker->name,
            'umur_penggugat' => (string) $this->faker->numberBetween(20, 60),
            'agama_penggugat' => 'Islam',
            'pekerjaan_penggugat' => $this->faker->jobTitle,
            'pendidikan_penggugat' => 'S1',
            'alamat_penggugat' => $this->faker->address,
            'nama_tergugat' => $this->faker->name,
            'bin_tergugat' => $this->faker->name,
            'umur_tergugat' => (string) $this->faker->numberBetween(20, 60),
            'agama_tergugat' => 'Islam',
            'pekerjaan_tergugat' => $this->faker->jobTitle,
            'pendidikan_tergugat' => 'S1',
            'alamat_tergugat' => $this->faker->address,
            'hari_pernikahan' => 'Senin',
            'tanggal_pernikahan' => $this->faker->date,
            'desa_pernikahan' => $this->faker->city,
            'kecamatan_pernikahan' => $this->faker->city,
            'kabupaten_pernikahan' => $this->faker->city,
            'nomor_akta_nikah' => $this->faker->numerify('###/###/####'),
            'tanggal_akta_nikah' => $this->faker->date,
            'kecamatan_kua' => $this->faker->city,
            'kabupaten_kua' => $this->faker->city,
            'tempat_tinggal' => 'rumah_sendiri',
            'desa' => $this->faker->city,
            'kumpul_baik_selama_tahun' => (string) $this->faker->numberBetween(1, 10),
            'kumpul_baik_selama_bulan' => (string) $this->faker->numberBetween(1, 12),
            'jumlah_anak' => (string) $this->faker->numberBetween(0, 5),
            'tanggal_perselisihan' => $this->faker->date,
            'alasan_perselisihan' => 'minum_keras',
            'detail_alasan' => $this->faker->paragraph,
            'upaya_merukunkan' => 'ada',
            'tanggal_perpisahan' => $this->faker->date,
            'jenis_perpisahan' => 'Berpisah tempat tinggal',
            'siapa_meninggalkan' => 'Penggugat',
            'desa_meninggalkan' => $this->faker->city,
            'alasan_meninggalkan' => 'karena diusir oleh Penggugat',
        ];

        $response = $this->post(route('gugatan.store'), $data);

        $response->assertRedirect(route('gugatan.success'));
        $this->assertDatabaseHas('gugatans', $data);
    }

    /**
     * Test storing invalid data.
     *
     * @return void
     */
    public function test_store_invalid_data()
    {
        $data = [
            'nama_penggugat' => '',
            'binti_penggugat' => '',
            'umur_penggugat' => '',
            'agama_penggugat' => '',
            'pekerjaan_penggugat' => '',
            'pendidikan_penggugat' => '',
            'alamat_penggugat' => '',
            'nama_tergugat' => '',
            'bin_tergugat' => '',
            'umur_tergugat' => '',
            'agama_tergugat' => '',
            'pekerjaan_tergugat' => '',
            'pendidikan_tergugat' => '',
            'alamat_tergugat' => '',
            'hari_pernikahan' => '',
            'tanggal_pernikahan' => '',
            'desa_pernikahan' => '',
            'kecamatan_pernikahan' => '',
            'kabupaten_pernikahan' => '',
            'nomor_akta_nikah' => '',
            'tanggal_akta_nikah' => '',
            'kecamatan_kua' => '',
            'kabupaten_kua' => '',
            'tempat_tinggal' => '',
            'desa' => '',
            'kumpul_baik_selama_tahun' => '',
            'kumpul_baik_selama_bulan' => '',
            'jumlah_anak' => '',
            'tanggal_perselisihan' => '',
            'alasan_perselisihan' => '',
            'detail_alasan' => '',
            'upaya_merukunkan' => '',
            'tanggal_perpisahan' => '',
            'jenis_perpisahan' => '',
            'siapa_meninggalkan' => '',
            'desa_meninggalkan' => '',
            'alasan_meninggalkan' => '',
        ];

        $response = $this->post(route('gugatan.store'), $data);

        $response->assertSessionHasErrors([
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
            'kumpul_baik_selama_tahun',
            'kumpul_baik_selama_bulan',
            'jumlah_anak',
            'upaya_merukunkan',
            'jenis_perpisahan',
            'siapa_meninggalkan',
            'desa_meninggalkan',
        ]);
    }
}
