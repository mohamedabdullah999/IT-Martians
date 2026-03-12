<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>لوحة التحكم - IT Martians</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Cairo', sans-serif; }
        .sidebar-transition { transition: transform 0.3s ease-in-out; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #050B14; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #22d3ee; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#050B14] text-slate-300 antialiased selection:bg-cyan-500 selection:text-white" x-data="{ sidebarOpen: false }">

    @inject('settingManager', 'App\Services\SettingManager')
    @php
        $settings = $settingManager->getAllSettings();
    @endphp

    <div class="flex h-screen overflow-hidden">

        <aside :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'" class="sidebar-transition fixed inset-y-0 right-0 z-50 w-64 bg-[#0f172a] border-l border-slate-800 text-slate-300 shadow-[0_0_30px_rgba(0,0,0,0.8)] md:relative md:translate-x-0 flex flex-col">

            <div class="flex items-center justify-center h-20 border-b border-slate-800 px-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#1e1a3b] overflow-hidden shrink-0 shadow-[0_0_15px_rgba(34,211,238,0.3)] border border-cyan-500/50">
                        <img src="{{ asset($settings['site_logo'] ?? 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80') }}" alt="Logo" class="w-full h-full object-cover">
                    </div>
                    <span class="text-lg font-black tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">IT Martians</span>
                </div>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-purple-600/20 to-cyan-600/20 border border-cyan-500/30 text-cyan-300 shadow-inner font-bold' : 'text-slate-400 hover:bg-[#1e293b] hover:text-cyan-300 font-semibold' }}">
                    <span class="text-2xl">📊</span>
                    <span class="text-sm">لوحة المتابعة</span>
                </a>

                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.services.*') ? 'bg-gradient-to-r from-purple-600/20 to-cyan-600/20 border border-cyan-500/30 text-cyan-300 shadow-inner font-bold' : 'text-slate-400 hover:bg-[#1e293b] hover:text-cyan-300 font-semibold' }}">
                    <span class="text-2xl">💻</span>
                    <span class="text-sm">الخدمات</span>
                </a>

                <a href="{{ route('admin.products.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.products.*') ? 'bg-gradient-to-r from-purple-600/20 to-cyan-600/20 border border-cyan-500/30 text-cyan-300 shadow-inner font-bold' : 'text-slate-400 hover:bg-[#1e293b] hover:text-cyan-300 font-semibold' }}">
                    <span class="text-2xl">📦</span>
                    <span class="text-sm">المنتجات</span>
                </a>

                <a href="{{ route('admin.contact_messages.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.contact_messages.*') ? 'bg-gradient-to-r from-purple-600/20 to-cyan-600/20 border border-cyan-500/30 text-cyan-300 shadow-inner font-bold' : 'text-slate-400 hover:bg-[#1e293b] hover:text-cyan-300 font-semibold' }}">
                    <span class="text-2xl">✉️</span>
                    <span class="text-sm">إشارات الزوار</span>
                </a>

                <a href="{{ route('admin.partners.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.partners.*') ? 'bg-gradient-to-r from-purple-600/20 to-cyan-600/20 border border-cyan-500/30 text-cyan-300 shadow-inner font-bold' : 'text-slate-400 hover:bg-[#1e293b] hover:text-cyan-300 font-semibold' }}">
                    <span class="text-2xl">🤝</span>
                    <span class="text-sm">شركاء المجرة</span>
                </a>

                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-purple-600/20 to-cyan-600/20 border border-cyan-500/30 text-cyan-300 shadow-inner font-bold' : 'text-slate-400 hover:bg-[#1e293b] hover:text-cyan-300 font-semibold' }}">
                    <span class="text-2xl">⚙️</span>
                    <span class="text-sm">إعدادات النظام</span>
                </a>

            </nav>

            <div class="p-4 border-t border-slate-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-red-900/40 border border-red-500/30 hover:bg-red-600 text-red-400 hover:text-white rounded-xl transition-all font-bold shadow-md">
                        <span>فصل الاتصال</span>
                        <span>🚪</span>
                    </button>
                </form>
            </div>
        </aside>

        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity class="fixed inset-0 z-40 bg-black/70 backdrop-blur-sm md:hidden"></div>

        <div class="flex-1 flex flex-col overflow-hidden bg-[#050B14] relative">

            <header class="h-20 bg-[#0f172a]/80 backdrop-blur-md border-b border-slate-800 flex items-center justify-between px-6 z-10 relative">

                <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-cyan-400 hover:text-purple-400 focus:outline-none transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>

                <h2 class="hidden md:block text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-400 drop-shadow-md">
                    @yield('header_title', 'لوحة التحكم')
                </h2>

                <div class="flex items-center gap-5 mr-auto md:mr-0">
                    <a href="{{ route('home') }}" target="_blank" class="hidden sm:flex items-center gap-2 text-sm font-bold text-slate-300 hover:text-cyan-400 hover:border-cyan-500/50 transition-all bg-[#1e293b] px-4 py-2 rounded-lg border border-slate-700 shadow-inner">
                        <span>الموقع الرئيسي</span>
                        <span>🌐</span>
                    </a>

                    <div class="flex items-center gap-3 pl-4 border-l border-slate-700">
                        <span class="font-bold text-cyan-300">{{ Auth::user()?->name ?? 'القائد' }}</span>
                        <div class="w-10 h-10 rounded-full bg-[#1e293b] text-cyan-400 border border-cyan-500/50 flex items-center justify-center font-bold text-xl shadow-[0_0_10px_rgba(34,211,238,0.2)]">
                            👨‍🚀
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 md:p-8 relative z-0">

                @if(session('success'))
                    <div class="mb-6 bg-cyan-900/30 border border-cyan-500/50 text-cyan-300 px-4 py-4 rounded-xl shadow-[0_0_15px_rgba(34,211,238,0.2)] relative flex items-center gap-3 animate-pulse" role="alert">
                        <span class="text-2xl">✅</span>
                        <span class="block sm:inline font-bold text-lg">{{ session('success') }}</span>
                    </div>
                @endif

                @yield('content')

            </main>
        </div>
    </div>

</body>
</html>
