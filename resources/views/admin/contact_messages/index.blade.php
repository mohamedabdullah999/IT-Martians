@extends('admin.layouts.app')

@section('header_title', 'رادار الإشارات الواردة')

@section('content')

    <div class="flex items-center justify-between mb-8 relative z-10">
        <div>
            <h3 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 drop-shadow-md">📡 رادار الإشارات (صندوق الوارد)</h3>
            <p class="text-slate-400 text-sm mt-1">استقبال وإدارة الرسائل والاستفسارات الواردة من خارج المجرة.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-cyan-900/30 border border-cyan-500/50 text-cyan-300 px-4 py-4 rounded-xl mb-8 font-semibold shadow-[0_0_15px_rgba(34,211,238,0.2)] flex items-center gap-3 relative z-10">
            <span class="text-xl">✅</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-900/30 border border-red-500/50 text-red-300 px-4 py-4 rounded-xl mb-8 font-semibold shadow-[0_0_15px_rgba(239,68,68,0.2)] flex items-center gap-3 relative z-10">
            <span class="text-xl">⚠️</span>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-lg border border-slate-700/50 overflow-hidden relative z-10">

        <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-cyan-600/10 rounded-full filter blur-[80px] pointer-events-none"></div>

        <div class="overflow-x-auto relative z-10">
            <table class="w-full text-right text-sm text-slate-400">
                <thead class="text-xs text-cyan-300 uppercase bg-[#1e293b]/80 border-b border-slate-700/80">
                    <tr>
                        <th class="px-6 py-4 font-bold text-slate-300">المرسل</th>
                        <th class="px-6 py-4 font-bold text-slate-300">إحداثيات الاتصال (الهاتف)</th>
                        <th class="px-6 py-4 font-bold text-slate-300">موضوع الإشارة</th>
                        <th class="px-6 py-4 font-bold text-slate-300">زمن الوصول</th>
                        <th class="px-6 py-4 font-bold text-slate-300 text-center">الحالة</th>
                        <th class="px-6 py-4 font-bold text-slate-300 text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($messages as $message)
                        <tr class="transition duration-300 group hover:bg-white/5 {{ $message->is_read ? '' : 'bg-cyan-900/10 border-r-4 border-cyan-400' }}">

                            <td class="px-6 py-4 text-sm {{ $message->is_read ? 'text-slate-400' : 'text-white font-bold' }}">
                                {{ $message->name }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-300 font-mono" dir="ltr">
                                {{ $message->phone }}
                            </td>

                            <td class="px-6 py-4 text-sm {{ $message->is_read ? 'text-slate-500' : 'text-cyan-100 font-bold' }}">
                                {{ Str::limit($message->subject ?? 'بدون عنوان', 30) }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-500 font-mono" dir="ltr">
                                {{ $message->created_at->format('Y-m-d') }}
                            </td>

                            <td class="px-6 py-4 text-sm text-center">
                                @if($message->is_read)
                                    <span class="bg-[#1e293b] border border-slate-700 text-slate-500 px-3 py-1 rounded-full text-xs font-semibold">مقروءة</span>
                                @else
                                    <span class="bg-cyan-900/40 border border-cyan-500/50 text-cyan-300 px-3 py-1 rounded-full text-xs font-bold animate-pulse shadow-[0_0_10px_rgba(34,211,238,0.2)]">إشارة جديدة</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm flex justify-center gap-3">
                                <a href="{{ route('admin.contact_messages.show', $message->id) }}" class="flex items-center gap-1 bg-cyan-900/30 border border-cyan-500/30 text-cyan-400 hover:bg-cyan-500 hover:text-white px-3 py-1.5 rounded-lg transition duration-300 font-bold text-xs shadow-sm hover:shadow-[0_0_15px_rgba(34,211,238,0.5)]">
                                    <span>👁️</span> عرض
                                </a>

                                <form action="{{ route('admin.contact_messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من مسح هذه الإشارة نهائياً من الرادار؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center gap-1 bg-red-900/30 border border-red-500/30 text-red-400 hover:bg-red-500 hover:text-white px-3 py-1.5 rounded-lg transition duration-300 font-bold text-xs shadow-sm hover:shadow-[0_0_15px_rgba(239,68,68,0.5)]">
                                        <span>🗑️</span> مسح
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center bg-[#050B14]/30">
                                <div class="text-6xl mb-6 opacity-40 animate-float-dash drop-shadow-[0_0_15px_rgba(34,211,238,0.5)]">📭</div>
                                <h4 class="text-2xl font-bold text-slate-300 mb-2">الرادار هادئ.. لا توجد إشارات</h4>
                                <p class="text-slate-500">لم تصل أي رسائل جديدة من كوكب الأرض حتى الآن.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-700/80 bg-[#1e293b]/50">
            <div class="dark-pagination">
                {{ $messages->links() }}
            </div>
        </div>
    </div>

@endsection
