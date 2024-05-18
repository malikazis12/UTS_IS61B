<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $sis = Pemeriksaan::all();
        return view('pemeriksaan.index',compact('nomor','sis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemeriksaan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'diagnosa' => 'required',
            'rekam_medis' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');

            $pem = new Pemeriksaan;
            $pem->diagnosa = $request->diagnosa;
            $pem->rekam_medis = $request->rekam_medis;
            $pem->foto = '/storage/' . $filePath;
            $pem->save();

            return redirect('/pemeriksaan/')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('/pemeriksaan/create')->withErrors('Foto wajib diunggah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fungsi untuk menampilkan detail data (belum diimplementasikan)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pem = Pemeriksaan::find($id);
        if ($pem) {
            return view('pemeriksaan.edit', compact('pem'));
        } else {
            return redirect('/pemeriksaan/')->withErrors('Data tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'diagnosa' => 'required',
            'rekam_medis' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pem = Pemeriksaan::find($id);
        if ($pem) {
            $pem->diagnosa = $request->diagnosa;
            $pem->rekam_medis = $request->rekam_medis;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $filename, 'public');
                $pem->foto = '/storage/' . $filePath;
            }
            $pem->save();
            return redirect('/pemeriksaan/')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect('/pemeriksaan/')->withErrors('Data tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pem = Pemeriksaan::find($id);
        if ($pem) {
            $pem->delete();
            return redirect('/pemeriksaan/')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/pemeriksaan/')->withErrors('Data tidak ditemukan');
        }
    }
}
