<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Gugatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Element\TextRun;


class GugatanController extends Controller
{
    public function store(Request $request)
    {
        // Ambil data dari session
        $sessionData1 = $request->session()->get('gugatan_form', []);
        $sessionData2 = $request->session()->get('gugatan_page2', []);

        // Gabungkan data dari session dengan data dari request
        $data = array_merge(
            $sessionData1,
            $sessionData2,
            $request->all()
        );

        // Log data gabungan untuk debugging
        // Log::info('Data received for storing:', $data);

        // Validasi data
        $validatedData = $this->validateData($data);

        // Simpan data ke database
        try {
            $gugatan = Gugatan::create($validatedData);
            Log::info('Data stored successfully.');
            return redirect()->route('gugatan.success')->with('gugatan', $gugatan);
        } catch (\Exception $e) {
            Log::error('Error storing data:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['msg' => 'Error storing data.']);
        }
    }

    private function validateData(array $data)
    {
        return validator($data, [
            'nama_penggugat' => 'required|string|max:255',
            'binti_penggugat' => 'required|string|max:255',
            'umur_penggugat' => 'required|string|max:255',
            'agama_penggugat' => 'required|string|max:255',
            'pekerjaan_penggugat' => 'required|string|max:255',
            'pendidikan_penggugat' => 'required|string|max:255',
            'alamat_penggugat' => 'required|string|max:255',
            'nama_tergugat' => 'required|string|max:255',
            'bin_tergugat' => 'required|string|max:255',
            'umur_tergugat' => 'required|string|max:255',
            'agama_tergugat' => 'required|string|max:255',
            'pekerjaan_tergugat' => 'required|string|max:255',
            'pendidikan_tergugat' => 'required|string|max:255',
            'alamat_tergugat' => 'required|string|max:255',
            'hari_pernikahan' => 'required|string|max:255',
            'tanggal_pernikahan' => 'required|date',
            'desa_pernikahan' => 'required|string|max:255',
            'kecamatan_pernikahan' => 'required|string|max:255',
            'kabupaten_pernikahan' => 'required|string|max:255',
            'nomor_akta_nikah' => 'required|string|max:255',
            'tanggal_akta_nikah' => 'required|date',
            'kecamatan_kua' => 'required|string|max:255',
            'kabupaten_kua' => 'required|string|max:255',
            'tempat_tinggal' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'detail_lainnya' => 'nullable|string|max:255',
            'kumpul_baik_selama_tahun' => 'required|string|max:255',
            'kumpul_baik_selama_bulan' => 'required|string|max:255',
            'jumlah_anak' => 'required|string|max:255',
            'anak_1' => 'nullable|string|max:255',
            'tanggal_lahir_anak_1' => 'nullable|date',
            'anak_2' => 'nullable|string|max:255',
            'tanggal_lahir_anak_2' => 'nullable|date',
            'anak_3' => 'nullable|string|max:255',
            'tanggal_lahir_anak_3' => 'nullable|date',
            'anak_4' => 'nullable|string|max:255',
            'tanggal_lahir_anak_4' => 'nullable|date',
            'anak_5' => 'nullable|string|max:255',
            'tanggal_lahir_anak_5' => 'nullable|date',
            'anak_6' => 'nullable|string|max:255',
            'tanggal_lahir_anak_6' => 'nullable|date',
            'anak_7' => 'nullable|string|max:255',
            'tanggal_lahir_anak_7' => 'nullable|date',
            'anak_8' => 'nullable|string|max:255',
            'tanggal_lahir_anak_8' => 'nullable|date',
            'anak_9' => 'nullable|string|max:255',
            'tanggal_lahir_anak_9' => 'nullable|date',
            'anak_10' => 'nullable|string|max:255',
            'tanggal_lahir_anak_10' => 'nullable|date',
            'tanggal_perselisihan' => 'nullable|date',
            'alasan_perselisihan' => 'nullable|string|max:255',
            'detail_alasan' => 'nullable|string',
            'upaya_merukunkan' => 'required|string|max:255',
            'tanggal_perpisahan' => 'nullable|date',
            'jenis_perpisahan' => 'required|string|max:255',
            'siapa_meninggalkan' => 'required|string|max:255',
            'desa_meninggalkan' => 'required|string|max:255',
            'alasan_meninggalkan' => 'nullable|string|max:255',
        ])->validate();
    }

    public function generateWordDocument(Request $request, $id)
    {
        $gugatan = Gugatan::findOrFail($id);

        // Path ke template Word
        $templatePath = resource_path('templates/Blanko Pendaftaran CG Bain (Simple).docx');

        if (!file_exists($templatePath)) {
            return redirect()->back()->withErrors(['msg' => 'Template file not found.']);
        }
        $templateProcessor = new TemplateProcessor($templatePath);

        // Mengisi template dengan data dari database
        // Replace variabel di template word dengan data yang diinputkan
        $bulanIndonesia = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        $bulan = $bulanIndonesia[date('n') - 1]; // Mengambil nama bulan dari array berdasarkan bulan saat ini
        $templateProcessor->setValue('tanggal', date('d') . ' ' . $bulan . ' ' . date('Y'));
        $templateProcessor->setValue('nama_penggugat', $gugatan->nama_penggugat);
        $templateProcessor->setValue('binti_penggugat', $gugatan->binti_penggugat);
        $templateProcessor->setValue('umur_penggugat', $gugatan->umur_penggugat . ' tahun');
        $templateProcessor->setValue('agama_penggugat', $gugatan->agama_penggugat);
        $templateProcessor->setValue('pekerjaan_penggugat', $gugatan->pekerjaan_penggugat);
        // $templateProcessor->setValue('pendidikan_penggugat', $gugatan->pendidikan_penggugat);
        // Mapping of education levels to their corresponding numbers
        $educationMapping = [
            'Tidak Tamat SD' => '2',
            'SD' => '1',
            'SLTP' => '3',
            'SLTA' => '4',
            'DI' => '5',
            'DII' => '6',
            'DIII' => '7',
            'S1' => '8'
        ];

        // Get the numbered value for pendidikan_penggugat
        $numberedPendidikan = $educationMapping[$gugatan->pendidikan_penggugat] ?? $gugatan->pendidikan_penggugat;

        // // Debugging: Print the value to check
        // Log::info('Numbered Pendidikan: ' . $numberedPendidikan);

        // Set the value in the template
        $templateProcessor->setValue('pendidikan_penggugat', $numberedPendidikan);
        $templateProcessor->setValue('alamat_penggugat', $gugatan->alamat_penggugat);

        $templateProcessor->setValue('nama_tergugat', $gugatan->nama_tergugat);
        $templateProcessor->setValue('bin_tergugat', $gugatan->bin_tergugat);
        $templateProcessor->setValue('umur_tergugat', $gugatan->umur_tergugat . ' tahun');
        $templateProcessor->setValue('agama_tergugat', $gugatan->agama_tergugat);
        $templateProcessor->setValue('pekerjaan_tergugat', $gugatan->pekerjaan_tergugat);
        // Mapping of education levels to their corresponding numbers
        $educationMapping = [
            'Tidak Tamat SD' => '2',
            'SD' => '1',
            'SLTP' => '3',
            'SLTA' => '4',
            'DI' => '5',
            'DII' => '6',
            'DIII' => '7',
            'S1' => '8'
        ];

        // Get the numbered value for pendidikan_tergugat
        $numberedPendidikan = $educationMapping[$gugatan->pendidikan_tergugat] ?? $gugatan->pendidikan_tergugat;

        // // Debugging: Print the value to check
        // Log::info('Numbered Pendidikan: ' . $numberedPendidikan);

        // Set the value in the template
        $templateProcessor->setValue('pendidikan_tergugat', $numberedPendidikan);
        $templateProcessor->setValue('alamat_tergugat', $gugatan->alamat_tergugat);

        $templateProcessor->setValue('hari_pernikahan', $gugatan->hari_pernikahan);

        // Ambil tanggal dari objek $gugatan
        $tanggalPernikahan = $gugatan->tanggal_pernikahan;

        // Buat objek DateTime dari tanggal
        $date = new DateTime($tanggalPernikahan);

        // Array bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Format tanggal ke format Indonesia
        $tanggalFormatted = $date->format('j') . ' ' . $bulanIndonesia[(int)$date->format('n')] . ' ' . $date->format('Y');

        // Set nilai di template
        $templateProcessor->setValue('tanggal_pernikahan', $tanggalFormatted);
        $templateProcessor->setValue('desa_pernikahan', $gugatan->desa_pernikahan);
        $templateProcessor->setValue('kecamatan_pernikahan', $gugatan->kecamatan_pernikahan);
        $templateProcessor->setValue('kabupaten_pernikahan', $gugatan->kabupaten_pernikahan);

        $templateProcessor->setValue('nomor_akta_nikah', $gugatan->nomor_akta_nikah);
        // Ambil tanggal dari objek $gugatan
        $tanggalAktaNikah = $gugatan->tanggal_akta_nikah;

        // Buat objek DateTime dari tanggal
        $dateAktaNikah = new DateTime($tanggalAktaNikah);

        // Array bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Format tanggal ke format Indonesia
        $tanggalAktaNikahFormatted = $dateAktaNikah->format('j') . ' ' . $bulanIndonesia[(int)$dateAktaNikah->format('n')] . ' ' . $dateAktaNikah->format('Y');
        // Set nilai di template
        $templateProcessor->setValue('tanggal_akta_nikah', $tanggalAktaNikahFormatted);
        $templateProcessor->setValue('kecamatan_kua', $gugatan->kecamatan_kua);
        $templateProcessor->setValue('kabupaten_kua', $gugatan->kabupaten_kua);

        // $templateProcessor->setValue('tempat_tinggal', $gugatan->tempat_tinggal);
        // $templateProcessor->setValue('desa', $gugatan->desa);

        // Definisikan opsi dengan placeholder dan teks coret default
        $options = [
            'tempat_tinggal_a' => new TextRun(),
            'tempat_tinggal_b' => new TextRun(),
            'tempat_tinggal_c' => new TextRun(),
            'tempat_tinggal_d' => new TextRun()
        ];

        $options['tempat_tinggal_a']->addText('Di rumah sendiri, di desa', ['strikethrough' => true]);
        $options['tempat_tinggal_b']->addText('Di rumah orangtua Penggugat, di desa', ['strikethrough' => true]);
        $options['tempat_tinggal_c']->addText('Di rumah orangtua Tergugat, di desa', ['strikethrough' => true]);
        $options['tempat_tinggal_d']->addText('Di rumah kontrakan / kos, di desa', ['strikethrough' => true]);

        // Tentukan opsi mana yang dipilih berdasarkan data Anda
        switch ($gugatan->tempat_tinggal) {
            case 'rumah_sendiri':
                $options['tempat_tinggal_a'] = new TextRun();
                $options['tempat_tinggal_a']->addText('Di rumah sendiri', ['strikethrough' => false]);
                $options['tempat_tinggal_a']->addText(', di desa ' . $gugatan->desa);
                break;
            case 'rumah_orangtua_penggugat':
                $options['tempat_tinggal_b'] = new TextRun();
                $options['tempat_tinggal_b']->addText('Di rumah orangtua Penggugat', ['strikethrough' => false]);
                $options['tempat_tinggal_b']->addText(', di desa ' . $gugatan->desa);
                break;
            case 'rumah_orangtua_tergugat':
                $options['tempat_tinggal_c'] = new TextRun();
                $options['tempat_tinggal_c']->addText('Di rumah orangtua Tergugat', ['strikethrough' => false]);
                $options['tempat_tinggal_c']->addText(', di desa ' . $gugatan->desa);
                break;
            case 'rumah_kontrakan':
                $options['tempat_tinggal_d'] = new TextRun();
                $options['tempat_tinggal_d']->addText('Di rumah kontrakan / kos', ['strikethrough' => false]);
                $options['tempat_tinggal_d']->addText(', di desa ' . $gugatan->desa);
                break;
            default:
                // Tangani kasus default jika diperlukan
                break;
        }

        // Setel nilai dalam template
        $templateProcessor->setComplexValue('tempat_tinggal_a', $options['tempat_tinggal_a']);
        $templateProcessor->setComplexValue('tempat_tinggal_b', $options['tempat_tinggal_b']);
        $templateProcessor->setComplexValue('tempat_tinggal_c', $options['tempat_tinggal_c']);
        $templateProcessor->setComplexValue('tempat_tinggal_d', $options['tempat_tinggal_d']);

        $templateProcessor->setValue('detail_lainnya', $gugatan->detail_lainnya);
        $templateProcessor->setValue('kumpul_baik_selama_tahun', $gugatan->kumpul_baik_selama_tahun);
        $templateProcessor->setValue('kumpul_baik_selama_bulan', $gugatan->kumpul_baik_selama_bulan);
        $templateProcessor->setValue('jumlah_anak', $gugatan->jumlah_anak);
        // $templateProcessor->setValue('anak_1', $gugatan->anak_1);
        // $templateProcessor->setValue('tanggal_lahir_anak_1', $gugatan->tanggal_lahir_anak_1);
        // $templateProcessor->setValue('anak_2', $gugatan->anak_2);
        // $templateProcessor->setValue('tanggal_lahir_anak_2', $gugatan->tanggal_lahir_anak_2);
        // $templateProcessor->setValue('anak_3', $gugatan->anak_3);
        // $templateProcessor->setValue('tanggal_lahir_anak_3', $gugatan->tanggal_lahir_anak_3);
        // $templateProcessor->setValue('anak_4', $gugatan->anak_4);
        // $templateProcessor->setValue('tanggal_lahir_anak_4', $gugatan->tanggal_lahir_anak_4);
        // $templateProcessor->setValue('anak_5', $gugatan->anak_5);
        // $templateProcessor->setValue('tanggal_lahir_anak_5', $gugatan->tanggal_lahir_anak_5);
        // $templateProcessor->setValue('anak_6', $gugatan->anak_6);
        // $templateProcessor->setValue('tanggal_lahir_anak_6', $gugatan->tanggal_lahir_anak_6);
        // $templateProcessor->setValue('anak_7', $gugatan->anak_7);
        // $templateProcessor->setValue('tanggal_lahir_anak_7', $gugatan->tanggal_lahir_anak_7);
        // $templateProcessor->setValue('anak_8', $gugatan->anak_8);
        // $templateProcessor->setValue('tanggal_lahir_anak_8', $gugatan->tanggal_lahir_anak_8);
        // $templateProcessor->setValue('anak_9', $gugatan->anak_9);
        // $templateProcessor->setValue('tanggal_lahir_anak_9', $gugatan->tanggal_lahir_anak_9);
        // $templateProcessor->setValue('anak_10', $gugatan->anak_10);
        // $templateProcessor->setValue('tanggal_lahir_anak_10', $gugatan->tanggal_lahir_anak_10);

        for ($i = 1; $i <= 10; $i++) {
            $anakKey = 'anak_' . $i;
            $tanggalLahirKey = 'tanggal_lahir_anak_' . $i;

            $anakValue = isset($gugatan->$anakKey) ? $gugatan->$anakKey : '.........................';
            $tanggalLahirValue = isset($gugatan->$tanggalLahirKey) ? $gugatan->$tanggalLahirKey : '..................';

            $templateProcessor->setValue($anakKey, $anakValue);
            $templateProcessor->setValue($tanggalLahirKey, $tanggalLahirValue);
        }


        $tanggalperselisihan = $gugatan->tanggal_perselisihan;
        $dateperselisihan = new DateTime($tanggalperselisihan);

        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $hari = $dateperselisihan->format('j');
        $bulan = $bulanIndonesia[(int)$dateperselisihan->format('n')];
        $tahun = $dateperselisihan->format('Y');

        // Setel nilai dalam template
        $templateProcessor->setValue('tanggal_perselisihan_hari', $hari);
        $templateProcessor->setValue('tanggal_perselisihan_bulan', $bulan);
        $templateProcessor->setValue('tanggal_perselisihan_tahun', $tahun);
        // $templateProcessor->setValue('tanggal_perselisihan', $gugatan->tanggal_perselisihan);

        // $templateProcessor->setValue('alasan_perselisihan', $gugatan->alasan_perselisihan);


        // Definisikan opsi dengan placeholder dan teks coret default
        $options = [
            'alasan_a' => new TextRun(),
            'alasan_b' => new TextRun(),
            'alasan_c' => new TextRun(),
            'alasan_d' => new TextRun(),
            'alasan_e' => new TextRun(),
            'alasan_f' => new TextRun(),
            'alasan_g' => new TextRun(),
            'alasan_h' => new TextRun(),
            'alasan_i' => new TextRun()
        ];

        $options['alasan_a']->addText('Mengkonsumsi minum-minuman keras.', ['strikethrough' => true]);
        $options['alasan_b']->addText('Bermain judi.', ['strikethrough' => true]);
        $options['alasan_c']->addText('Memukul Penggugat.', ['strikethrough' => true]);
        $options['alasan_d']->addText('Telah menjalin hubungan asmara dengan perempuan lain.', ['strikethrough' => true]);
        $options['alasan_e']->addText('Sering keluar pada malam hari / pulang pada waktu dini hari / tidak pulang berhari – hari.', ['strikethrough' => true]);
        $options['alasan_f']->addText('Malas berkerja.', ['strikethrough' => true]);
        $options['alasan_g']->addText('Tidak memberi biaya untuk keperluan rumah tangga sehingga tidak mencukupi.', ['strikethrough' => true]);
        $options['alasan_h']->addText('Perkawinan Penggugat dan Tergugat dijodohkan oleh orang tua masing-masing.', ['strikethrough' => true]);
        $options['alasan_i']->addText('Alasan lainnya / Penjelasan kejadian', ['strikethrough' => true]);

        // Tentukan opsi mana yang dipilih berdasarkan data Anda
        switch ($gugatan->alasan_perselisihan) {
            case 'minum_keras':
                $options['alasan_a'] = new TextRun();
                $options['alasan_a']->addText('Mengkonsumsi minum-minuman keras.', ['strikethrough' => false]);
                break;
            case 'bermain_judi':
                $options['alasan_b'] = new TextRun();
                $options['alasan_b']->addText('Bermain judi.', ['strikethrough' => false]);
                break;
            case 'memukul_penggugat':
                $options['alasan_c'] = new TextRun();
                $options['alasan_c']->addText('Memukul Penggugat.', ['strikethrough' => false]);
                break;
            case 'hubungan_asmara':
                $options['alasan_d'] = new TextRun();
                $options['alasan_d']->addText('Telah menjalin hubungan asmara dengan perempuan lain.', ['strikethrough' => false]);
                break;
            case 'sering_keluar':
                $options['alasan_e'] = new TextRun();
                $options['alasan_e']->addText('Sering keluar pada malam hari / pulang pada waktu dini hari / tidak pulang berhari – hari.', ['strikethrough' => false]);
                break;
            case 'malas_bekerja':
                $options['alasan_f'] = new TextRun();
                $options['alasan_f']->addText('Malas berkerja.', ['strikethrough' => false]);
                break;
            case 'tidak_biaya':
                $options['alasan_g'] = new TextRun();
                $options['alasan_g']->addText('Tidak memberi biaya untuk keperluan rumah tangga sehingga tidak mencukupi.', ['strikethrough' => false]);
                break;
            case 'dijodohkan':
                $options['alasan_h'] = new TextRun();
                $options['alasan_h']->addText('Perkawinan Penggugat dan Tergugat dijodohkan oleh orang tua masing-masing.', ['strikethrough' => false]);
                break;
            case 'alasan_lainnya':
                $options['alasan_i'] = new TextRun();
                $options['alasan_i']->addText('Alasan lainnya / Penjelasan kejadian', ['strikethrough' => false]);
                break;
            default:
                // Tangani kasus default jika diperlukan
                break;
        }

        // Setel nilai dalam template
        $templateProcessor->setComplexValue('alasan_a', $options['alasan_a']);
        $templateProcessor->setComplexValue('alasan_b', $options['alasan_b']);
        $templateProcessor->setComplexValue('alasan_c', $options['alasan_c']);
        $templateProcessor->setComplexValue('alasan_d', $options['alasan_d']);
        $templateProcessor->setComplexValue('alasan_e', $options['alasan_e']);
        $templateProcessor->setComplexValue('alasan_f', $options['alasan_f']);
        $templateProcessor->setComplexValue('alasan_g', $options['alasan_g']);
        $templateProcessor->setComplexValue('alasan_h', $options['alasan_h']);
        $templateProcessor->setComplexValue('alasan_i', $options['alasan_i']);

        $templateProcessor->setValue('detail_alasan', $gugatan->detail_alasan);
        $templateProcessor->setValue('upaya_merukunkan', $gugatan->upaya_merukunkan);


        $tanggalperpisahan = $gugatan->tanggal_perpisahan;
        $dateperpisahan = new DateTime($tanggalperpisahan);

        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $hari = $dateperpisahan->format('j');
        $bulan = $bulanIndonesia[(int)$dateperpisahan->format('n')];
        $tahun = $dateperpisahan->format('Y');

        // Setel nilai dalam template
        $templateProcessor->setValue('tanggal_perpisahan_hari', $hari);
        $templateProcessor->setValue('tanggal_perpisahan_bulan', $bulan);
        $templateProcessor->setValue('tanggal_perpisahan_tahun', $tahun);
        // $templateProcessor->setValue('tanggal_perpisahan', $gugatan->tanggal_perpisahan);
        // $templateProcessor->setValue('jenis_perpisahan', $gugatan->jenis_perpisahan);


        // Definisikan opsi dengan placeholder dan teks coret default
        $options = [
            'jenis_perpisahan_tempat_tinggal' => new TextRun(),
            'jenis_perpisahan_tempat_tidur' => new TextRun()
        ];

        // Tambahkan teks coret ke opsi
        $options['jenis_perpisahan_tempat_tinggal']->addText('berpisah tempat tinggal', ['strikethrough' => true]);
        $options['jenis_perpisahan_tempat_tidur']->addText('berpisah tempat tidur', ['strikethrough' => true]);

        // Buat TextRun baru untuk opsi yang dipilih tanpa coretan
        $selectedOptionTempatTinggal = new TextRun();
        $selectedOptionTempatTidur = new TextRun();

        if ($gugatan->jenis_perpisahan == 'Berpisah tempat tinggal') {
            $selectedOptionTempatTinggal->addText('berpisah tempat tinggal', ['strikethrough' => false]);
            $templateProcessor->setComplexValue('jenis_perpisahan_tempat_tinggal', $selectedOptionTempatTinggal);
            $templateProcessor->setComplexValue('jenis_perpisahan_tempat_tidur', $options['jenis_perpisahan_tempat_tidur']);
        } elseif ($gugatan->jenis_perpisahan == 'Berpisah tempat tidur') {
            $selectedOptionTempatTidur->addText('berpisah tempat tidur', ['strikethrough' => false]);
            $templateProcessor->setComplexValue('jenis_perpisahan_tempat_tinggal', $options['jenis_perpisahan_tempat_tinggal']);
            $templateProcessor->setComplexValue('jenis_perpisahan_tempat_tidur', $selectedOptionTempatTidur);
        } else {
            // Jika tidak ada yang dipilih, tetap gunakan teks coret
            $templateProcessor->setComplexValue('jenis_perpisahan_tempat_tinggal', $options['jenis_perpisahan_tempat_tinggal']);
            $templateProcessor->setComplexValue('jenis_perpisahan_tempat_tidur', $options['jenis_perpisahan_tempat_tidur']);
        }


        // $templateProcessor->setValue('siapa_meninggalkan', $gugatan->siapa_meninggalkan);
        

        // Buat TextRun untuk pilihan yang terpilih
        $selectedTextRun = new TextRun();
        $selectedTextRun->addText($gugatan->siapa_meninggalkan);

        // Buat TextRun untuk pilihan yang tidak terpilih dan tambahkan coretan
        $unselectedTextRun = new TextRun();
        $unselectedText = $gugatan->siapa_meninggalkan == 'Tergugat' ? 'Penggugat' : 'Tergugat';
        $unselectedTextRun->addText($unselectedText, ['strikethrough' => true]);

        // Gabungkan kedua TextRun ke dalam satu placeholder
        $templateProcessor->setComplexValue('siapa_meninggalkan', $selectedTextRun);
        $templateProcessor->setComplexValue('siapa_meninggalkan_coret', $unselectedTextRun);

        $templateProcessor->setValue('desa_meninggalkan', $gugatan->desa_meninggalkan);
        $templateProcessor->setValue('alasan_meninggalkan', $gugatan->alasan_meninggalkan);

        $fileName = 'Gugatan_cerai_' . Str::slug($gugatan->nama_penggugat) . '.docx';

        // Path untuk menyimpan file Word yang dihasilkan
        $outputPath = 'public/Blanko_Pendaftaran_CG_' . $id . '.docx';



        try {
            $templateProcessor->saveAs(storage_path('app/' . $outputPath));
            return response()->download(storage_path('app/' . $outputPath))->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Error generating Word document:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['msg' => 'Error generating Word document.']);
        }
    }
}
