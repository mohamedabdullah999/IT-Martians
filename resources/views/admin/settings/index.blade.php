@extends('admin.layouts.app')

@section('header_title', 'إعدادات النظام المجري')

@section('content')

    <div class="mb-6">
        <h3 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">⚙️ إعدادات الموقع</h3>
        <p class="text-slate-400 text-sm mt-1">تحكم في إحداثيات ونصوص واجهة الكوكب (الموقع الرئيسي).</p>
    </div>

    @if(session('success'))
        <div class="bg-cyan-900/30 border border-cyan-500/50 text-cyan-300 px-4 py-4 rounded-xl mb-6 font-semibold shadow-[0_0_15px_rgba(34,211,238,0.2)] flex items-center gap-3">
            <span class="text-xl">✅</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative z-10">
        @csrf
        @method('PUT')

        <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-lg border border-slate-700/50 p-8 relative overflow-hidden group">
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-purple-600/10 rounded-full filter blur-[50px] pointer-events-none group-hover:bg-purple-600/20 transition-all"></div>

            <h4 class="text-lg font-bold text-purple-300 mb-6 flex items-center gap-2 border-b border-slate-700/50 pb-4 relative z-10">
                <span>🎨</span> الهوية البصرية للمجرة
            </h4>
            <div class="grid grid-cols-1 gap-6 relative z-10">
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">لوجو الموقع (الرمز)</label>
                    <input type="file" name="site_logo" accept="image/*"
                           class="w-full text-slate-400 font-medium text-sm bg-[#1e293b] file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-[#050B14] file:hover:bg-[#16123D] file:text-cyan-400 file:font-bold rounded-xl border @error('site_logo') border-red-500 @else border-slate-600 @enderror focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 transition-all">

                    @error('site_logo') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                    <p class="text-xs text-slate-500 mt-2">💡 يفضل أن تكون الصورة بصيغة PNG وبخلفية شفافة. اترك الحقل فارغاً إذا لم ترد تغيير اللوجو الحالي.</p>

                    @if(isset($settings['site_logo']) && $settings['site_logo'])
                        <div class="mt-4 p-4 border border-slate-700/50 rounded-xl bg-[#050B14]/50 inline-block">
                            <p class="text-xs font-bold text-slate-400 mb-2">اللوجو الحالي:</p>
                            <div class="h-16 px-4 rounded-lg bg-[#0f172a] border border-slate-700 flex items-center justify-center overflow-hidden shadow-inner">
                                <img src="{{ asset($settings['site_logo']) }}" alt="Site Logo" class="max-h-full object-contain filter drop-shadow-[0_0_8px_rgba(255,255,255,0.2)]">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-lg border border-slate-700/50 p-8 relative overflow-hidden group">
            <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-cyan-600/10 rounded-full filter blur-[50px] pointer-events-none group-hover:bg-cyan-600/20 transition-all"></div>

            <h4 class="text-lg font-bold text-cyan-300 mb-6 flex items-center gap-2 border-b border-slate-700/50 pb-4 relative z-10">
                <span>🚀</span> رسالة الاستقبال (الهيدر)
            </h4>
            <div class="grid grid-cols-1 gap-6 relative z-10">
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">العنوان الرئيسي الكبير (Hero Title)</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}"
                           class="w-full px-4 py-3 rounded-xl border @error('hero_title') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition"
                           placeholder="مثال: IT Martians.. نأخذ أعمالك إلى مجرة أخرى">
                    @error('hero_title') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">النص الفرعي (Hero Subtitle)</label>
                    <textarea name="hero_subtitle" rows="2"
                              class="w-full px-4 py-3 rounded-xl border @error('hero_subtitle') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition resize-none"
                              placeholder="نقدم أفضل الحلول التقنية المبتكرة...">{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                    @error('hero_subtitle') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-lg border border-slate-700/50 p-8 relative overflow-hidden group">
            <h4 class="text-lg font-bold text-blue-400 mb-6 flex items-center gap-2 border-b border-slate-700/50 pb-4 relative z-10">
                <span>🏢</span> قسم "عن المؤسسة"
            </h4>
            <div class="grid grid-cols-1 gap-6 relative z-10">
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">رابط الفيديو التعريفي (YouTube URL)</label>
                    <input type="url" name="about_video_url" value="{{ old('about_video_url', $settings['about_video_url'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('about_video_url') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition text-left"
                           placeholder="https://youtube.com/watch?v=...">
                    @error('about_video_url') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">النص التعريفي (About Text)</label>
                    <textarea name="about_text" rows="5"
                              class="w-full px-4 py-3 rounded-xl border @error('about_text') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition"
                              placeholder="نحن في IT Martians نسعى لتقديم...">{{ old('about_text', $settings['about_text'] ?? '') }}</textarea>
                    @error('about_text') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-lg border border-slate-700/50 p-8 relative overflow-hidden group">
            <h4 class="text-lg font-bold text-red-400 mb-6 flex items-center gap-2 border-b border-slate-700/50 pb-4 relative z-10">
                <span>📡</span> إحداثيات الاتصال
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-300 mb-2">المقر الرئيسي</label>
                    <input type="text" name="contact_address" value="{{ old('contact_address', $settings['contact_address'] ?? '') }}"
                           class="w-full px-4 py-3 rounded-xl border @error('contact_address') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-red-500/50 focus:border-red-400 outline-none transition"
                           placeholder="المملكة العربية السعودية، الرياض...">
                    @error('contact_address') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">خط الاتصال المباشر</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('contact_phone') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-red-500/50 focus:border-red-400 outline-none transition text-left"
                           placeholder="+966 5X XXX XXXX">
                    @error('contact_phone') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">البريد الفضائي</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('contact_email') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-red-500/50 focus:border-red-400 outline-none transition text-left"
                           placeholder="info@it-martians.com">
                    @error('contact_email') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-lg border border-slate-700/50 p-8 relative overflow-hidden group">
            <h4 class="text-lg font-bold text-green-400 mb-6 flex items-center gap-2 border-b border-slate-700/50 pb-4 relative z-10">
                <span>🛰️</span> شبكات التواصل
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">فيسبوك</label>
                    <input type="text" name="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('social_facebook') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition text-left">
                    @error('social_facebook') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">تويتر (X)</label>
                    <input type="text" name="social_twitter" value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('social_twitter') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition text-left">
                    @error('social_twitter') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">لينكد إن</label>
                    <input type="text" name="social_linkedin" value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('social_linkedin') border-red-500 bg-red-900/20 @else border-slate-700 bg-[#1e293b] focus:bg-[#050B14] @enderror text-white placeholder-slate-600 focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 outline-none transition text-left">
                    @error('social_linkedin') <p class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end sticky bottom-6 z-20">
            <button type="submit" class="bg-gradient-to-r from-purple-600 to-cyan-600 hover:from-purple-500 hover:to-cyan-500 text-white px-12 py-4 rounded-xl font-black text-lg shadow-[0_4px_20px_rgba(34,211,238,0.4)] transition-all transform hover:-translate-y-1 flex items-center gap-3 border border-cyan-400/30">
                <span>تحديث النظام</span>
                <span>💾</span>
            </button>
        </div>
    </form>

@endsection
