@extends('admin.layouts.app')

@section('header_title', 'إدارة حلفاء المجرة (الشركاء)')

@section('content')

    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4 relative z-10">
        <div class="text-center sm:text-right">
            <h3 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 drop-shadow-md">🤝 شركاء النجاح</h3>
            <p class="text-slate-400 text-sm mt-1">عرض وإدارة شركاء النجاح وحلفاء المؤسسة في المجرة.</p>
        </div>
        <a href="{{ route('admin.partners.create') }}" class="bg-gradient-to-r from-cyan-600 to-purple-600 hover:from-cyan-500 hover:to-purple-500 text-white px-6 py-3 rounded-xl font-bold shadow-[0_4px_20px_rgba(34,211,238,0.4)] transition-all flex items-center gap-2 transform hover:-translate-y-1 border border-cyan-400/30">
            <span class="text-xl leading-none">+</span>
            <span>إضافة شريك جديد 🚀</span>
        </a>
    </div>

    @if(session('success'))
        <div class="bg-cyan-900/30 border border-cyan-500/50 text-cyan-300 px-4 py-4 rounded-xl mb-8 font-semibold shadow-[0_0_15px_rgba(34,211,238,0.2)] flex items-center gap-3 relative z-10">
            <span class="text-xl">✅</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-lg border border-slate-700/50 overflow-hidden relative z-10">

        <div class="absolute -left-20 -top-20 w-64 h-64 bg-cyan-600/10 rounded-full filter blur-[80px] pointer-events-none"></div>

        <div class="overflow-x-auto relative z-10">
            <table class="w-full text-right text-sm text-slate-400">
                <thead class="text-xs text-cyan-300 uppercase bg-[#1e293b]/80 border-b border-slate-700/80">
                    <tr>
                        <th class="px-6 py-4 font-bold w-24">اللوجو</th>
                        <th class="px-6 py-4 font-bold">اسم الشريك</th>
                        <th class="px-6 py-4 font-bold">تاريخ الانضمام</th>
                        <th class="px-6 py-4 font-bold text-center w-32">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($partners as $partner)
                        <tr class="hover:bg-white/5 transition duration-300 group">

                            <td class="px-6 py-4">
                                @if($partner->logo)
                                    <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" class="w-16 h-16 object-contain bg-white/90 rounded-xl border border-slate-600 shadow-[0_0_10px_rgba(0,0,0,0.5)] p-2 group-hover:border-purple-500/50 transition-colors">
                                @else
                                    <div class="w-16 h-16 bg-[#1e293b] rounded-xl flex items-center justify-center text-slate-500 text-xs border border-slate-600 shadow-inner group-hover:border-purple-500/50 transition-colors">لا يوجد</div>
                                @endif
                            </td>

                            <td class="px-6 py-4 font-bold text-slate-200 text-base group-hover:text-white transition-colors">
                                {{ $partner->name }}
                            </td>

                            <td class="px-6 py-4 text-slate-400 font-mono" dir="ltr">
                                {{ $partner->created_at->format('Y-m-d') }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.partners.edit', $partner->id) }}" class="p-2 text-cyan-400 bg-cyan-900/30 border border-cyan-500/30 hover:bg-cyan-500 hover:text-white hover:shadow-[0_0_15px_rgba(34,211,238,0.5)] rounded-lg transition duration-300" title="تعديل">
                                        ✏️
                                    </a>

                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا الشريك من التحالف؟');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-400 bg-red-900/30 border border-red-500/30 hover:bg-red-500 hover:text-white hover:shadow-[0_0_15px_rgba(239,68,68,0.5)] rounded-lg transition duration-300" title="حذف">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center bg-[#050B14]/30">
                                <div class="text-6xl mb-6 opacity-40 animate-pulse drop-shadow-[0_0_15px_rgba(34,211,238,0.5)]">🤝</div>
                                <h4 class="text-2xl font-bold text-slate-300 mb-2">لا يوجد شركاء في التحالف حتى الآن</h4>
                                <p class="text-slate-500 mb-8 max-w-md mx-auto">لم تقم بإضافة أي شركاء نجاح. ابدأ بتكوين تحالفاتك لتعزيز الثقة في المجرة.</p>
                                <a href="{{ route('admin.partners.create') }}" class="inline-flex items-center gap-2 bg-cyan-900/40 border border-cyan-500/50 text-cyan-300 hover:bg-cyan-600 hover:text-white px-8 py-3 rounded-xl font-bold transition shadow-[0_0_15px_rgba(34,211,238,0.2)] hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] transform hover:-translate-y-1">
                                    <span>إضافة شريك الآن</span>
                                    <span>✨</span>
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($partners->hasPages())
            <div class="p-6 border-t border-slate-700/80 bg-[#1e293b]/50">
                <div class="dark-pagination">
                    {{ $partners->links() }}
                </div>
            </div>
        @endif
    </div>

@endsection
