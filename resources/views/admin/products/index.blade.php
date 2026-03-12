@extends('admin.layouts.app')

@section('header_title', 'مستودع المنتجات الرقمية')

@section('content')

    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4 relative z-10">
        <div class="text-center sm:text-right">
            <h3 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 drop-shadow-md">📦 المنتجات والأعمال</h3>
            <p class="text-slate-400 text-sm mt-1">عرض وإدارة المنتجات وسابقة الأعمال الخاصة بالأسطول.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-gradient-to-r from-cyan-600 to-purple-600 hover:from-cyan-500 hover:to-purple-500 text-white px-6 py-3 rounded-xl font-bold shadow-[0_4px_20px_rgba(34,211,238,0.4)] transition-all flex items-center gap-2 transform hover:-translate-y-1 border border-cyan-400/30">
            <span class="text-xl leading-none">+</span>
            <span>إضافة منتج جديد 🚀</span>
        </a>
    </div>

    @if(session('success'))
        <div class="bg-cyan-900/30 border border-cyan-500/50 text-cyan-300 px-4 py-4 rounded-xl mb-8 font-semibold shadow-[0_0_15px_rgba(34,211,238,0.2)] flex items-center gap-3 relative z-10">
            <span class="text-xl">✅</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-[#0f172a]/90 backdrop-blur-md rounded-3xl shadow-lg border border-slate-700/50 overflow-hidden relative z-10">

        <div class="absolute -right-20 -top-20 w-64 h-64 bg-purple-600/10 rounded-full filter blur-[80px] pointer-events-none"></div>

        <div class="overflow-x-auto relative z-10">
            <table class="w-full text-right text-sm text-slate-400">
                <thead class="text-xs text-cyan-300 uppercase bg-[#1e293b]/80 border-b border-slate-700/80">
                    <tr>
                        <th class="px-6 py-4 font-bold">الصورة</th>
                        <th class="px-6 py-4 font-bold">اسم المنتج</th>
                        <th class="px-6 py-4 font-bold">رابط التوجيه</th>
                        <th class="px-6 py-4 font-bold">تاريخ الإضافة</th>
                        <th class="px-6 py-4 font-bold text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($products as $product)
                        <tr class="hover:bg-white/5 transition duration-300 group">

                            <td class="px-6 py-4">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg bg-[#050B14] border border-slate-600 shadow-[0_0_10px_rgba(0,0,0,0.5)] group-hover:border-purple-500/50 transition-colors">
                                @else
                                    <div class="w-16 h-16 bg-[#050B14] rounded-lg flex items-center justify-center text-slate-500 text-2xl border border-slate-600 shadow-inner group-hover:border-purple-500/50 transition-colors">
                                        📦
                                    </div>
                                @endif
                            </td>

                            <td class="px-6 py-4 font-bold text-slate-200 text-base group-hover:text-white transition-colors">
                                {{ $product->name }}
                            </td>

                            <td class="px-6 py-4">
                                @if($product->link)
                                    <a href="{{ $product->link }}" target="_blank" class="text-cyan-400 hover:text-cyan-300 font-semibold transition-colors flex items-center gap-1 w-fit border-b border-transparent hover:border-cyan-300 pb-0.5" dir="ltr">
                                        رابط المنتج ↗
                                    </a>
                                @else
                                    <span class="text-slate-500 bg-slate-800/50 px-3 py-1 rounded-md text-xs border border-slate-700">لا يوجد</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-slate-400 font-mono" dir="ltr">
                                {{ $product->created_at->format('Y-m-d') }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="p-2 text-cyan-400 bg-cyan-900/30 border border-cyan-500/30 hover:bg-cyan-500 hover:text-white hover:shadow-[0_0_15px_rgba(34,211,238,0.5)] rounded-lg transition duration-300" title="تعديل">
                                        ✏️
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من مسح هذا المنتج من سجلات المجرة؟');" class="inline">
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
                            <td colspan="5" class="px-6 py-16 text-center bg-[#050B14]/30">
                                <div class="text-6xl mb-6 opacity-40 animate-pulse drop-shadow-[0_0_15px_rgba(34,211,238,0.5)]">📦</div>
                                <h4 class="text-2xl font-bold text-slate-300 mb-2">مستودع المنتجات فارغ</h4>
                                <p class="text-slate-500 mb-8 max-w-md mx-auto">لم تقم بإضافة أي منتجات حتى الآن. ابدأ بتكوين أعمالك لعرضها على الكوكب.</p>
                                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 bg-cyan-900/40 border border-cyan-500/50 text-cyan-300 hover:bg-cyan-600 hover:text-white px-8 py-3 rounded-xl font-bold transition shadow-[0_0_15px_rgba(34,211,238,0.2)] hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] transform hover:-translate-y-1">
                                    <span>إضافة منتج الآن</span>
                                    <span>✨</span>
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="p-6 border-t border-slate-700/80 bg-[#1e293b]/50">
                <div class="dark-pagination">
                    {{ $products->links() }}
                </div>
            </div>
        @endif
    </div>

@endsection
