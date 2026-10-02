<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Sekolah;
use App\Models\Menu;
use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
    $distribusi = Distribusi::with(['sekolah', 'menu'])->latest('tanggal_distribusi')->paginate(10);
    return view('distribusi.index', compact('distribusi'));
    }
    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
    $sekolah = Sekolah::orderBy('nama_sekolah')->get();
    $menu = Menu::orderBy('nama_menu')->get();
    return view('distribusi.create', compact('sekolah', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
    {
    $validated = $request->validate([
        'sekolah_id' => 'required|exists:sekolah,id',
        'menu_id' => 'required|exists:menu,id',
        'tanggal_distribusi' => 'required|date',
        'jumlah_porsi' => 'required|integer|min:1',
        'status' => 'required|in:pending,dikirim,diterima,gagal',
    ]);

    Distribusi::create($validated);
    return redirect()->route('distribusi.index')->with('success', 'Distribusi berhasil dicatat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Distribusi $distribusi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distribusi $distribusi)
    {
    $sekolah = Sekolah::orderBy('nama_sekolah')->get();
    $menu = Menu::orderBy('nama_menu')->get();
    return view('distribusi.edit', compact('distribusi', 'sekolah', 'menu'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distribusi $distribusi)
    {
    $validated = $request->validate([
        'sekolah_id' => 'required|exists:sekolah,id',
        'menu_id' => 'required|exists:menu,id',
        'tanggal_distribusi' => 'required|date',
        'jumlah_porsi' => 'required|integer|min:1',
        'status' => 'required|in:pending,dikirim,diterima,gagal',
    ]);

    $distribusi->update($validated);

    return redirect()->route('distribusi.index')->with('success', 'Distribusi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distribusi $distribusi)
    {
    $distribusi->delete();
    return redirect()->route('distribusi.index')->with('success', 'Distribusi berhasil dihapus.');
    }
}
