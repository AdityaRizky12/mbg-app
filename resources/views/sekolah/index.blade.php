@extends('layouts.app')

@section('title', 'Data Sekolah')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Data Sekolah</h1>
            <p class="text-sm text-slate-500">Daftar sekolah penerima program MBG.</p>
        </div>
        <a href="{{ route('sekolah.create') }}"
           class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors">
            + Tambah Sekolah
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-slate-700 font-semibold border-b border-slate-200 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Nama Sekolah</th>
                    <th class="px-6 py-4">Alamat</th>
                    <th class="px-6 py-4">Jumlah Siswa</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse ($sekolah as $item)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-medium text-slate-900">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-semibold text-slate-800">{{ $item->nama_sekolah }}</td>
                        <td class="px-6 py-4">{{ $item->alamat }}</td>
                        <td class="px-6 py-4">{{ number_format($item->jumlah_siswa) }}</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('sekolah.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                            <form action="{{ route('sekolah.destroy', $item->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                            Belum ada data sekolah yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pt-2">
        {{ $sekolah->links() }}
    </div>

</div>
@endsection