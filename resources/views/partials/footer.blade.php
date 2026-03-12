<footer class="bg-[#050B14] text-white pt-16 pb-8 border-t border-purple-500/20 relative overflow-hidden">
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[500px] h-32 bg-cyan-600/10 blur-[100px] pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-12 text-center md:text-right">

            <div>
                <h3 class="text-2xl font-black mb-4 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 drop-shadow-md">
                    IT Martians
                </h3>
                <p class="text-gray-400 leading-relaxed">
                    نقدم لك الحلول التقنية المبتكرة التي تحتاجها للارتقاء بأعمالك، ونأخذ مؤسستك إلى مجرة أخرى من التطور الرقمي.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-bold mb-4 text-cyan-300">روابط سريعة</h3>
                <ul class="space-y-3 text-gray-400">
                    <li><a href="#about" class="hover:text-cyan-400 hover:-translate-x-1 inline-block transition-all duration-300">عن الشركة</a></li>
                    <li><a href="#services" class="hover:text-cyan-400 hover:-translate-x-1 inline-block transition-all duration-300">خدماتنا</a></li>
                    <li><a href="#products" class="hover:text-cyan-400 hover:-translate-x-1 inline-block transition-all duration-300">منتجاتنا</a></li>
                    <li><a href="#contact" class="hover:text-cyan-400 hover:-translate-x-1 inline-block transition-all duration-300">تواصل معنا</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-bold mb-4 text-cyan-300">إشاراتنا في المجرة</h3>
                <div class="flex justify-center md:justify-start gap-4">
                    <a href="{{ $settings['social_twitter'] ?? '#' }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-300 hover:bg-cyan-500/20 hover:border-cyan-400 hover:text-cyan-300 transition-all duration-300 hover:shadow-[0_0_15px_rgba(34,211,238,0.4)]">
                        𝕏
                    </a>
                    <a href="{{ $settings['social_linkedin'] ?? '#' }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-300 hover:bg-cyan-500/20 hover:border-cyan-400 hover:text-cyan-300 transition-all duration-300 hover:shadow-[0_0_15px_rgba(34,211,238,0.4)]">
                        in
                    </a>
                    <a href="{{ $settings['social_facebook'] ?? '#' }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-300 hover:bg-cyan-500/20 hover:border-cyan-400 hover:text-cyan-300 transition-all duration-300 hover:shadow-[0_0_15px_rgba(34,211,238,0.4)]">
                        f
                    </a>
                </div>
            </div>

        </div>

        <div class="text-center text-gray-500 border-t border-purple-900/30 pt-8 mt-8">
            <p>جميع الحقوق محفوظة &copy; {{ date('Y') }} لـ IT Martians 🛸</p>
        </div>
    </div>
</footer>
