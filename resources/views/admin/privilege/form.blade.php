@extends('admin.layouts.master')
@section('title', 'Atur Hak Akses')

@section('content')
<div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-6 md:p-8 max-w-4xl mx-auto">
    
    <div class="border-b border-slate-100 mb-6 pb-4 flex justify-between items-end">
        <div>
            <h3 class="text-argon-dark font-bold text-lg"><i class="fas fa-user-shield text-argon-blue mr-2"></i> Atur Hak Akses</h3>
            {{-- Sesuaikan $user->name dengan kolom Anda --}}
            <p class="text-sm text-slate-500 mt-1">Mengelola akses untuk pengguna: <span class="font-bold text-argon-dark">{{ $user->t_user_name ?? $user->t_user_username ?? 'User ID: '.$user->t_user_id }}</span></p>
        </div>
    </div>

    <form action="{{ route('admin.privilege.update', $user->t_user_id) }}" method="POST">
        @csrf @method('PUT')

        <div class="space-y-6">
            @foreach($menus as $parent)
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-5">
                
                {{-- Checkbox Parent --}}
                <label class="flex items-center gap-3 font-bold text-argon-dark text-base cursor-pointer mb-4 pb-3 border-b border-slate-200">
                    <input type="checkbox" name="menus[]" value="{{ $parent->menu_id }}" 
                        class="w-5 h-5 text-argon-blue rounded border-slate-300 focus:ring-argon-blue parent-checkbox"
                        {{ in_array($parent->menu_id, $userPrivileges) ? 'checked' : '' }}>
                    <i class="{{ $parent->menu_icon }} text-slate-400"></i>
                    {{ $parent->menu_nama }}
                </label>

                {{-- Checkbox Children --}}
                @if(count($parent->childMenus) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 pl-8">
                    @foreach($parent->childMenus as $child)
                    <label class="flex items-center gap-2 text-sm text-slate-600 cursor-pointer hover:text-argon-blue transition">
                        <input type="checkbox" name="menus[]" value="{{ $child->menu_id }}" 
                            class="w-4 h-4 text-argon-blue rounded border-slate-300 focus:ring-argon-blue child-checkbox"
                            {{ in_array($child->menu_id, $userPrivileges) ? 'checked' : '' }}>
                        {{ $child->menu_nama }}
                    </label>
                    @endforeach
                </div>
                @endif

            </div>
            @endforeach
        </div>

        <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-slate-100">
            <a href="{{ route('admin.privilege.index') }}" class="px-6 py-2 bg-slate-200 text-slate-700 font-bold rounded-lg hover:bg-slate-300 transition">Batal</a>
            <button type="submit" class="px-6 py-2 bg-argon-blue text-white font-bold rounded-lg hover:bg-argon-indigo transition shadow-md">Simpan Hak Akses</button>
        </div>
    </form>
</div>

{{-- Script JS agar jika Parent dicentang, Child otomatis dicentang (Opsional tapi UX-nya bagus) --}}
<script>
    document.querySelectorAll('.parent-checkbox').forEach(parent => {
        parent.addEventListener('change', function() {
            let container = this.closest('.bg-slate-50');
            let children = container.querySelectorAll('.child-checkbox');
            children.forEach(child => {
                child.checked = this.checked;
            });
        });
    });

    document.querySelectorAll('.child-checkbox').forEach(child => {
        child.addEventListener('change', function() {
            let container = this.closest('.bg-slate-50');
            let parent = container.querySelector('.parent-checkbox');
            let anyChecked = Array.from(container.querySelectorAll('.child-checkbox')).some(c => c.checked);
            
            // Jika ada minimal 1 anak dicentang, parent harus dicentang agar menu utamanya muncul
            if(anyChecked) {
                parent.checked = true;
            }
        });
    });
</script>
@endsection