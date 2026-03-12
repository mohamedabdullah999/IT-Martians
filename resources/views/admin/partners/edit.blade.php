@extends('admin.layouts.app')

@section('header_title', 'تحديث بيانات الحليف (الشريك)')

@section('content')

    <div class="flex items-center justify-between mb-8 relative z-10">
        <div>
            <h3 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 drop-shadow-md">✏️ تحديث بيانات الشريك</h3>
            <p class="text-slate-400 text-sm mt-1">تحديث إحداثيات: <span class="text-white font-bold">{{ $partner->name }}</span></p>
        </div>
        <a href="{{ route('admin.partners.index') }}" class="bg-[#1e293b] border border-slate-700 hover:bg-slate-800 hover:border-slate-600 text-slate-300 px-5 py-2.5 rounded-xl font-bold transition-all flex items-center gap-2 shadow-sm hover:shadow-md">
            <span>&larr;</span>
            <span>العودة للتحالفات</span>
        </a>
    </div>

    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data" class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-[0_10px_30px_rgba(0,0,0,0.5)] border border-slate-700/50 p-6 md:p-8 space-y-6 relative overflow-hidden group">
        @csrf
        @method('PUT')

        <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-purple-600/10 rounded-full filter blur-[80px] pointer-events-none group-hover:bg-cyan-600/10 transition-colors duration-500"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">

            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">اسم الشريك / الشركة <span class="text-red-400">*</span></label>
                <input type="text" name="name" value="{{ old('name', $partner->name) }}" required
                       class="w-full px-4 py-3 rounded-xl border @error('name') border-red-500 bg-red-900/20 @else border-slate-600 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-500 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition">
                @error('name') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">لوجو الشريك (الرمز)</label>

                <input type="file" name="logo" accept="image/*"
                       class="w-full text-slate-400 font-medium text-sm bg-[#1e293b] file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-[#050B14] file:hover:bg-[#16123D] file:text-cyan-400 file:font-bold rounded-xl border @error('logo') border-red-500 @else border-slate-600 @enderror focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 transition-all">

                @error('logo') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                <p class="text-xs text-slate-500 mt-2 font-semibold">💡 اترك هذا الحقل فارغاً إذا كنت لا تود تغيير اللوجو الحالي.</p>

                @if($partner->logo)
                    <div class="mt-4 p-4 border border-slate-700/50 rounded-xl bg-[#050B14]/50 inline-block">
                        <p class="text-xs font-bold text-slate-400 mb-2">اللوجو الحالي:</p>
                        <div class="w-20 h-20 rounded-xl bg-white/90 border border-slate-600 flex items-center justify-center p-2 overflow-hidden shadow-inner">
                            <img src="{{ asset($partner->logo) }}" alt="Current Logo" class="max-w-full max-h-full object-contain">
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex justify-end pt-6 border-t border-slate-700/50 relative z-10">
            <button type="submit" class="bg-gradient-to-r from-cyan-600 to-purple-600 hover:from-cyan-500 hover:to-purple-500 text-white px-10 py-3 rounded-xl font-bold shadow-[0_4px_15px_rgba(34,211,238,0.3)] transition-all transform hover:-translate-y-1 border border-cyan-400/30">
                تحديث إحداثيات الشريك 💾
            </button>
        </div>
    </form>

@endsection
