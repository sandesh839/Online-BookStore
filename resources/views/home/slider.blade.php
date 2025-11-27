<!-- Modern Hero Section with Animated Gradients -->
<section class="relative min-h-[600px] flex items-center overflow-hidden bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50">
    
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-br from-accent-400 to-purple-600 rounded-full blur-3xl opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-br from-blue-200 to-purple-200 rounded-full blur-3xl opacity-10"></div>
    </div>

    <!-- Floating Book Icons -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <i class="ri-book-2-line absolute top-20 left-10 text-6xl text-primary-400/20 animate-bounce" style="animation-delay: 0.5s;"></i>
        <i class="ri-book-open-line absolute top-40 right-20 text-7xl text-accent-400/20 animate-bounce" style="animation-delay: 1s;"></i>
        <i class="ri-book-3-line absolute bottom-32 left-1/4 text-5xl text-purple-400/20 animate-bounce" style="animation-delay: 1.5s;"></i>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Content -->
            <div class="space-y-8 text-center lg:text-left">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/80 backdrop-blur-sm border border-primary-200 shadow-lg">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-sm font-semibold text-slate-700">Now Available Online</span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-display font-extrabold leading-tight">
                    <span class="block text-slate-900">Discover Your</span>
                    <span class="block bg-gradient-to-r from-primary-600 via-accent-600 to-purple-600 bg-clip-text text-transparent">
                        Next Adventure
                    </span>
                </h1>

                <!-- Description -->
                <p class="text-xl text-slate-600 leading-relaxed max-w-xl">
                    Explore thousands of books across all genres. From timeless classics to latest bestsellers, find your perfect read today.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#products" class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold rounded-xl shadow-2xl shadow-primary-500/40 hover:shadow-primary-500/60 transition-all duration-300 transform hover:scale-105">
                        <i class="ri-shopping-bag-3-line text-xl"></i>
                        Browse Books
                        <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-white hover:bg-slate-50 text-slate-700 font-bold rounded-xl shadow-xl border-2 border-slate-200 hover:border-primary-300 transition-all duration-300 transform hover:scale-105">
                        <i class="ri-customer-service-2-line text-xl"></i>
                        Contact Us
                    </a>
                </div>

                <!-- Features -->
                <div class="grid grid-cols-3 gap-6 pt-8">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 text-white mb-3 shadow-lg">
                            <i class="ri-truck-line text-2xl"></i>
                        </div>
                        <p class="text-sm font-semibold text-slate-700">Free Shipping</p>
                    </div>
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-gradient-to-br from-blue-400 to-blue-600 text-white mb-3 shadow-lg">
                            <i class="ri-shield-check-line text-2xl"></i>
                        </div>
                        <p class="text-sm font-semibold text-slate-700">Secure Payment</p>
                    </div>
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 text-white mb-3 shadow-lg">
                            <i class="ri-customer-service-line text-2xl"></i>
                        </div>
                        <p class="text-sm font-semibold text-slate-700">24/7 Support</p>
                    </div>
                </div>
            </div>

            <!-- Right Image/Illustration -->
            <div class="relative hidden lg:block">
                <div class="relative">
                    <!-- Decorative Elements -->
                    <div class="absolute -inset-4 bg-gradient-to-r from-primary-400 to-accent-500 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>
                    
                    <!-- Main Image Container -->
                    <div class="relative bg-white/50 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/50">
                        <img src="{{ asset('images/book.jpg') }}" alt="Books Collection" class="w-full h-[500px] object-cover rounded-2xl shadow-xl">
                        
                        <!-- Floating Badge -->
                        <div class="absolute -top-6 -right-6 bg-gradient-to-r from-rose-500 to-pink-600 text-white px-6 py-3 rounded-full shadow-2xl animate-bounce">
                            <div class="text-center">
                                <p class="text-2xl font-bold">30%</p>
                                <p class="text-xs font-semibold">OFF</p>
                            </div>
                        </div>

                        <!-- Stats Card -->
                        <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-2xl p-4 border border-slate-100">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-400 to-emerald-600 flex items-center justify-center">
                                    <i class="ri-star-fill text-white text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-slate-900">1000+</p>
                                    <p class="text-xs text-slate-500 font-medium">Books Available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
