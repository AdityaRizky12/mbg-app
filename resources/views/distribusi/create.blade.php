@extends('layouts.app')

@section('title', 'Catat Distribusi')

@section('content')
<div class="max-w-2xl mx-auto">

    <nav class="text-sm text-slate-500 mb-2">
        <a href="{{ route('distribusi.index') }}" class="hover:text-indigo-600">Data Distribusi</a>
        <span class="mx-1">/</span>
        <span class="text-slate-700">Tambah</span>
    </nav>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">Catat Distribusi Baru</h1>
        <p class="text-sm text-slate-500">Isi data pengiriman MBG ke sekolah.</p>
    </div>

    <form action="{{ route('distribusi.store') }}" method="POST"
          class="bg-white rounded-xl shadow-sm border border-slate-200 p-8 space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Sekolah</label>
            <select name="sekolah_id"
                    class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                <option value="">-- Pilih Sekolah --</option>
                @foreach ($sekolah as $item)
                    <option value="{{ $item->id }}" @selected(old('sekolah_id') == $item->id)>
                        {{ $item->nama_sekolah }}
                    </option>
                @endforeach
            </select>
            @error('sekolah_id')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Menu</label>
            <select name="menu_id"
                    class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                <option value="">-- Pilih Menu --</option>
                @foreach ($menu as $item)
                    <option value="{{ $item->id }}" @selected(old('menu_id') == $item->id)>
                        {{ $item->nama_menu }}
                    </option>
                @endforeach
            </select>
            @error('menu_id')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Distribusi</label>
            <input type="date" name="tanggal_distribusi" value="{{ old('tanggal_distribusi') }}"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
            @error('tanggal_distribusi')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jumlah Porsi</label>
            <input type="number" name="jumlah_porsi" value="{{ old('jumlah_porsi') }}"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
            @error('jumlah_porsi')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status</label>
            <select name="status"
                    class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                @foreach (['pending', 'dikirim', 'diterima', 'gagal'] as $status)
                    <option value="{{ $status }}" @selected(old('status') == $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-3 border-t border-slate-100">
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow-sm transition-colors">
                Simpan Data
            </button>
            <a href="{{ route('distribusi.index') }}"
               class="text-slate-600 hover:text-slate-800 text-sm font-medium px-5 py-2.5 rounded-lg border border-slate-300 hover:bg-slate-50 transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection