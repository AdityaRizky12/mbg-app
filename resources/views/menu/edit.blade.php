@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="max-w-2xl mx-auto">

    <nav class="text-sm text-slate-500 mb-2">
        <a href="{{ route('menu.index') }}" class="hover:text-indigo-600">Data Menu</a>
        <span class="mx-1">/</span>
        <span class="text-slate-700">Edit</span>
    </nav>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">Edit Menu</h1>
        <p class="text-sm text-slate-500">Perbarui data {{ $menu->nama_menu }}.</p>
    </div>

    <form action="{{ route('menu.update', $menu->id) }}" method="POST"
          class="bg-white rounded-xl shadow-sm border border-slate-200 p-8 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Menu</label>
            <input type="text" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
            @error('nama_menu')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi</label>
            <textarea name="deskripsi" rows="3"
                      class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-3 border-t border-slate-100">
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow-sm transition-colors">
                Update Data
            </button>
            <a href="{{ route('menu.index') }}"
               class="text-slate-600 hover:text-slate-800 text-sm font-medium px-5 py-2.5 rounded-lg border border-slate-300 hover:bg-slate-50 transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection