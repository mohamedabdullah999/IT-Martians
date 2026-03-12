@extends('layouts.app')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <div id="particles-js" class="fixed inset-0 pointer-events-none" style="z-index: 1;"></div>

    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg) scale(1); }
            50% { transform: translateY(-20px) rotate(10deg) scale(1.05); }
        }
        @keyframes float-reverse {
            0%, 100% { transform: translateY(0) rotate(0deg) scale(1); }
            50% { transform: translateY(25px) rotate(-10deg) scale(0.95); }
        }
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.2); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-delayed { animation: float-reverse 8s ease-in-out infinite; }
        .animate-glow { animation: pulse-glow 4s ease-in-out infinite; }

        .cosmic-bg {
            background: linear-gradient(135deg, #050B14 0%, #16123D 50%, #30185A 100%);
            position: relative;
            overflow: hidden;
        }
        .deep-space-bg { background-color: #050B14; }
        .nebula-bg { background: linear-gradient(to bottom, #050B14, #0f172a); }

        .text-neon-cyan { color: #22d3ee; text-shadow: 0 0 10px rgba(34, 211, 238, 0.4); }
        .text-neon-purple { color: #d8b4fe; text-shadow: 0 0 10px rgba(216, 180, 254, 0.4); }
    </style>

    <section class="cosmic-bg py-40 text-center px-4 border-b border-purple-900/50">
        <div class="absolute top-20 left-10 w-64 h-64 bg-purple-600 rounded-full mix-blend-screen filter blur-[80px] animate-glow pointer-events-none"></div>
        <div class="absolute bottom-10 right-20 w-72 h-72 bg-cyan-600 rounded-full mix-blend-screen filter blur-[90px] animate-glow pointer-events-none" style="animation-delay: 2s;"></div>
        <div class="absolute top-40 right-1/4 w-40 h-40 bg-red-600 rounded-full mix-blend-screen filter blur-[70px] animate-glow pointer-events-none" style="animation-delay: 1s;"></div>

        <div class="absolute top-32 right-[10%] text-5xl md:text-7xl animate-float opacity-80 pointer-events-none drop-shadow-2xl z-0">🚀</div>
        <div class="absolute bottom-24 left-[15%] text-5xl md:text-6xl animate-float-delayed opacity-80 pointer-events-none drop-shadow-2xl z-0">🛸</div>
        <div class="absolute top-1/4 left-1/4 text-2xl animate-float opacity-40 text-white pointer-events-none z-0">✨</div>
        <div class="absolute bottom-1/3 right-1/3 text-3xl animate-float-delayed opacity-40 text-white pointer-events-none z-0">⭐</div>

        <div class="container mx-auto relative z-10 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-purple-300 to-red-400 mb-6 leading-tight drop-shadow-lg" style="line-height: 1.4;">
                {{ $settings['hero_title'] ?? 'IT Martians.. نأخذ أعمالك إلى مجرة أخرى' }}
            </h1>

            <p class="text-lg md:text-2xl text-purple-100 mb-10 max-w-4xl mx-auto font-medium opacity-90 leading-relaxed">
                {{ $settings['hero_subtitle'] ?? 'نقدم حلولاً تقنية مبتكرة خارج حدود الكوكب، لضمان نمو أعمالك في العصر الرقمي الحديث.' }}
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="#contact" class="bg-gradient-to-r from-red-500 to-red-700 text-white px-10 py-4 rounded-full font-black text-lg hover:from-red-600 hover:to-red-800 transition duration-300 transform hover:-translate-y-1 hover:scale-105 shadow-[0_0_20px_rgba(239,68,68,0.5)] border border-red-400/30">
                    ابدأ رحلتك معنا 🚀
                </a>

                <a href="#services" class="bg-white/10 backdrop-blur-md text-white border border-white/20 px-10 py-4 rounded-full font-bold text-lg hover:bg-white/20 transition duration-300 transform hover:-translate-y-1 shadow-lg">
                    استكشف خدماتنا
                </a>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 deep-space-bg relative overflow-hidden" data-animate>
        <div class="absolute -left-40 top-20 w-96 h-96 bg-purple-900/20 rounded-full blur-[100px] pointer-events-none z-0"></div>
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-16 items-center relative z-10">
            <div class="p-4 rounded-xl">
                <h2 class="text-4xl font-bold text-white mb-8 pb-4 relative inline-block">عن الشـركة<span class="absolute bottom-0 right-0 h-1 w-20 bg-cyan-400 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.8)]"></span></h2>
                <p class="text-gray-300 leading-relaxed text-xl text-justify mb-6 opacity-90">
                    {!! nl2br(e($settings['about_text'] ?? 'نحن في IT Martians نسعى لتقديم خدمات تقنية متكاملة تواكب رؤية المستقبل. نعتمد على أحدث التقنيات لبناء أنظمة وحلول تساهم في تطور أعمال عملائنا...')) !!}
                </p>
                <a href="#services" class="text-cyan-400 font-bold text-lg hover:text-cyan-300 hover:underline transition duration-300 drop-shadow-md">اقرأ المزيد عن خدماتنا &larr;</a>
            </div>
            <div class="aspect-video rounded-3xl overflow-hidden shadow-[0_0_30px_rgba(168,85,247,0.15)] relative border border-purple-500/30 group bg-[#0a0f25] z-10">
                @if(!empty($settings['about_video_url']))
                    @php
                    $videoUrl = $settings['about_video_url'];
                    $embedUrl = $videoUrl;
                    if (str_contains($videoUrl, 'youtu.be/')) {
                        $videoId = explode('?', explode('youtu.be/', $videoUrl)[1])[0];
                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                    } elseif (str_contains($videoUrl, 'watch?v=')) {
                        $videoId = explode('&', explode('watch?v=', $videoUrl)[1])[0];
                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                    }
                    @endphp
                    <iframe class="w-full h-full relative z-10" src="{{ $embedUrl }}" title="فيديو تعريفي" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @else
                    <img src="{{ asset($settings['about_image'] ?? 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80') }}" alt="بيئة عمل تقنية" class="w-full h-full object-cover opacity-80 transition-transform duration-1000 group-hover:scale-105 group-hover:opacity-100 relative z-10">
                    <div class="absolute inset-0 bg-[#050B14] bg-opacity-50 flex items-center justify-center transition-opacity duration-500 group-hover:bg-opacity-30 cursor-pointer z-20">
                        <svg class="w-20 h-20 text-white/80 group-hover:text-cyan-400 group-hover:scale-110 transition-all duration-300 drop-shadow-[0_0_15px_rgba(34,211,238,0.5)]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-r from-[#16123D] to-[#050B14] text-white border-y border-white/5 relative overflow-hidden" data-animate>
        <div class="container mx-auto px-4 text-center max-w-5xl relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-white drop-shadow-md">إنجازاتنا في المـجـرة</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <div class="p-8 bg-white/5 backdrop-blur-md rounded-3xl hover:bg-white/10 transition duration-300 shadow-2xl border border-white/10 transform hover:-translate-y-2 flex flex-col items-center justify-center group">
                    <h3 class="text-6xl font-black mb-4 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:scale-110 transition-transform">+{{ $partners->count() }}</h3>
                    <p class="text-xl font-semibold text-purple-200">شركاء نجاح</p>
                </div>
                <div class="p-8 bg-white/5 backdrop-blur-md rounded-3xl hover:bg-white/10 transition duration-300 shadow-2xl border border-white/10 transform hover:-translate-y-2 flex flex-col items-center justify-center group">
                    <h3 class="text-6xl font-black mb-4 text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-purple-400 group-hover:scale-110 transition-transform">{{ $products->count() }}</h3>
                    <p class="text-xl font-semibold text-purple-200">منتجات رقمية</p>
                </div>
                <div class="p-8 bg-white/5 backdrop-blur-md rounded-3xl hover:bg-white/10 transition duration-300 shadow-2xl border border-white/10 transform hover:-translate-y-2 flex flex-col items-center justify-center group">
                    <h3 class="text-6xl font-black mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400 group-hover:scale-110 transition-transform">{{ $services->count() }}</h3>
                    <p class="text-xl font-semibold text-purple-200">خدمات تقنية</p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-24 nebula-bg overflow-hidden relative" data-animate>
        <div class="container mx-auto px-4 mb-16 relative z-10">
            <h2 class="text-4xl font-bold text-center text-white drop-shadow-lg">خدماتنا المتميزة</h2>
        </div>
        <div class="w-full overflow-hidden relative z-10" dir="ltr">
            <div class="flex gap-8 px-4 py-8 carousel-container overflow-x-auto hide-scrollbar snap-x snap-mandatory" dir="rtl">
                @forelse($services as $service)
                    <div class="w-[85vw] sm:w-[22rem] shrink-0 snap-start bg-[#0f172a]/80 backdrop-blur-md border border-purple-500/20 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] hover:shadow-[0_0_25px_rgba(34,211,238,0.15)] hover:border-cyan-400/50 transition duration-500 flex flex-col items-center group pt-8 relative overflow-hidden">
                        <div class="absolute top-0 w-full h-1 bg-gradient-to-r from-transparent via-cyan-400 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="h-32 w-32 bg-[#1e1a3b] rounded-full flex items-center justify-center p-2 border-2 border-purple-500/30 group-hover:border-cyan-400/80 transition duration-500 shadow-[0_0_15px_rgba(168,85,247,0.2)] overflow-hidden relative z-10">
                            @if($service->icon)
                                <img src="{{ asset($service->icon) }}" alt="{{ $service->title }}" class="w-full h-full object-cover rounded-full group-hover:scale-110 transition duration-500">
                            @else
                                <span class="text-5xl opacity-80 group-hover:scale-110 transition-transform">💻</span>
                            @endif
                        </div>
                        <div class="p-8 flex flex-col flex-1 text-center w-full">
                            <h3 class="text-2xl font-bold mb-3 text-white">{{ $service->title }}</h3>
                            <p class="text-gray-400 text-base leading-relaxed mb-8 flex-1 group-hover:text-gray-300 transition-colors">{{ Str::limit($service->description, 90) }}</p>
                            @if($service->link)
                                <a href="{{ $service->link }}" target="_blank" class="mt-auto block w-full bg-purple-900/30 border border-purple-700/50 text-cyan-300 font-bold py-3 px-6 rounded-xl hover:bg-cyan-600 hover:text-white hover:border-cyan-500 transition duration-300 shadow-md">
                                    استكشف المزيد
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center w-full text-gray-500">لا توجد خدمات متوفرة حالياً ....</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="products" class="py-24 deep-space-bg overflow-hidden border-t border-white/5 relative" data-animate>
        <div class="container mx-auto px-4 mb-16 relative z-10">
            <h2 class="text-4xl font-bold text-center text-white drop-shadow-lg">منتجاتنا الرائدة</h2>
        </div>
        <div class="w-full overflow-hidden relative z-10" dir="ltr">
            <div class="flex gap-8 px-4 py-8 carousel-container overflow-x-auto hide-scrollbar snap-x snap-mandatory" dir="rtl">
                @forelse($products as $product)
                    <div class="w-[85vw] sm:w-[22rem] shrink-0 snap-start bg-[#0f172a]/80 backdrop-blur-md border border-purple-500/20 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] hover:shadow-[0_0_25px_rgba(239,68,68,0.15)] hover:border-red-400/50 transition duration-500 flex flex-col items-center group pt-8 relative overflow-hidden">
                        <div class="absolute top-0 w-full h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="h-32 w-32 bg-[#1e1a3b] rounded-full flex items-center justify-center p-2 border-2 border-purple-500/30 group-hover:border-red-400/80 transition duration-500 shadow-[0_0_15px_rgba(168,85,247,0.2)] overflow-hidden relative z-10">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-full group-hover:scale-110 transition duration-500">
                            @else
                                <span class="text-5xl opacity-80 group-hover:scale-110 transition-transform">📦</span>
                            @endif
                        </div>
                        <div class="p-8 flex flex-col flex-1 text-center w-full">
                            <h3 class="text-2xl font-bold mb-3 text-white">{{ $product->name }}</h3>
                            <p class="text-gray-400 text-base leading-relaxed mb-8 flex-1 group-hover:text-gray-300 transition-colors">{{ Str::limit($product->description, 90) }}</p>
                            @if($product->link)
                                <a href="{{ $product->link }}" target="_blank" class="mt-auto block w-full bg-red-900/20 border border-red-900/50 text-red-400 font-bold py-3 px-6 rounded-xl hover:bg-red-600 hover:text-white hover:border-red-500 transition duration-300 shadow-md">
                                    تفاصيل المنتج
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center w-full text-gray-500">جاري إضافة المنتجات...</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="partners" class="py-16 nebula-bg shadow-inner overflow-hidden border-t border-white/5 relative" data-animate>
        <div class="container mx-auto px-4 text-center mb-10 relative z-10">
            <h2 class="text-3xl font-bold text-white relative inline-block">شركائنا في المجرة<span class="absolute bottom-0 right-0 h-1 w-20 bg-purple-500 rounded-full transform translate-y-2 shadow-[0_0_10px_rgba(168,85,247,0.8)]"></span></h2>
        </div>
        <div class="w-full overflow-hidden relative z-10" dir="ltr">
            <div class="flex items-center gap-8 px-4 py-8 carousel-container overflow-x-auto hide-scrollbar snap-x snap-mandatory" dir="rtl">
                @forelse($partners as $partner)
                    <div class="w-[85vw] sm:w-72 shrink-0 snap-start bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl shadow-lg hover:bg-white/10 hover:border-purple-400/50 transition duration-300 flex flex-col items-center group pt-8 pb-8">
                        <div class="h-32 w-32 bg-white/90 rounded-full flex items-center justify-center p-3 border-2 border-transparent group-hover:border-cyan-400/50 transition duration-500 shadow-[0_0_20px_rgba(255,255,255,0.1)] overflow-hidden relative z-10">
                            @if($partner->logo)
                                <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-full object-contain rounded-full group-hover:scale-105 transition duration-500 filter contrast-125">
                            @else
                                <div class="w-full h-full rounded-full flex items-center justify-center">🤝</div>
                            @endif
                        </div>
                        <div class="pt-6 flex flex-col items-center text-center w-full px-4">
                            <h4 class="text-xl font-bold text-gray-200 group-hover:text-cyan-300 transition duration-300">{{ $partner->name }}</h4>
                        </div>
                    </div>
                @empty
                    <p class="text-center w-full text-gray-500">جاري تحديث قائمة الشركاء...</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="contact" class="py-24 deep-space-bg relative overflow-hidden border-t border-white/5" data-animate>
        <div class="absolute right-0 bottom-0 w-96 h-96 bg-red-900/20 rounded-full blur-[120px] pointer-events-none z-0"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white relative inline-block">أرسل إشارتك<span class="absolute bottom-0 right-0 h-1 w-20 bg-red-500 rounded-full transform translate-y-2 shadow-[0_0_10px_rgba(239,68,68,0.8)]"></span></h2>
                <p class="text-purple-200 mt-6 text-lg max-w-2xl mx-auto opacity-80">هل أنت مستعد للانطلاق؟ نحن هنا لاستقبال رسائلك والبدء في بناء مستقبلك الرقمي.</p>
            </div>

            <div class="max-w-6xl mx-auto bg-[#0f172a] rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.5)] overflow-hidden flex flex-col md:flex-row border border-purple-500/20">
                <div class="md:w-2/5 bg-gradient-to-br from-[#16123D] to-[#0a0f25] text-white p-10 flex flex-col justify-center relative overflow-hidden border-l border-purple-500/20">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-purple-600 rounded-full opacity-20 filter blur-2xl"></div>
                    <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-cyan-600 rounded-full opacity-20 filter blur-2xl"></div>

                    <h3 class="text-2xl font-bold mb-8 relative z-10 text-cyan-300">إحداثيات الاتصال</h3>
                    <div class="space-y-8 relative z-10">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/5 border border-white/10 text-cyan-400 rounded-full flex items-center justify-center text-xl shrink-0 shadow-inner">📍</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1 text-gray-200">المقر الرئيسي</h4>
                                <p class="text-gray-400 leading-relaxed">{{ $settings['contact_address'] ?? 'المملكة العربية السعودية، الرياض' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/5 border border-white/10 text-cyan-400 rounded-full flex items-center justify-center text-xl shrink-0 shadow-inner">📞</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1 text-gray-200">خط الاتصال</h4>
                                <p class="text-gray-400" dir="ltr">{{ $settings['contact_phone'] ?? '+966 5X XXX XXXX' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/5 border border-white/10 text-cyan-400 rounded-full flex items-center justify-center text-xl shrink-0 shadow-inner">✉️</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1 text-gray-200">البريد الفضائي</h4>
                                <p class="text-gray-400">{{ $settings['contact_email'] ?? 'info@it-martians.com' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:w-3/5 p-10 bg-[#0B0C10]">
                    @if(session('success'))
                        <div class="bg-cyan-900/30 border border-cyan-500/50 text-cyan-300 px-4 py-3 rounded-xl mb-6 font-semibold text-center shadow-[0_0_15px_rgba(34,211,238,0.2)]">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{route('contact_messages.store')}}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-300 font-semibold mb-2" for="name">الاسم</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 rounded-xl border @error('name') border-red-500 @else border-slate-700 @enderror bg-[#1e293b] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition" placeholder="اسمك">
                            </div>
                            <div>
                                <label class="block text-gray-300 font-semibold mb-2" for="phone">رقم الجوال</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 rounded-xl border @error('phone') border-red-500 @else border-slate-700 @enderror bg-[#1e293b] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition" placeholder="مثال: 05XXXXXXXX" dir="rtl">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-300 font-semibold mb-2" for="email">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl border @error('email') border-red-500 @else border-slate-700 @enderror bg-[#1e293b] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition" placeholder="example@domain.com" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-gray-300 font-semibold mb-2" for="subject">الموضوع</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="w-full px-4 py-3 rounded-xl border @error('subject') border-red-500 @else border-slate-700 @enderror bg-[#1e293b] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition" placeholder="عنوان إشارتك">
                        </div>
                        <div>
                            <label class="block text-gray-300 font-semibold mb-2" for="content">الرسالة</label>
                            <textarea id="content" name="content" rows="4" class="w-full px-4 py-3 rounded-xl border @error('content') border-red-500 @else border-slate-700 @enderror bg-[#1e293b] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition resize-none" placeholder="اكتب تفاصيل طلبك هنا..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-purple-600 text-white font-bold text-lg py-4 rounded-xl hover:from-red-600 hover:to-purple-700 transition duration-300 shadow-[0_4px_15px_rgba(239,68,68,0.4)] transform hover:-translate-y-1">إرسال 🚀</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if(window.particlesJS) {
                particlesJS("particles-js", {
                    "particles": {
                        "number": {
                            "value": 70,
                            "density": { "enable": true, "value_area": 800 }
                        },
                        "color": {
                            "value": ["#ffffff", "#22d3ee", "#a855f7"]
                        },
                        "shape": { "type": "circle" },
                        "opacity": {
                            "value": 0.6,
                            "random": true,
                            "anim": { "enable": true, "speed": 1, "opacity_min": 0.1, "sync": false }
                        },
                        "size": {
                            "value": 3,
                            "random": true,
                            "anim": { "enable": true, "speed": 2, "size_min": 0.1, "sync": false }
                        },
                        "line_linked": {
                            "enable": true,
                            "distance": 150,
                            "color": "#22d3ee",
                            "opacity": 0.2,
                            "width": 1
                        },
                        "move": {
                            "enable": true,
                            "speed": 1.5,
                            "direction": "none",
                            "random": true,
                            "straight": false,
                            "out_mode": "out",
                            "bounce": false
                        }
                    },
                    "interactivity": {
                        "detect_on": "canvas",
                        "events": {
                            "onhover": { "enable": false },
                            "onclick": { "enable": false },
                            "resize": true
                        }
                    },
                    "retina_detect": true
                });
            }

            const carousels = document.querySelectorAll('.carousel-container');
            carousels.forEach(carousel => {
                setInterval(() => {
                    if (carousel.matches(':hover')) return;

                    const maxScroll = carousel.scrollWidth - carousel.clientWidth;
                    const currentScroll = Math.abs(carousel.scrollLeft);

                    if (currentScroll >= maxScroll - 10) {
                        carousel.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        carousel.scrollBy({ left: -carousel.clientWidth, behavior: 'smooth' });
                    }
                }, 4000);
            });
        });
    </script>
@endsection
