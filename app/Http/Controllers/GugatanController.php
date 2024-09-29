<?php

namespace App\Http\Controllers;

use App\Models\Gugatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

    public function generateWordDocument($id)
{
    $gugatan = Gugatan::findOrFail($id);

    // Path ke template Word
    $templatePath = resource_path('templates/Blanko Pendaftaran CG Bain (Simple).docx');

    if (!file_exists($templatePath)) {
        return redirect()->back()->withErrors(['msg' => 'Template file not found.']);
    }
    $templateProcessor = new TemplateProcessor($templatePath);

    // Mengisi template dengan data dari database
    $templateProcessor->setValue('nama_penggugat', $gugatan->nama_penggugat);
    $templateProcessor->setValue('binti_penggugat', $gugatan->binti_penggugat);
    $templateProcessor->setValue('umur_penggugat', $gugatan->umur_penggugat);
    $templateProcessor->setValue('agama_penggugat', $gugatan->agama_penggugat);
    $templateProcessor->setValue('pekerjaan_penggugat', $gugatan->pekerjaan_penggugat);
    $templateProcessor->setValue('pendidikan_penggugat', $gugatan->pendidikan_penggugat);
    $templateProcessor->setValue('alamat_penggugat', $gugatan->alamat_penggugat);
    $templateProcessor->setValue('nama_tergugat', $gugatan->nama_tergugat);
    $templateProcessor->setValue('bin_tergugat', $gugatan->bin_tergugat);
    $templateProcessor->setValue('umur_tergugat', $gugatan->umur_tergugat);
    $templateProcessor->setValue('agama_tergugat', $gugatan->agama_tergugat);
    $templateProcessor->setValue('pekerjaan_tergugat', $gugatan->pekerjaan_tergugat);
    $templateProcessor->setValue('pendidikan_tergugat', $gugatan->pendidikan_tergugat);
    $templateProcessor->setValue('alamat_tergugat', $gugatan->alamat_tergugat);
    $templateProcessor->setValue('hari_pernikahan', $gugatan->hari_pernikahan);
    $templateProcessor->setValue('tanggal_pernikahan', $gugatan->tanggal_pernikahan);
    $templateProcessor->setValue('desa_pernikahan', $gugatan->desa_pernikahan);
    $templateProcessor->setValue('kecamatan_pernikahan', $gugatan->kecamatan_pernikahan);
    $templateProcessor->setValue('kabupaten_pernikahan', $gugatan->kabupaten_pernikahan);
    $templateProcessor->setValue('nomor_akta_nikah', $gugatan->nomor_akta_nikah);
    $templateProcessor->setValue('tanggal_akta_nikah', $gugatan->tanggal_akta_nikah);
    $templateProcessor->setValue('kecamatan_kua', $gugatan->kecamatan_kua);
    $templateProcessor->setValue('kabupaten_kua', $gugatan->kabupaten_kua);
    $templateProcessor->setValue('tempat_tinggal', $gugatan->tempat_tinggal);
    $templateProcessor->setValue('desa', $gugatan->desa);
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

    // try {
    //     Storage::put($outputPath, $templateProcessor->save());
    //     return response()->download(storage_path('app/' . $outputPath))->deleteFileAfterSend(true);
    // } catch (\Exception $e) {
    //     Log::error('Error generating Word document:', ['error' => $e->getMessage()]);
    //     return redirect()->back()->withErrors(['msg' => 'Error generating Word document.']);
    // }

    try {
        $templateProcessor->saveAs(storage_path('app/' . $outputPath));
        return response()->download(storage_path('app/' . $outputPath))->deleteFileAfterSend(true);
    } catch (\Exception $e) {
        Log::error('Error generating Word document:', ['error' => $e->getMessage()]);
        return redirect()->back()->withErrors(['msg' => 'Error generating Word document.']);
    }
}
}
