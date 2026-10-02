<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $sekolah = Sekolah::latest()->paginate(10);
    return view('sekolah.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'nama_sekolah' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'jumlah_siswa' => 'required|integer|min:0',
    ]);

    Sekolah::create($validated);

    return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sekolah $sekolah)
    {
        return view('sekolah.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Sekolah $sekolah)
{
    $validated = $request->validate([
        'nama_sekolah' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'jumlah_siswa' => 'required|integer|min:0',
    ]);

    $sekolah->update($validated);

    return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sekolah $sekolah)
  {
    $sekolah->delete();
    return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil dihapus.');
   }
}
