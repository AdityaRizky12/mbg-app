@extends('layouts.app')

@section('title', 'Tambah Sekolah')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Breadcrumb -->
    <nav class="text-sm text-slate-500 mb-2">
        <a href="{{ route('sekolah.index') }}" class="hover:text-indigo-600">Data Sekolah</a>
        <span class="mx-1">/</span>
        <span class="text-slate-700">Tambah</span>
    </nav>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">Tambah Sekolah</h1>
        <p class="text-sm text-slate-500">Isi data sekolah penerima program MBG.</p>
    </div>

    <form action="{{ route('sekolah.store') }}" method="POST"
          class="bg-white rounded-xl shadow-sm border border-slate-200 p-8 space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah') }}"
                   placeholder="Contoh: SDN 01 Menteng"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
            @error('nama_sekolah')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat') }}"
                   placeholder="Contoh: Jl. Cikini Raya No. 5, Jakarta Pusat"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
            @error('alamat')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jumlah Siswa</label>
            <input type="number" name="jumlah_siswa" value="{{ old('jumlah_siswa', 0) }}"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
            @error('jumlah_siswa')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-3 border-t border-slate-100">
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow-sm transition-colors">
                Simpan Data
            </button>
            <a href="{{ route('sekolah.index') }}"
               class="text-slate-600 hover:text-slate-800 text-sm font-medium px-5 py-2.5 rounded-lg border border-slate-300 hover:bg-slate-50 transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection