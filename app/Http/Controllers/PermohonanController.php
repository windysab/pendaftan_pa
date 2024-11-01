<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class PermohonanController extends Controller
{
    public function index()
    {
        $permohonans = Permohonan::all();
        return view('pages.permohonan-index', compact('permohonans'))->with('type_menu', 'permohonan');
    }

    public function create()
    {
        return view('pages.permohonan-form')->with('type_menu', 'permohonan');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'umur_ayah' => 'required|integer',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',
            'nama_ibu' => 'required|string|max:255',
            'umur_ibu' => 'required|integer',
            'pekerjaan_ibu' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',
            'nama_calon_suami' => 'required|string|max:255',
            'tanggal_lahir_calon_suami' => 'required|date',
            'pekerjaan_calon_suami' => 'required|string|max:255',
            'pendidikan_calon_suami' => 'required|string|max:255',
            'alamat_calon_suami' => 'required|string',
            'nama_calon_isteri' => 'required|string|max:255',
            'tanggal_lahir_calon_isteri' => 'required|date',
            'pekerjaan_calon_isteri' => 'required|string|max:255',
            'pendidikan_calon_isteri' => 'required|string|max:255',
            'alamat_calon_isteri' => 'required|string',
            'tempat_menikah' => 'required|string|max:255',
            'no_surat_penolakan' => 'required|string|max:255',
            'lama_hubungan' => 'required|string|max:255',
            'penghasilan_suami' => 'required|integer',
            'nama_mertua_laki' => 'required|string|max:255',
            'umur_mertua_laki' => 'required|integer',
            'pekerjaan_mertua_laki' => 'required|string|max:255',
            'pendidikan_mertua_laki' => 'required|string|max:255',
            'alamat_mertua_laki' => 'required|string',
            'nama_mertua_perempuan' => 'required|string|max:255',
            'umur_mertua_perempuan' => 'required|integer',
            'pekerjaan_mertua_perempuan' => 'required|string|max:255',
            'pendidikan_mertua_perempuan' => 'required|string|max:255',
            'alamat_mertua_perempuan' => 'required|string',
        ]);

        Permohonan::create($validatedData);

        return redirect()->route('permohonan.index')->with('success', 'Permohonan berhasil disimpan.');
    }

    public function edit($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('pages.permohonan-form', compact('permohonan'))->with('type_menu', 'permohonan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'umur_ayah' => 'required|integer',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',
            'nama_ibu' => 'required|string|max:255',
            'umur_ibu' => 'required|integer',
            'pekerjaan_ibu' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',
            'nama_calon_suami' => 'required|string|max:255',
            'tanggal_lahir_calon_suami' => 'required|date',
            'pekerjaan_calon_suami' => 'required|string|max:255',
            'pendidikan_calon_suami' => 'required|string|max:255',
            'alamat_calon_suami' => 'required|string',
            'nama_calon_isteri' => 'required|string|max:255',
            'tanggal_lahir_calon_isteri' => 'required|date',
            'pekerjaan_calon_isteri' => 'required|string|max:255',
            'pendidikan_calon_isteri' => 'required|string|max:255',
            'alamat_calon_isteri' => 'required|string',
            'tempat_menikah' => 'required|string|max:255',
            'no_surat_penolakan' => 'required|string|max:255',
            'lama_hubungan' => 'required|string|max:255',
            'penghasilan_suami' => 'required|integer',
            'nama_mertua_laki' => 'required|string|max:255',
            'umur_mertua_laki' => 'required|integer',
            'pekerjaan_mertua_laki' => 'required|string|max:255',
            'pendidikan_mertua_laki' => 'required|string|max:255',
            'alamat_mertua_laki' => 'required|string',
            'nama_mertua_perempuan' => 'required|string|max:255',
            'umur_mertua_perempuan' => 'required|integer',
            'pekerjaan_mertua_perempuan' => 'required|string|max:255',
            'pendidikan_mertua_perempuan' => 'required|string|max:255',
            'alamat_mertua_perempuan' => 'required|string',
        ]);

        $permohonan = Permohonan::findOrFail($id);
        $permohonan->update($validatedData);

        return redirect()->route('permohonan.index')->with('success', 'Permohonan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->delete();

        return redirect()->route('permohonan.index')->with('success', 'Permohonan berhasil dihapus.');
    }

    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('pages.permohonan-detail', compact('permohonan'))->with('type_menu', 'permohonan');
    }
}
