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



        // $tempat_tinggal = $request->input('tempat_tinggal');
        // $desa = $request->input('desa');

        // // Initialize all options with strikethrough
        // $options = [
        //     'rumah_sendiri' => new TextRun(),
        //     'rumah_orangtua_penggugat' => new TextRun(),
        //     'rumah_orangtua_tergugat' => new TextRun(),
        //     'rumah_kontrakan' => new TextRun(),
        //     'lainnya' => new TextRun(),
        // ];

        // $options['rumah_sendiri']->addText('Di rumah sendiri, di desa ' . $desa, ['strikethrough' => true]);
        // $options['rumah_orangtua_penggugat']->addText('Di rumah orangtua Penggugat, di desa ' . $desa, ['strikethrough' => true]);
        // $options['rumah_orangtua_tergugat']->addText('Di rumah orangtua Tergugat, di desa ' . $desa, ['strikethrough' => true]);
        // $options['rumah_kontrakan']->addText('Di rumah kontrakan / kos, di desa ' . $desa, ['strikethrough' => true]);
        // $options['lainnya']->addText('Lainnya, di desa ' . $desa, ['strikethrough' => true]);

        // // Hapus coretan dari opsi yang dipilih
        // if (isset($options[$tempat_tinggal])) {
        //     $options[$tempat_tinggal] = new TextRun();
        //     switch ($tempat_tinggal) {
        //         case 'rumah_sendiri':
        //             $options[$tempat_tinggal]->addText('Di rumah sendiri, di desa ' . $desa, ['strikethrough' => false]);
        //             break;
        //         case 'rumah_orangtua_penggugat':
        //             $options[$tempat_tinggal]->addText('Di rumah orangtua Penggugat, di desa ' . $desa, ['strikethrough' => false]);
        //             break;
        //         case 'rumah_orangtua_tergugat':
        //             $options[$tempat_tinggal]->addText('Di rumah orangtua Tergugat, di desa ' . $desa, ['strikethrough' => false]);
        //             break;
        //         case 'rumah_kontrakan':
        //             $options[$tempat_tinggal]->addText('Di rumah kontrakan / kos, di desa ' . $desa, ['strikethrough' => false]);
        //             break;
        //         case 'lainnya':
        //             $options[$tempat_tinggal]->addText('Lainnya, di desa ' . $desa, ['strikethrough' => false]);
        //             break;
        //     }
        // }

        // // Set nilai dalam template
        // $templateProcessor->setComplexValue('desa_a', $options['rumah_sendiri']);
        // $templateProcessor->setComplexValue('desa_b', $options['rumah_orangtua_penggugat']);
        // $templateProcessor->setComplexValue('desa_c', $options['rumah_orangtua_tergugat']);
        // $templateProcessor->setComplexValue('desa_d', $options['rumah_kontrakan']);
        // $templateProcessor->setComplexValue('desa_e', $options['lainnya']);




        // $tempat_tinggal = $request->input('tempat_tinggal');
        // $desa = $request->input('desa');

        // // Initialize all options with strikethrough
        // $options = [
        //     'rumah_sendiri' => new TextRun(),
        //     'rumah_orangtua_penggugat' => new TextRun(),
        //     'rumah_orangtua_tergugat' => new TextRun(),
        //     'rumah_kontrakan' => new TextRun(),
        //     'lainnya' => new TextRun(),
        // ];

        // $options['rumah_sendiri']->addText('Di rumah sendiri, di desa ' . $desa, ['strikethrough' => true]);
        // $options['rumah_orangtua_penggugat']->addText('Di rumah orangtua Penggugat, di desa ' . $desa, ['strikethrough' => true]);
        // $options['rumah_orangtua_tergugat']->addText('Di rumah orangtua Tergugat, di desa ' . $desa, ['strikethrough' => true]);
        // $options['rumah_kontrakan']->addText('Di rumah kontrakan / kos, di desa ' . $desa, ['strikethrough' => true]);
        // $options['lainnya']->addText('Lainnya, di desa ' . $desa, ['strikethrough' => true]);

        // // Hapus coretan dari opsi yang dipilih
        // if (isset($options[$tempat_tinggal])) {
        //     $options[$tempat_tinggal] = new TextRun();
        //     $options[$tempat_tinggal]->addText('Di ' . str_replace('_', ' ', $tempat_tinggal) . ', di desa ' . $desa, ['strikethrough' => false]);
        // }

        // // Set nilai dalam template
        // $templateProcessor->setComplexValue('desa_a', $options['rumah_sendiri']);
        // $templateProcessor->setComplexValue('desa_b', $options['rumah_orangtua_penggugat']);
        // $templateProcessor->setComplexValue('desa_c', $options['rumah_orangtua_tergugat']);
        // $templateProcessor->setComplexValue('desa_d', $options['rumah_kontrakan']);
        // $templateProcessor->setComplexValue('desa_e', $options['lainnya']);


    

        // Define the options with placeholders and default strike-through text
        $options = [
            'tempat_tinggal_a' => new TextRun(),
            'tempat_tinggal_b' => new TextRun(),
            'tempat_tinggal_c' => new TextRun(),
            'tempat_tinggal_d' => new TextRun()
        ];

        $options['tempat_tinggal_a']->addText('Di rumah sendiri, di desa ' . $gugatan->desa, ['strikethrough' => true]);
        $options['tempat_tinggal_b']->addText('Di rumah orangtua Penggugat, di desa ' . $gugatan->desa, ['strikethrough' => true]);
        $options['tempat_tinggal_c']->addText('Di rumah orangtua Tergugat, di desa ' . $gugatan->desa, ['strikethrough' => true]);
        $options['tempat_tinggal_d']->addText('Di rumah kontrakan / kos, di desa ' . $gugatan->desa, ['strikethrough' => true]);

        // Determine which option is selected based on your data
        switch ($gugatan->tempat_tinggal) {
            case 'rumah_sendiri':
                $options['tempat_tinggal_a'] = new TextRun();
                $options['tempat_tinggal_a']->addText('Di rumah sendiri, di desa ' . $gugatan->desa, ['strikethrough' => false]);
                break;
            case 'rumah_orangtua_penggugat':
                $options['tempat_tinggal_b'] = new TextRun();
                $options['tempat_tinggal_b']->addText('Di rumah orangtua Penggugat, di desa ' . $gugatan->desa, ['strikethrough' => false]);
                break;
            case 'rumah_orangtua_tergugat':
                $options['tempat_tinggal_c'] = new TextRun();
                $options['tempat_tinggal_c']->addText('Di rumah orangtua Tergugat, di desa ' . $gugatan->desa, ['strikethrough' => false]);
                break;
            case 'rumah_kontrakan':
                $options['tempat_tinggal_d'] = new TextRun();
                $options['tempat_tinggal_d']->addText('Di rumah kontrakan / kos, di desa ' . $gugatan->desa, ['strikethrough' => false]);
                break;
            default:
                // Handle the default case if needed
                break;
        }

        // Set the values in the template
        $templateProcessor->setComplexValue('tempat_tinggal_a', $options['tempat_tinggal_a']);
        $templateProcessor->setComplexValue('tempat_tinggal_b', $options['tempat_tinggal_b']);
        $templateProcessor->setComplexValue('tempat_tinggal_c', $options['tempat_tinggal_c']);
        $templateProcessor->setComplexValue('tempat_tinggal_d', $options['tempat_tinggal_d']);




        $templateProcessor->setValue('detail_lainnya', $gugatan->detail_lainnya);
        $templateProcessor->setValue('kumpul_baik_selama_tahun', $gugatan->kumpul_baik_selama_tahun);
        $templateProcessor->setValue('kumpul_baik_selama_bulan', $gugatan->kumpul_baik_selama_bulan);
        $templateProcessor->setValue('jumlah_anak', $gugatan->jumlah_anak);
        $templateProcessor->setValue('anak_1', $gugatan->anak_1);
        $templateProcessor->setValue('tanggal_lahir_anak_1', $gugatan->tanggal_lahir_anak_1);
        $templateProcessor->setValue('anak_2', $gugatan->anak_2);
        $templateProcessor->setValue('tanggal_lahir_anak_2', $gugatan->tanggal_lahir_anak_2);
        $templateProcessor->setValue('anak_3', $gugatan->anak_3);
        $templateProcessor->setValue('tanggal_lahir_anak_3', $gugatan->tanggal_lahir_anak_3);
        $templateProcessor->setValue('anak_4', $gugatan->anak_4);
        $templateProcessor->setValue('tanggal_lahir_anak_4', $gugatan->tanggal_lahir_anak_4);
        $templateProcessor->setValue('anak_5', $gugatan->anak_5);
        $templateProcessor->setValue('tanggal_lahir_anak_5', $gugatan->tanggal_lahir_anak_5);
        $templateProcessor->setValue('anak_6', $gugatan->anak_6);
        $templateProcessor->setValue('tanggal_lahir_anak_6', $gugatan->tanggal_lahir_anak_6);
        $templateProcessor->setValue('anak_7', $gugatan->anak_7);
        $templateProcessor->setValue('tanggal_lahir_anak_7', $gugatan->tanggal_lahir_anak_7);
        $templateProcessor->setValue('anak_8', $gugatan->anak_8);
        $templateProcessor->setValue('tanggal_lahir_anak_8', $gugatan->tanggal_lahir_anak_8);
        $templateProcessor->setValue('anak_9', $gugatan->anak_9);
        $templateProcessor->setValue('tanggal_lahir_anak_9', $gugatan->tanggal_lahir_anak_9);
        $templateProcessor->setValue('anak_10', $gugatan->anak_10);
        $templateProcessor->setValue('tanggal_lahir_anak_10', $gugatan->tanggal_lahir_anak_10);
        $templateProcessor->setValue('tanggal_perselisihan', $gugatan->tanggal_perselisihan);
        $templateProcessor->setValue('alasan_perselisihan', $gugatan->alasan_perselisihan);
        $templateProcessor->setValue('detail_alasan', $gugatan->detail_alasan);
        $templateProcessor->setValue('upaya_merukunkan', $gugatan->upaya_merukunkan);
        $templateProcessor->setValue('tanggal_perpisahan', $gugatan->tanggal_perpisahan);
        $templateProcessor->setValue('jenis_perpisahan', $gugatan->jenis_perpisahan);
        $templateProcessor->setValue('siapa_meninggalkan', $gugatan->siapa_meninggalkan);
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
