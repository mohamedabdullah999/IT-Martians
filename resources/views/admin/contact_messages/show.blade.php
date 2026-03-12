@extends('admin.layouts.app')

@section('header_title', 'تحليل الإشارة الواردة')

@section('content')

    <div class="flex flex-col sm:flex-row items-center justify-between mb-8 gap-4 relative z-10">
        <div class="text-center sm:text-right">
            <h3 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 drop-shadow-md">📡 تفاصيل الإشارة المستلمة</h3>
            <p class="text-slate-400 text-sm mt-1">قراءة وتحليل محتوى الإرسال الوارد من الزائر.</p>
        </div>
        <a href="{{ route('admin.contact_messages.index') }}" class="bg-[#1e293b] border border-slate-700 hover:bg-slate-800 hover:border-slate-600 text-slate-300 px-5 py-2.5 rounded-xl font-bold transition-all flex items-center gap-2 shadow-sm hover:shadow-md">
            <span>&larr;</span>
            <span>العودة للرادار</span>
        </a>
    </div>

    <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.5)] border border-slate-700/50 p-6 md:p-10 max-w-4xl mx-auto relative overflow-hidden group">

        <div class="absolute -right-20 -top-20 w-80 h-80 bg-purple-600/10 rounded-full filter blur-[100px] pointer-events-none group-hover:bg-cyan-600/10 transition-colors duration-700"></div>

        <div class="relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10 pb-8 border-b border-slate-700/50">
                <div class="space-y-1">
                    <p class="text-xs text-purple-400 font-black uppercase tracking-widest">اسم المُرسل</p>
                    <p class="text-xl font-bold text-white">{{ $message->name }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs text-cyan-400 font-black uppercase tracking-widest">إحداثيات الاتصال (الهاتف)</p>
                    <p class="text-xl font-bold text-white font-mono" dir="ltr">{{ $message->phone }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs text-slate-500 font-black uppercase tracking-widest">البريد الإلكتروني</p>
                    <p class="text-lg font-bold text-slate-300">{{ $message->email ?? 'لم يتم إرسال بريد' }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs text-slate-500 font-black uppercase tracking-widest">توقيت الوصول</p>
                    <p class="text-lg font-bold text-slate-300 font-mono" dir="ltr">{{ $message->created_at->format('Y-m-d h:i A') }}</p>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <p class="text-xs text-purple-400 font-black uppercase tracking-widest mb-3">موضوع الإشارة</p>
                    <div class="bg-purple-900/20 border border-purple-500/30 p-4 rounded-2xl">
                        <h4 class="text-xl font-bold text-white leading-tight">
                            {{ $message->subject ?? 'بدون عنوان' }}
                        </h4>
                    </div>
                </div>

                <div>
                    <p class="text-xs text-cyan-400 font-black uppercase tracking-widest mb-3">محتوى الإرسال (فك التشفير)</p>
                    <div class="bg-[#050B14] p-6 rounded-2xl border border-slate-700 text-slate-300 leading-relaxed whitespace-pre-line text-lg shadow-inner relative overflow-hidden">
                        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#22d3ee 1px, transparent 1px); background-size: 20px 20px;"></div>

                        <div class="relative z-10">
                            {{ $message->content }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-slate-700/50 flex justify-end">
                <form action="{{ route('admin.contact_messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من مسح هذه الإشارة من السجلات؟');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-900/30 border border-red-500/30 text-red-400 hover:bg-red-600 hover:text-white px-6 py-2.5 rounded-xl font-bold transition-all flex items-center gap-2 shadow-lg">
                        <span>🗑️ مسح السجل</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
