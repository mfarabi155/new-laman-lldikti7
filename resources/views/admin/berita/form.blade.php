@extends('admin.layouts.master')

@section('title', isset($berita) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-6 md:p-8">
    
    <div class="border-b border-slate-100 mb-6 pb-4">
        <h3 class="text-argon-blue font-bold text-lg">
            {{ isset($berita) ? 'Edit Form Berita' : 'Form Berita Baru' }}
        </h3>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <i class="fas fa-exclamation-circle text-lg"></i>
                <p class="font-bold text-sm">Mohon periksa kembali inputan Anda:</p>
            </div>
            <ul class="list-disc list-inside text-sm ml-7">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($berita) ? route('admin.berita.update', $berita->info_id) : route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($berita)) @method('PUT') @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-semibold mb-2">Judul Berita *</label>
                    <input type="text" name="info_judul" required placeholder="Masukkan Judul Berita"
                        value="{{ old('info_judul', $berita->info_judul ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-argon-blue">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Isi Berita *</label>
                    <textarea name="info_isi" required rows="10" placeholder="Tuliskan isi berita di sini..."
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-argon-blue">{{ old('info_isi', $berita->info_isi ?? '') }}</textarea>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold mb-2">Tanggal Berita *</label>
                    <input type="date" name="info_tanggal" required
                        value="{{ old('info_tanggal', $berita->info_tanggal ?? date('Y-m-d')) }}"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-argon-blue">
                </div>

                <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                    <label class="block text-sm font-semibold mb-3">Gambar Berita (Bisa Lebih Dari 1)</label>
                    
                    {{-- Gambar yang sudah ada (Hanya muncul saat Edit) --}}
                    @if(isset($berita) && $berita->details->where('info_judul_file', 'Gambar Berita')->count() > 0)
                        <div class="mb-4">
                            <p class="text-xs text-slate-500 mb-2 italic">Gambar saat ini di database:</p>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach($berita->details->where('info_judul_file', 'Gambar Berita') as $img)
                                    @php
                                        // LOGIKA PENGECEKAN GAMBAR LAMA
                                        $imgSrc = null;
                                        if (!empty($img->info_file)) {
                                            $filename = basename($img->info_file);
                                            if (file_exists(public_path('storage/berita/' . $filename))) {
                                                $imgSrc = asset('storage/berita/' . $filename);
                                            } elseif (file_exists(public_path('storage/oldberita/' . $filename))) {
                                                $imgSrc = asset('storage/oldberita/' . $filename);
                                            } elseif (file_exists(public_path('storage/' . $img->info_file))) {
                                                $imgSrc = asset('storage/' . $img->info_file);
                                            } elseif (file_exists(public_path('gambar_berita/Berita/' . $filename))) {
                                                $imgSrc = asset('gambar_berita/Berita/' . $filename);
                                            }
                                        }
                                        
                                        // Fallback jika file fisik benar-benar hilang
                                        if(!$imgSrc) {
                                            $imgSrc = asset('laman/img/logo_lldikti.png');
                                        }
                                    @endphp

                                    <div class="relative bg-white rounded-lg border border-slate-200 flex items-center justify-center overflow-hidden">
                                        <img src="{{ $imgSrc }}" alt="Gambar" class="w-full h-24 object-cover shadow-sm">
                                    </div>
                                @endforeach
                            </div>
                            <p class="text-[10px] text-red-500 mt-2">* Memilih gambar baru di bawah akan MENGGANTI semua gambar di atas.</p>
                        </div>
                    @endif

                    {{-- Area Preview Gambar Baru --}}
                    <div id="image-preview-container" class="grid grid-cols-2 gap-2 mb-4 hidden">
                        </div>

                    <input type="file" name="gambar[]" id="image-input" multiple accept="image/jpeg,image/png,image/jpg,image/webp" 
                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-argon-blue/10 file:text-argon-blue hover:file:bg-argon-blue/20 transition-colors cursor-pointer">
                    
                    <p class="text-[11px] text-slate-400 mt-2">* Tahan tombol CTRL saat memilih untuk upload lebih dari 1 gambar. (Maks: 5MB per gambar)</p>
                </div>
            </div>

        </div>

        <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-slate-100">
            <a href="{{ route('admin.berita.index') }}" class="px-6 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300">Batal</a>
            <button type="submit" class="px-6 py-2 bg-argon-blue text-white font-bold rounded-lg hover:bg-blue-700">Simpan Berita</button>
        </div>
    </form>
</div>

{{-- SCRIPT UNTUK PREVIEW GAMBAR & HAPUS GAMBAR INDIVIDUAL --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image-input');
        const previewContainer = document.getElementById('image-preview-container');
        
        let dt = new DataTransfer(); 

        imageInput.addEventListener('change', function(event) {
            dt = new DataTransfer(); 
            
            for (let i = 0; i < event.target.files.length; i++) {
                dt.items.add(event.target.files[i]);
            }
            
            renderPreview();
        });

        function renderPreview() {
            previewContainer.innerHTML = ''; 

            if (dt.files.length > 0) {
                previewContainer.classList.remove('hidden');
                
                imageInput.files = dt.files;

                Array.from(dt.files).forEach((file, index) => {
                    if (!file.type.match('image.*')) return;

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imgWrapper = document.createElement('div');
                        imgWrapper.className = 'relative group rounded-lg overflow-hidden border border-slate-200 shadow-sm';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-24 object-cover transition-transform duration-300 group-hover:scale-110 group-hover:opacity-75';
                        
                        const badge = document.createElement('span');
                        badge.className = 'absolute top-1 left-1 bg-argon-blue text-white text-[9px] font-bold px-1.5 py-0.5 rounded shadow-sm opacity-90';
                        badge.innerText = 'Baru';

                        const deleteBtn = document.createElement('button');
                        deleteBtn.type = 'button';
                        deleteBtn.className = 'absolute top-1 right-1 bg-red-500 hover:bg-red-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs shadow-md opacity-0 group-hover:opacity-100 transition-opacity focus:outline-none';
                        deleteBtn.innerHTML = '<i class="fas fa-times"></i>';
                        deleteBtn.onclick = function() {
                            removeFile(index);
                        };

                        imgWrapper.appendChild(img);
                        imgWrapper.appendChild(badge);
                        imgWrapper.appendChild(deleteBtn);
                        previewContainer.appendChild(imgWrapper);
                    }

                    reader.readAsDataURL(file);
                });
            } else {
                previewContainer.classList.add('hidden');
                imageInput.value = ''; 
            }
        }

        function removeFile(indexToRemove) {
            const newDt = new DataTransfer();
            
            for (let i = 0; i < dt.files.length; i++) {
                if (i !== indexToRemove) {
                    newDt.items.add(dt.files[i]);
                }
            }
            
            dt = newDt; 
            renderPreview(); 
        }
    });
</script>
@endsection