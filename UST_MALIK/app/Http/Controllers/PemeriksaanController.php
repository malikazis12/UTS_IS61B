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
        $pem = Pemeriksaan::all();
        return view('pemeriksaan.index',compact('nomor','pem'));
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
            'foto' => 'required',
        ]);

        $pem = new Pemeriksaan;
        $pem->diagnosa = $request->diagnosa;
        $pem->rekam_medis = $request->rekam_medis;
        $pem->foto = $request->foto;
        $pem->save();

        return redirect('/pemeriksaan/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'foto' => 'required',
        ]);

        $pem = Pemeriksaan::find($id);
        if ($pem) {
            $pem->diagnosa = $request->diagnosa;
            $pem->rekam_medis = $request->rekam_medis;
            $pem->foto = $request->foto;
            $pem->save();
        } else {
            return redirect('/pemeriksaan/')->withErrors('Data tidak ditemukan');
        }

        return redirect('/pemeriksaan/');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pem = Pemeriksaan::find($id);
        $pem->delete();

        return redirect('/pemeriksaan/');
    }
}
