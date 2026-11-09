<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'nama_pegawai'=>'required|string|max:255',
        ]);

        Pegawai::create($validated);

        return redirect()->route('index')->with('success', 'Data Pegawai Berhasil Ditambahkan.');
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
    public function edit(Pegawai $pegawai)
    {
        return view('edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validated = $request -> validate([
            'nama_pegawai'=>'required|string|max:255',
            'keterangan'=>'string|max:255',
        ]);

        $pegawai->update($validated);

        return redirect()->route('index')->with('success', 'Data Pegawai Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('index')->with('success', 'Data Pegawai Berhasil Dihapus.');
    }

    public function updateKehadiran(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'status_kehadiran' => 'required|in:Absen,Hadir,Pulang'
        ]);
        
        $status = $validated['status_kehadiran'];

        if ($status === 'Pulang' && !$pegawai->waktu_hadir) {
            abort(422, 'Belum absen masuk.');
        }

        $data = ['status_kehadiran' => $status];

        match ($status) {
            'Hadir' => $data['waktu_hadir'] = $pegawai->waktu_hadir ?? now(),
            'Pulang' => $data['waktu_pulang'] = now(),
            'Absen' => $data += ['waktu_hadir' => null, 'waktu_pulang' => null],
        };

        $pegawai->update($data);
        return response()->json($pegawai);
    }
}
