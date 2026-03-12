<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - IT Martians</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050B14] min-h-screen flex items-center justify-center p-4 selection:bg-cyan-500 selection:text-white relative overflow-hidden">

    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-purple-900 rounded-full mix-blend-screen filter blur-[120px] opacity-60 pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-cyan-900 rounded-full mix-blend-screen filter blur-[120px] opacity-60 pointer-events-none"></div>

    <div class="bg-[#0f172a]/80 backdrop-blur-xl p-6 sm:p-10 rounded-3xl shadow-[0_10px_50px_rgba(0,0,0,0.5)] w-full max-w-md border border-purple-500/20 relative z-10">

        <div class="text-center mb-8">
            <div class="w-24 h-24 mx-auto rounded-full overflow-hidden border-2 border-cyan-400 mb-4 bg-[#1e1a3b] shadow-[0_0_20px_rgba(34,211,238,0.4)] shrink-0">
                <img src="{{ asset($settings['site_logo'] ?? 'https://i.ibb.co/wZYP2DzW/Chat-GPT-Image-Feb-28-2026-01-03-03-PM.png') }}" alt="IT Martians" class="w-full h-full object-cover">
            </div>
            <h1 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 mb-2">بوابة الإدارة</h1>
            <p class="text-purple-300 text-sm font-bold tracking-widest uppercase">IT Martians 🛸</p>
        </div>

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-300 text-sm font-bold mb-2" for="email">البريد الفضائي (الإلكتروني)</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-3 border border-slate-700 bg-[#1e293b] text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-400/50 focus:border-cyan-400 transition text-left placeholder-slate-500" dir="ltr" placeholder="admin@it-martians.com">

                @error('email')
                    <p class="text-red-400 text-sm font-semibold mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-300 text-sm font-bold mb-2" for="password">كلمة المرور (الشيفرة)</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 border border-slate-700 bg-[#1e293b] text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-400/50 focus:border-cyan-400 transition text-left placeholder-slate-500" dir="ltr" placeholder="••••••••">
                @error('password')
                    <p class="text-red-400 text-sm font-semibold mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-cyan-600 text-white font-bold py-3 px-4 rounded-xl hover:from-purple-500 hover:to-cyan-500 transition duration-300 shadow-[0_4px_15px_rgba(168,85,247,0.4)] transform hover:-translate-y-1">
                دخول للمجرة 🚀
            </button>
        </form>

        <div class="mt-6 text-center border-t border-white/10 pt-6">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-purple-400 hover:text-cyan-300 transition">&larr; العودة للموقع الرئيسي</a>
        </div>
    </div>

</body>
</html>
