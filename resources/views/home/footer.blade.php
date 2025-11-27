<!-- Modern Footer with Gradient Background -->
<footer class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white overflow-hidden">
    
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-primary-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent-500 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            
            <!-- Brand Section -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="bg-gradient-to-br from-primary-500 to-accent-600 p-2.5 rounded-xl shadow-lg">
                        <i class="ri-book-open-line text-white text-2xl"></i>
                    </div>
                    <span class="text-2xl font-display font-bold">BookStore</span>
                </div>
                <p class="text-slate-400 leading-relaxed">
                    Your ultimate destination for discovering amazing books. Empowering readers since 2025.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 backdrop-blur-sm flex items-center justify-center transition-all hover:scale-110 group">
                        <i class="ri-facebook-fill text-xl group-hover:text-primary-400 transition-colors"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 backdrop-blur-sm flex items-center justify-center transition-all hover:scale-110 group">
                        <i class="ri-instagram-line text-xl group-hover:text-pink-400 transition-colors"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 backdrop-blur-sm flex items-center justify-center transition-all hover:scale-110 group">
                        <i class="ri-twitter-x-line text-xl group-hover:text-sky-400 transition-colors"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 backdrop-blur-sm flex items-center justify-center transition-all hover:scale-110 group">
                        <i class="ri-youtube-line text-xl group-hover:text-red-400 transition-colors"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-display font-bold mb-4 flex items-center gap-2">
                    <i class="ri-links-line text-primary-400"></i>
                    Quick Links
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="ri-arrow-right-s-line text-primary-400 group-hover:translate-x-1 transition-transform"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="ri-arrow-right-s-line text-primary-400 group-hover:translate-x-1 transition-transform"></i>
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="ri-arrow-right-s-line text-primary-400 group-hover:translate-x-1 transition-transform"></i>
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/show_cart') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="ri-arrow-right-s-line text-primary-400 group-hover:translate-x-1 transition-transform"></i>
                            Shopping Cart
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h3 class="text-lg font-display font-bold mb-4 flex items-center gap-2">
                    <i class="ri-book-2-line text-accent-400"></i>
                    Categories
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="ri-arrow-right-s-line text-accent-400 group-hover:translate-x-1 transition-transform"></i>
                            Fiction
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="ri-arrow-right-s-line text-accent-400 group-hover:translate-x-1 transition-transform"></i>
                            Non-Fiction
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="ri-arrow-right-s-line text-accent-400 group-hover:translate-x-1 transition-transform"></i>
                            Science & Tech
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="ri-arrow-right-s-line text-accent-400 group-hover:translate-x-1 transition-transform"></i>
                            Self-Help
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-display font-bold mb-4 flex items-center gap-2">
                    <i class="ri-customer-service-2-line text-emerald-400"></i>
                    Get In Touch
                </h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i class="ri-map-pin-line text-emerald-400 mt-1"></i>
                        <span class="text-slate-400">Gaindakot, Nepal</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="ri-phone-line text-emerald-400 mt-1"></i>
                        <a href="tel:+9779800000000" class="text-slate-400 hover:text-white transition-colors">
                            +977 9800000000
                        </a>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="ri-mail-line text-emerald-400 mt-1"></i>
                        <a href="mailto:santroz260@gmail.com" class="text-slate-400 hover:text-white transition-colors">
                            santroz260@gmail.com
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-400 text-sm text-center md:text-left">
                    &copy; 2025 <span class="text-white font-semibold">BookStore</span>. All rights reserved.
                </p>
                <div class="flex items-center gap-6 text-sm text-slate-400">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <span class="text-slate-600">•</span>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    <span class="text-slate-600">•</span>
                    <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scroll-to-top" class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-r from-primary-500 to-accent-500 text-white rounded-full shadow-2xl hover:shadow-primary-500/50 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-0 pointer-events-none z-50">
        <i class="ri-arrow-up-line text-xl"></i>
    </button>
</footer>

<script>
    // Scroll to top functionality
    const scrollBtn = document.getElementById('scroll-to-top');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollBtn.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            scrollBtn.classList.add('opacity-0', 'pointer-events-none');
        }
    });
    
    scrollBtn?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
