@extends('admin.layouts.app')

@section('header_title', 'كابينة القيادة الرئيسية 🚀')

@section('content')

    <style>
        @keyframes float-dash {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }
        @keyframes float-reverse-dash {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(15px) rotate(-5deg); }
        }
        .animate-float-dash { animation: float-dash 6s ease-in-out infinite; }
        .animate-float-reverse { animation: float-reverse-dash 7s ease-in-out infinite; }

        body, main { background-color: #050B14 !important; }
    </style>

    <div class="mb-8 relative overflow-hidden bg-gradient-to-r from-[#16123D] to-[#050B14] rounded-3xl p-8 shadow-[0_10px_30px_rgba(0,0,0,0.5)] border border-purple-500/20 flex flex-col md:flex-row items-center justify-between group">

        <div class="absolute top-0 right-0 w-64 h-64 bg-purple-600/10 rounded-full filter blur-[80px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-cyan-600/10 rounded-full filter blur-[80px] pointer-events-none"></div>

        <div class="absolute top-6 left-1/4 text-2xl opacity-30 animate-float-dash pointer-events-none">✨</div>
        <div class="absolute bottom-6 right-1/3 text-xl opacity-20 animate-float-reverse pointer-events-none">⭐</div>
        <div class="absolute top-10 right-10 text-4xl opacity-10 animate-float-reverse pointer-events-none">🪐</div>

        <div class="relative z-10 text-center md:text-right mb-6 md:mb-0">
            <h3 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 mb-3">
                أهلاً بك يا {{ Auth::user()?->name ?? 'القائد' }}! 👨‍🚀
            </h3>
            <p class="text-purple-200/80 font-semibold text-lg">هنا كابينة القيادة لنظرة سريعة على أداء IT Martians اليوم.</p>
        </div>

        <div class="relative z-10 w-24 h-24 bg-[#0a0f25] rounded-full flex items-center justify-center text-5xl shadow-[0_0_20px_rgba(34,211,238,0.2)] border-2 border-cyan-500/30 animate-float-dash">
            🛸
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 relative z-10">

        <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl p-6 shadow-lg border border-slate-700/50 hover:-translate-y-2 hover:shadow-[0_0_25px_rgba(34,211,238,0.15)] hover:border-cyan-500/50 transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-[#1e293b] text-cyan-400 border border-cyan-500/30 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all shadow-inner">
                    💻
                </div>
                <span class="text-cyan-300 bg-cyan-900/30 px-3 py-1 rounded-full text-xs font-bold border border-cyan-500/30">نشط</span>
            </div>
            <h4 class="text-slate-400 text-sm font-bold mb-2">إجمالي الخدمات</h4>
            <p class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-400">{{$stats['services']}}</p>
        </div>

        <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl p-6 shadow-lg border border-slate-700/50 hover:-translate-y-2 hover:shadow-[0_0_25px_rgba(168,85,247,0.15)] hover:border-purple-500/50 transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-[#1e293b] text-purple-400 border border-purple-500/30 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all shadow-inner">
                    📦
                </div>
                <span class="text-purple-300 bg-purple-900/30 px-3 py-1 rounded-full text-xs font-bold border border-purple-500/30">متاح</span>
            </div>
            <h4 class="text-slate-400 text-sm font-bold mb-2">المنتجات الرقمية</h4>
            <p class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-400">{{$stats['products']}}</p>
        </div>

        <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl p-6 shadow-lg border border-slate-700/50 hover:-translate-y-2 hover:shadow-[0_0_25px_rgba(239,68,68,0.15)] hover:border-red-500/50 transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-[#1e293b] text-red-400 border border-red-500/30 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:-rotate-6 transition-all shadow-inner">
                    ✉️
                </div>
                <span class="text-red-300 bg-red-900/30 px-3 py-1 rounded-full text-xs font-bold border border-red-500/30">وارد</span>
            </div>
            <h4 class="text-slate-400 text-sm font-bold mb-2">إشارات الزوار</h4>
            <p class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-400">{{$stats['messages']}}</p>
        </div>

        <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl p-6 shadow-lg border border-slate-700/50 hover:-translate-y-2 hover:shadow-[0_0_25px_rgba(59,130,246,0.15)] hover:border-blue-500/50 transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-[#1e293b] text-blue-400 border border-blue-500/30 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all shadow-inner">
                    🤝
                </div>
                <span class="text-blue-300 bg-blue-900/30 px-3 py-1 rounded-full text-xs font-bold border border-blue-500/30">موثوق</span>
            </div>
            <h4 class="text-slate-400 text-sm font-bold mb-2">شركاء المجرة</h4>
            <p class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-400">{{$stats['partners']}}</p>
        </div>

    </div>

    <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl p-6 shadow-lg border border-slate-700/50 relative z-10">
        <div class="flex items-center justify-between mb-6 border-b border-slate-700/50 pb-4">
            <h3 class="text-xl font-bold text-cyan-300 flex items-center gap-2">
                <span class="animate-pulse text-red-500">🔴</span> رادار الإشارات الحديثة
            </h3>
            <a href="{{ route('admin.contact_messages.index') }}" class="text-sm font-bold text-purple-400 hover:text-cyan-300 hover:-translate-x-1 transition-all">عرض كل الإشارات &larr;</a>
        </div>

        <div class="text-center py-16 text-slate-500 bg-[#050B14] rounded-2xl border border-dashed border-slate-700 hover:border-purple-500/50 transition-colors">
            <div class="text-5xl mb-4 opacity-50 animate-float-dash inline-block">📡</div>
            <p class="font-bold text-xl text-slate-400 mb-2">عدد الإشارات الكلية: <span class="text-cyan-400">{{$stats['messages']}}</span></p>
            <p class="text-sm mt-2 text-slate-500">ستظهر هنا أحدث الاستفسارات القادمة من كوكب الأرض (الموقع الرئيسي).</p>
        </div>
    </div>
@endsection
