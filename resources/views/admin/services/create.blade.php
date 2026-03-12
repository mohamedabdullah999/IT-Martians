@extends('admin.layouts.app')

@section('header_title', 'إضافة خدمة للمجرة')

@section('content')

    <div class="flex items-center justify-between mb-8 relative z-10">
        <div>
            <h3 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 drop-shadow-md">✨ إضافة خدمة جديدة</h3>
            <p class="text-slate-400 text-sm mt-1">أدخل إحداثيات الخدمة وارفع الرمز لتظهر مباشرة في الموقع.</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="bg-[#1e293b] border border-slate-700 hover:bg-slate-800 hover:border-slate-600 text-slate-300 px-5 py-2.5 rounded-xl font-bold transition-all flex items-center gap-2 shadow-sm hover:shadow-md">
            <span>&larr;</span>
            <span>العودة للأسطول</span>
        </a>
    </div>

    <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-[0_10px_30px_rgba(0,0,0,0.5)] border border-slate-700/50 p-6 md:p-8 max-w-4xl mx-auto relative overflow-hidden group">

        <div class="absolute -right-20 -top-20 w-64 h-64 bg-purple-600/10 rounded-full filter blur-[80px] pointer-events-none group-hover:bg-cyan-600/10 transition-colors duration-500"></div>

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="relative z-10">
            @csrf

            <div class="space-y-6">

                <div>
                    <label for="title" class="block text-sm font-bold text-slate-300 mb-2">عنوان الخدمة <span class="text-red-400">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           class="w-full px-4 py-3 rounded-xl border @error('title') border-red-500 bg-red-900/20 @else border-slate-600 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-500 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition"
                           placeholder="مثال: تطوير أنظمة الذكاء الاصطناعي" required>
                    @error('title') <p class="text-red-400 text-sm mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">أيقونة الخدمة (الرمز) <span class="text-red-400">*</span></label>
                    <input type="file" name="icon" accept="image/*" required
                           class="w-full text-slate-400 font-medium text-sm bg-[#1e293b] file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-[#050B14] file:hover:bg-[#16123D] file:text-cyan-400 file:font-bold rounded-xl border @error('icon') border-red-500 @else border-slate-600 @enderror focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 transition-all">
                    @error('icon') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                    <p class="text-xs text-slate-500 mt-2 font-semibold">💡 يفضل رفع أيقونة أو صورة بخلفية شفافة (PNG, SVG).</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">رابط "استكشف المزيد" (اختياري)</label>
                    <input type="url" name="link" value="{{ old('link') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('link') border-red-500 bg-red-900/20 @else border-slate-600 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-500 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition text-left"
                           placeholder="https://example.com/details">
                    @error('link') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-slate-300 mb-2">وصف الخدمة <span class="text-red-400">*</span></label>
                    <textarea name="description" id="description" rows="5"
                              class="w-full px-4 py-3 rounded-xl border @error('description') border-red-500 bg-red-900/20 @else border-slate-600 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-500 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition resize-y"
                              placeholder="اكتب وصفاً جذاباً للخدمة يظهر للعملاء..." required>{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-400 text-sm mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

            </div>

            <div class="mt-8 pt-6 border-t border-slate-700/50 flex items-center justify-end gap-4">
                <a href="{{ route('admin.services.index') }}" class="px-6 py-3 rounded-xl font-bold text-slate-400 hover:text-white hover:bg-slate-800 border border-transparent hover:border-slate-600 transition-all">
                    إلغاء
                </a>
                <button type="submit" class="bg-gradient-to-r from-purple-600 to-cyan-600 hover:from-purple-500 hover:to-cyan-500 text-white px-8 py-3 rounded-xl font-bold shadow-[0_4px_15px_rgba(34,211,238,0.3)] transition-all transform hover:-translate-y-1 flex items-center gap-2 border border-cyan-400/30">
                    <span>حفظ ونشر الخدمة 🚀</span>
                </button>
            </div>
        </form>
    </div>

@endsection
