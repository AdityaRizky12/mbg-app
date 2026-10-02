@extends('layouts.app')

@section('title', 'Daftar Distribusi')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Daftar Distribusi</h1>
            <p class="text-sm text-slate-500">Kelola dan pantau pengiriman makanan ke sekolah-sekolah.</p>
        </div>
        <a href="{{ route('distribusi.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors">
            + Tambah Distribusi
        </a>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-slate-700 font-semibold border-b border-slate-200 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Sekolah</th>
                    <th class="px-6 py-4">Menu</th>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Porsi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse ($distribusi as $item)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-medium text-slate-900">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-semibold text-slate-800">{{ $item->sekolah->nama_sekolah ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $item->menu->nama_menu ?? '-' }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->tanggal_distribusi)->format('d M Y') }}</td>
                        <td class="px-6 py-4 font-medium">{{ number_format($item->jumlah_porsi) }}</td>
                        <td class="px-6 py-4">
                          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                         {{ match($item->status) {
                          'diterima' => 'bg-emerald-100 text-emerald-800',
                          'dikirim' => 'bg-blue-100 text-blue-800',
                          'gagal' => 'bg-red-100 text-red-800',
                           default => 'bg-amber-100 text-amber-800',
                        } }}">
                        {{ ucfirst($item->status) }}
                        </span>
                        </td>
                       <td class="px-6 py-4 text-center space-x-2">
            <a href="{{ route('distribusi.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
            <form action="{{ route('distribusi.destroy', $item->id) }}" method="POST" class="inline"
          onsubmit="return confirm('Yakin hapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
            </form>
                </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                            Belum ada data distribusi yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pt-2">
        {{ $distribusi->links() }}
    </div>

</div>
@endsection