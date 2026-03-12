@extends('admin.layouts.app')

@section('header_title', 'إدارة الخدمات المجسدة')

@section('content')

    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4 relative z-10">
        <div>
            <h3 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 drop-shadow-md">الخدمات المُقدمة</h3>
            <p class="text-slate-400 text-sm mt-1">إدارة الخدمات التي تظهر في الواجهة الرئيسية للمجرة.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="bg-gradient-to-r from-cyan-600 to-purple-600 hover:from-cyan-500 hover:to-purple-500 text-white px-6 py-3 rounded-xl font-bold shadow-[0_4px_20px_rgba(34,211,238,0.4)] transition-all flex items-center gap-2 transform hover:-translate-y-1 border border-cyan-400/30">
            <span class="text-xl leading-none">+</span>
            <span>إضافة خدمة جديدة 🚀</span>
        </a>
    </div>

    <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-lg border border-slate-700/50 overflow-hidden relative z-10">

        <div class="absolute -left-20 -top-20 w-64 h-64 bg-cyan-600/10 rounded-full filter blur-[80px] pointer-events-none"></div>

        <div class="overflow-x-auto relative z-10">
            <table class="w-full text-right">
                <thead class="bg-[#1e293b]/80 border-b border-slate-700/80 text-cyan-300">
                    <tr>
                        <th class="p-4 font-bold w-16">#</th>
                        <th class="p-4 font-bold w-24">الأيقونة</th>
                        <th class="p-4 font-bold">عنوان الخدمة</th>
                        <th class="p-4 font-bold">الوصف المختصر</th>
                        <th class="p-4 font-bold w-32 text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($services as $index => $service)
                        <tr class="hover:bg-white/5 transition duration-300 group">
                            <td class="p-4 text-slate-500 font-semibold group-hover:text-cyan-400 transition-colors">
                                {{ $services->firstItem() + $index }}
                            </td>
                            <td class="p-4 text-center">
                                @if($service->icon)
                                    <img src="{{ asset($service->icon) }}" alt="{{ $service->title }}"
                                         class="w-12 h-12 object-cover rounded-lg bg-[#050B14] border border-slate-600 shadow-[0_0_10px_rgba(0,0,0,0.5)] p-1 inline-block group-hover:border-cyan-500/50 transition-colors">
                                @else
                                    <div class="w-12 h-12 bg-[#050B14] rounded-lg flex items-center justify-center text-slate-500 text-xl border border-slate-600 inline-flex group-hover:border-cyan-500/50 transition-colors shadow-inner">
                                        💻
                                    </div>
                                @endif
                            </td>

                            <td class="p-4 font-bold text-slate-200 group-hover:text-white transition-colors">
                                {{ $service->title }}
                            </td>

                            <td class="p-4 text-slate-400 text-sm group-hover:text-slate-300 transition-colors">
                                {{ Str::limit($service->description, 50) }}
                            </td>

                            <td class="p-4 flex items-center justify-center gap-3">
                                <a href="{{ route('admin.services.edit', $service) }}" class="p-2 text-cyan-400 bg-cyan-900/30 border border-cyan-500/30 hover:bg-cyan-500 hover:text-white hover:shadow-[0_0_15px_rgba(34,211,238,0.5)] rounded-lg transition duration-300" title="تعديل">
                                    ✏️
                                </a>

                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه الخدمة نهائياً من المجرة؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-400 bg-red-900/30 border border-red-500/30 hover:bg-red-500 hover:text-white hover:shadow-[0_0_15px_rgba(239,68,68,0.5)] rounded-lg transition duration-300" title="حذف">
                                        🗑️
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-16 text-center bg-[#050B14]/30">
                                <div class="text-6xl mb-6 opacity-40 animate-pulse drop-shadow-[0_0_15px_rgba(168,85,247,0.5)]">🛸</div>
                                <h4 class="text-2xl font-bold text-slate-300 mb-2">لا توجد خدمات مُضافة حتى الآن</h4>
                                <p class="text-slate-500 mb-8 max-w-md mx-auto">لم تقم بإضافة أي خدمات. ابدأ الآن بتكوين أسطول خدماتك ليظهر للعملاء في الواجهة الرئيسية.</p>
                                <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 bg-purple-900/40 border border-purple-500/50 text-purple-300 hover:bg-purple-600 hover:text-white px-8 py-3 rounded-xl font-bold transition shadow-[0_0_15px_rgba(168,85,247,0.2)] hover:shadow-[0_0_20px_rgba(168,85,247,0.6)] transform hover:-translate-y-1">
                                    <span>إضافة خدمة الآن</span>
                                    <span>✨</span>
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($services->hasPages())
            <div class="p-4 border-t border-slate-700/80 bg-[#1e293b]/50">
                <div class="dark-pagination">
                    {{ $services->links() }}
                </div>
            </div>
        @endif
    </div>

@endsection
