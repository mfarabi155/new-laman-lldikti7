@extends('admin.layouts.master')

@section('title', isset($pengumuman) ? 'Edit Pengumuman' : 'Tambah Pengumuman')

@section('content')
<div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-6 md:p-8">
    
    <div class="border-b border-slate-100 mb-6 pb-4">
        <h3 class="text-argon-blue font-bold text-lg">
            {{ isset($pengumuman) ? 'Edit Form Pengumuman' : 'Form Pengumuman' }}
        </h3>
    </div>

    <form action="{{ isset($pengumuman) ? url('pangkalan/pengumuman/'.$pengumuman->info_id) : url('pangkalan/pengumuman') }}" method="POST">
        @csrf
        @if(isset($pengumuman)) @method('PUT') @endif

        <div class="mb-6">
            <label class="block text-sm font-semibold mb-2">Tanggal Pengumuman *</label>
            <input type="date" name="info_tanggal" required
                value="{{ old('info_tanggal', $pengumuman->info_tanggal ?? date('Y-m-d')) }}"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-argon-blue">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold mb-2">Judul Pengumuman *</label>
            <input type="text" name="info_judul" required placeholder="Masukkan Judul Pengumuman"
                value="{{ old('info_judul', $pengumuman->info_judul ?? '') }}"
                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-argon-blue">
        </div>

        <div class="mb-8">
            <label class="block text-sm font-semibold mb-2">Isi Pengumuman *</label>
            <textarea name="info_isi" required rows="6"
                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-argon-blue">{{ old('info_isi', $pengumuman->info_isi ?? '') }}</textarea>
        </div>

        <div class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <label class="block text-sm font-semibold">Link Berkas</label>
                <button type="button" id="btn-add-row" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                    + Tambah Berkas
                </button>
            </div>
            
            <table class="w-full text-left border-collapse" id="table-berkas">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="py-3 px-4 text-sm font-semibold">Judul Link Berkas</th>
                        <th class="py-3 px-4 text-sm font-semibold">Link Berkas (URL)</th>
                        <th class="py-3 px-4 text-sm font-semibold w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody id="berkas-body">
                    
                    @if(isset($pengumuman) && $pengumuman->details->count() > 0)
                        @foreach($pengumuman->details as $detail)
                        <tr class="border-b border-slate-100">
                            <td class="p-2"><input type="text" name="judul_file[]" value="{{ $detail->info_judul_file }}" class="w-full p-2 border rounded"></td>
                            <td class="p-2"><input type="url" name="link_file[]" value="{{ $detail->info_file }}" class="w-full p-2 border rounded"></td>
                            <td class="p-2"><button type="button" class="btn-hapus bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button></td>
                        </tr>
                        @endforeach
                    @else
                        <tr class="border-b border-slate-100">
                            <td class="p-2"><input type="text" name="judul_file[]" placeholder="Judul dokumen..." class="w-full p-2 border rounded"></td>
                            <td class="p-2"><input type="url" name="link_file[]" placeholder="https://..." class="w-full p-2 border rounded"></td>
                            <td class="p-2"><button type="button" class="btn-hapus bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button></td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ url('pangkalan/pengumuman') }}" class="px-6 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300">Batal</a>
            <button type="submit" class="px-6 py-2 bg-argon-blue text-white font-bold rounded-lg hover:bg-blue-700">Simpan Pengumuman</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnAdd = document.getElementById('btn-add-row');
        const tbody = document.getElementById('berkas-body');

        // Fungsi Tambah Baris
        btnAdd.addEventListener('click', function() {
            const tr = document.createElement('tr');
            tr.className = 'border-b border-slate-100';
            tr.innerHTML = `
                <td class="p-2"><input type="text" name="judul_file[]" placeholder="Judul dokumen..." class="w-full p-2 border rounded"></td>
                <td class="p-2"><input type="url" name="link_file[]" placeholder="https://..." class="w-full p-2 border rounded"></td>
                <td class="p-2"><button type="button" class="btn-hapus bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button></td>
            `;
            tbody.appendChild(tr);
        });

        // Fungsi Hapus Baris (Event Delegation)
        tbody.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-hapus')) {
                // Pastikan minimal ada 1 baris tersisa
                if (tbody.children.length > 1) {
                    e.target.closest('tr').remove();
                } else {
                    alert('Minimal harus ada 1 baris input (boleh dibiarkan kosong).');
                }
            }
        });
    });
</script>
@endsection