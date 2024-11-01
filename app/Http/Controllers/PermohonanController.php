<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PermohonanController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $this->validateData($request->all());

        try {
            $permohonan = Permohonan::create($validatedData);
            Log::info('Permohonan stored successfully.');
            return redirect()->route('permohonan.form')->with('success', 'Permohonan stored successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing permohonan:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['msg' => 'Error storing permohonan.']);
        }
    }

    public function edit($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $type_menu = 'permohonan';
        return view('pages.permohonan-form', compact('permohonan', 'type_menu'));
    }

    public function update(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $validatedData = $this->validateData($request->all());

        try {
            $permohonan->update($validatedData);
            return redirect()->route('permohonan.form')->with('success', 'Permohonan updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating permohonan:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['msg' => 'Error updating permohonan.']);
        }
    }

    public function destroy($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->delete();

        return redirect()->route('permohonan.form')->with('success', 'Permohonan deleted successfully.');
    }

    private function validateData(array $data)
    {
        return validator($data, [
            'nama_ayah' => 'required|string|max:255',
            'umur_ayah' => 'required|integer',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'umur_ibu' => 'required|integer',
            'pekerjaan_ibu' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string|max:255',
            'nama_calon_suami' => 'required|string|max:255',
            'tanggal_lahir_calon_suami' => 'required|date',
            'pekerjaan_calon_suami' => 'required|string|max:255',
            'pendidikan_calon_suami' => 'required|string|max:255',
            'alamat_calon_suami' => 'required|string|max:255',
            'nama_calon_isteri' => 'required|string|max:255',
            'tanggal_lahir_calon_isteri' => 'required|date',
            'pekerjaan_calon_isteri' => 'required|string|max:255',
            'pendidikan_calon_isteri' => 'required|string|max:255',
            'alamat_calon_isteri' => 'required|string|max:255',
            'tempat_menikah' => 'required|string|max:255',
            'no_surat_penolakan' => 'required|string|max:255',
            'lama_hubungan' => 'required|string|max:255',
            'penghasilan_suami' => 'required|integer',
            'nama_mertua_laki' => 'required|string|max:255',
            'umur_mertua_laki' => 'required|integer',
            'pekerjaan_mertua_laki' => 'required|string|max:255',
            'pendidikan_mertua_laki' => 'required|string|max:255',
            'alamat_mertua_laki' => 'required|string|max:255',
            'nama_mertua_perempuan' => 'required|string|max:255',
            'umur_mertua_perempuan' => 'required|integer',
            'pekerjaan_mertua_perempuan' => 'required|string|max:255',
            'pendidikan_mertua_perempuan' => 'required|string|max:255',
            'alamat_mertua_perempuan' => 'required|string|max:255',
        ])->validate();
    }
}
