<nav class="bg-[#050B14]/90 backdrop-blur-md border-b border-purple-500/20 sticky top-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <div class="w-14 h-14 rounded-full overflow-hidden border-2 border-purple-500 flex items-center justify-center bg-[#0a0f25] shadow-[0_0_15px_rgba(168,85,247,0.4)] shrink-0">
                <img src="{{asset($settings['site_logo'] ?? 'https://i.ibb.co/wZYP2DzW/Chat-GPT-Image-Feb-28-2026-01-03-03-PM.png')}}" alt="IT Martians Logo" class="w-full h-full object-cover">
            </div>

            <div class="flex flex-col">
                <span class="font-black text-xl text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">IT Martians</span>
                <span class="text-xs text-purple-300 font-semibold tracking-widest uppercase">Digital Universe</span>
            </div>
        </div>

        <ul class="hidden md:flex items-center gap-6 text-gray-300 font-semibold text-sm">
            <li><a href="#" class="hover:text-cyan-400 hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)] transition-all duration-300">الرئيسية</a></li>
            <li><a href="#about" class="hover:text-cyan-400 hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)] transition-all duration-300">عن الشركة</a></li>
            <li><a href="#services" class="hover:text-cyan-400 hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)] transition-all duration-300">خدماتنا</a></li>
            <li><a href="#products" class="hover:text-cyan-400 hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)] transition-all duration-300">منتجاتنا</a></li>
            <li><a href="#partners" class="hover:text-cyan-400 hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)] transition-all duration-300">شركائنا</a></li>
            <li><a href="#contact" class="hover:text-cyan-400 hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)] transition-all duration-300">تواصل معنا</a></li>
        </ul>

        <div class="flex items-center gap-4">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="hidden sm:inline-block bg-purple-600 text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-cyan-500 hover:shadow-[0_0_15px_rgba(34,211,238,0.5)] transition-all duration-300">
                    لوحة التحكم ⚙️
                </a>
                <form method="POST" action="{{ route('logout') }}" class="m-0 p-0 inline">
                    @csrf
                    <button type="submit" class="text-red-400 text-sm font-bold hover:text-red-500 hover:drop-shadow-[0_0_8px_rgba(239,68,68,0.8)] transition-all">
                        خروج 🚪
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hidden sm:inline-block border border-cyan-500 text-cyan-400 px-5 py-2 rounded-lg text-sm font-bold hover:bg-cyan-500 hover:text-[#050B14] hover:shadow-[0_0_15px_rgba(34,211,238,0.4)] transition-all duration-300">
                    دخول الإدارة 🔒
                </a>
            @endauth

            <button id="mobile-menu-btn" class="md:hidden text-cyan-400 hover:text-purple-400 transition-colors p-2 focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-[#0a0f25]/95 backdrop-blur-xl border-t border-purple-500/20 absolute w-full shadow-2xl">
        <ul class="flex flex-col px-4 py-4 space-y-4 text-gray-300 font-semibold text-sm">
            <li><a href="#" class="block hover:text-cyan-400 transition-colors">الرئيسية</a></li>
            <li><a href="#about" class="block hover:text-cyan-400 transition-colors">عن الشركة</a></li>
            <li><a href="#services" class="block hover:text-cyan-400 transition-colors">خدماتنا</a></li>
            <li><a href="#products" class="block hover:text-cyan-400 transition-colors">منتجاتنا</a></li>
            <li><a href="#partners" class="block hover:text-cyan-400 transition-colors">شركائنا</a></li>
            <li><a href="#contact" class="block hover:text-cyan-400 transition-colors">تواصل معنا</a></li>

            <li class="pt-4 mt-2 border-t border-purple-900/50">
                @guest
                    <a href="{{ route('login') }}" class="block text-cyan-400 font-bold hover:text-cyan-300">دخول الإدارة 🔒</a>
                @else
                    <a href="{{ route('admin.dashboard') }}" class="block text-purple-400 font-bold hover:text-purple-300">لوحة التحكم ⚙️</a>
                @endguest
            </li>
        </ul>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
