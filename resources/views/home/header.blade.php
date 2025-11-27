<!-- Modern Header with Glassmorphism -->
<header class="sticky top-0 z-50 backdrop-blur-xl bg-white/80 border-b border-slate-200/50 shadow-sm">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-primary-500 to-accent-500 rounded-xl blur-lg opacity-50 group-hover:opacity-75 transition-opacity">
                    </div>
                    <div class="relative bg-gradient-to-br from-primary-500 to-accent-600 p-2.5 rounded-xl shadow-lg">
                        <i class="ri-book-open-line text-white text-2xl"></i>
                    </div>
                </div>
                <div class="hidden sm:block">
                    <span
                        class="text-xl font-display font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">BookStore</span>
                    <p class="text-xs text-slate-500 -mt-0.5">Your Gateway to Knowledge</p>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ url('/') }}"
                    class="px-4 py-2 text-slate-700 hover:text-primary-600 font-medium rounded-lg hover:bg-slate-100/80 transition-all duration-200 flex items-center gap-2">
                    <i class="ri-home-5-line"></i>
                    Home
                </a>
                <a href="{{ url('/contact') }}"
                    class="px-4 py-2 text-slate-700 hover:text-primary-600 font-medium rounded-lg hover:bg-slate-100/80 transition-all duration-200 flex items-center gap-2">
                    <i class="ri-mail-line"></i>
                    Contact
                </a>

                {{-- <a href="{{ url('/show_cart') }}"
                    class="px-4 py-2 text-slate-700 hover:text-primary-600 font-medium rounded-lg hover:bg-slate-100/80 transition-all duration-200 flex items-center gap-2 relative">
                    <i class="ri-shopping-cart-line"></i>
                    Cart
                    <span
                        class="absolute -top-1 -right-1 w-5 h-5 bg-gradient-to-r from-pink-500 to-rose-500 text-white text-xs rounded-full flex items-center justify-center font-bold shadow-lg">
                        0
                    </span>
                </a> --}}

                {{-- //new add for cart --}}
                <a href="{{ url('show_cart') }}" class="relative inline-flex items-center">
                    <i class="ri-shopping-cart-2-line text-2xl"></i>

                    @if($cart_count > 0)
                        <span
                            class="absolute -top-2 -right-2 bg-primary-600 text-white text-xs font-bold px-2 py-0.5 rounded-full animate-pulse">
                            {{ $cart_count }}
                        </span>
                    @endif
                </a>
                {{-- //end new add for cart --}}


                <a href="{{ url('/show_order') }}"
                    class="px-4 py-2 text-slate-700 hover:text-primary-600 font-medium rounded-lg hover:bg-slate-100/80 transition-all duration-200 flex items-center gap-2">
                    <i class="ri-box-3-line"></i>
                    Orders
                </a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden lg:flex items-center gap-3">
                @if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="px-5 py-2.5 bg-gradient-to-r from-rose-500 to-pink-600 hover:from-rose-600 hover:to-pink-700 text-white font-semibold rounded-xl shadow-lg shadow-rose-500/30 hover:shadow-rose-500/50 transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                                <i class="ri-logout-box-r-line"></i>
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-5 py-2.5 text-slate-700 hover:text-primary-600 font-semibold rounded-xl hover:bg-slate-100 transition-all duration-200 flex items-center gap-2">
                            <i class="ri-login-box-line"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-5 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold rounded-xl shadow-lg shadow-primary-500/30 hover:shadow-primary-500/50 transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                            <i class="ri-user-add-line"></i>
                            Register
                        </a>
                    @endauth
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn"
                class="lg:hidden p-2 text-slate-700 hover:text-primary-600 hover:bg-slate-100 rounded-lg transition-colors">
                <i class="ri-menu-line text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200/50 py-4">
            <div class="flex flex-col gap-2">
                <a href="{{ url('/') }}"
                    class="px-4 py-3 text-slate-700 hover:text-primary-600 hover:bg-slate-100/80 rounded-lg font-medium transition-all flex items-center gap-3">
                    <i class="ri-home-5-line text-xl"></i>
                    Home
                </a>
                <a href="{{ url('/contact') }}"
                    class="px-4 py-3 text-slate-700 hover:text-primary-600 hover:bg-slate-100/80 rounded-lg font-medium transition-all flex items-center gap-3">
                    <i class="ri-mail-line text-xl"></i>
                    Contact
                </a>
                <a href="{{ url('/show_cart') }}"
                    class="px-4 py-3 text-slate-700 hover:text-primary-600 hover:bg-slate-100/80 rounded-lg font-medium transition-all flex items-center gap-3">
                    <i class="ri-shopping-cart-line text-xl"></i>
                    Cart
                </a>
                <a href="{{ url('/show_order') }}"
                    class="px-4 py-3 text-slate-700 hover:text-primary-600 hover:bg-slate-100/80 rounded-lg font-medium transition-all flex items-center gap-3">
                    <i class="ri-box-3-line text-xl"></i>
                    Orders
                </a>

                <div class="border-t border-slate-200/50 my-2"></div>

                @if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full px-4 py-3 bg-gradient-to-r from-rose-500 to-pink-600 text-white font-semibold rounded-lg shadow-lg flex items-center justify-center gap-3">
                                <i class="ri-logout-box-r-line text-xl"></i>
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-3 text-primary-600 hover:bg-primary-50 rounded-lg font-semibold transition-all flex items-center gap-3">
                            <i class="ri-login-box-line text-xl"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-semibold rounded-lg shadow-lg flex items-center justify-center gap-3">
                            <i class="ri-user-add-line text-xl"></i>
                            Register
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>