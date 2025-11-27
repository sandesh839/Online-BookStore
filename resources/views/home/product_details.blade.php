<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $products->title }} | Online Bookstore</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#f0f9ff', 500: '#0ea5e9', 600: '#0284c7', 700: '#0369a1' },
                        accent: { 500: '#d946ef', 600: '#c026d3' }
                    }
                }
            }
        }
    </script>

    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    @include('home.header')

    <!-- Product Details Section -->
    <section class="py-16 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Breadcrumb -->
            <div class="flex items-center gap-3 mb-8">
                <a href="{{ url('/') }}" class="text-slate-500 hover:text-primary-600 transition-colors">
                    <i class="ri-home-line"></i> Home
                </a>
                <i class="ri-arrow-right-s-line text-slate-400"></i>
                <a href="{{ url('/') }}#products" class="text-slate-500 hover:text-primary-600 transition-colors">
                    Products
                </a>
                <i class="ri-arrow-right-s-line text-slate-400"></i>
                <span class="text-slate-900 font-semibold truncate max-w-xs">{{ $products->title }}</span>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                
                <!-- Image Gallery -->
                <div class="space-y-6">
                    <div class="relative bg-white rounded-3xl shadow-2xl shadow-slate-200/50 p-8 border border-slate-100">
                        <!-- Discount Badge -->
                        @if ($products->discount_price)
                            <div class="absolute top-6 left-6 z-10 bg-gradient-to-r from-rose-500 to-pink-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-2xl animate-pulse">
                                {{ round((($products->price - $products->discount_price) / $products->price) * 100) }}% OFF
                            </div>
                        @endif

                        <!-- Main Image -->
                        <div class="aspect-[3/4] bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl overflow-hidden">
                            <img src="/productimage/{{ $products->image }}" alt="{{ $products->title }}" class="w-full h-full object-contain p-6">
                        </div>

                        <!-- Stock Badge -->
                        <div class="absolute bottom-6 right-6 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-xl border border-slate-200">
                            <div class="flex items-center gap-2">
                                <i class="ri-stack-line text-emerald-600"></i>
                                <span class="text-sm font-semibold text-slate-700">
                                    {{ $products->quantity }} in stock
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-white rounded-xl p-4 shadow-lg border border-slate-100 text-center">
                            <i class="ri-truck-line text-3xl text-emerald-500 mb-2"></i>
                            <p class="text-xs font-semibold text-slate-700">Free Shipping</p>
                        </div>
                        <div class="bg-white rounded-xl p-4 shadow-lg border border-slate-100 text-center">
                            <i class="ri-arrow-go-back-line text-3xl text-blue-500 mb-2"></i>
                            <p class="text-xs font-semibold text-slate-700">Easy Returns</p>
                        </div>
                        <div class="bg-white rounded-xl p-4 shadow-lg border border-slate-100 text-center">
                            <i class="ri-verified-badge-line text-3xl text-purple-500 mb-2"></i>
                            <p class="text-xs font-semibold text-slate-700">Authentic</p>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <!-- Title & Category -->
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-primary-50 text-primary-700 rounded-full text-sm font-semibold mb-4">
                            <i class="ri-bookmark-line"></i>
                            {{ $products->category }}
                        </div>
                        <h1 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-4 leading-tight">
                            {{ $products->title }}
                        </h1>
                    </div>

                    <!-- Rating (Static for now) -->
                    <div class="flex items-center gap-2">
                        <div class="flex gap-1">
                            @for($i = 0; $i < 5; $i++)
                                <i class="ri-star-fill text-amber-400 text-lg"></i>
                            @endfor
                        </div>
                        <span class="text-sm text-slate-600 font-semibold">(4.8 / 128 reviews)</span>
                    </div>

                    <!-- Price -->
                    <div class="bg-gradient-to-r from-slate-50 to-primary-50 rounded-2xl p-6 border-2 border-primary-100">
                        @if ($products->discount_price)
                            <div class="flex items-baseline gap-4 mb-2">
                                <span class="text-5xl font-bold text-primary-600">
                                    ${{ $products->discount_price }}
                                </span>
                                <span class="text-2xl text-slate-400 line-through">
                                    ${{ $products->price }}
                                </span>
                            </div>
                            <p class="text-emerald-600 font-semibold flex items-center gap-2">
                                <i class="ri-price-tag-3-line"></i>
                                You save ${{ $products->price - $products->discount_price }}
                            </p>
                        @else
                            <span class="text-5xl font-bold text-primary-600">
                                ${{ $products->price }}
                            </span>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
                        <h3 class="font-display font-bold text-xl text-slate-900 mb-3 flex items-center gap-2">
                            <i class="ri-file-text-line text-primary-600"></i>
                            Description
                        </h3>
                        <p class="text-slate-600 leading-relaxed">
                            {{ $products->description }}
                        </p>
                    </div>

                    <!-- Add to Cart Form -->
                    <form action="{{ url('add_cart', $products->id) }}" method="POST" class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
                        @csrf
                        
                        <div class="flex items-center gap-4 mb-4">
                            <label class="font-semibold text-slate-700 flex items-center gap-2">
                                <i class="ri-shopping-cart-line"></i>
                                Quantity:
                            </label>
                            <input 
                                type="number" 
                                name="quantity" 
                                value="1" 
                                min="1"
                                max="{{ $products->quantity }}"
                                class="w-24 px-4 py-3 border-2 border-slate-200 rounded-xl focus:border-primary-500 focus:ring-4 focus:ring-primary-100 outline-none font-semibold text-center"
                            >
                        </div>

                        <button type="submit" class="w-full px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold text-lg rounded-xl shadow-2xl shadow-primary-500/40 hover:shadow-primary-500/60 transition-all duration-300 transform hover:scale-105 flex items-center justify-center gap-3">
                            <i class="ri-shopping-cart-2-line text-2xl"></i>
                            Add to Cart
                        </button>

                        <div class="mt-4 grid grid-cols-2 gap-3">
                            <button type="button" class="px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl transition-colors flex items-center justify-center gap-2">
                                <i class="ri-heart-line"></i>
                                Wishlist
                            </button>
                            <button type="button" class="px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl transition-colors flex items-center justify-center gap-2">
                                <i class="ri-share-line"></i>
                                Share
                            </button>
                        </div>
                    </form>

                    <!-- Additional Info -->
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">
                        <div class="space-y-3 text-sm">
                            <div class="flex items-center gap-3">
                                <i class="ri-shield-check-line text-emerald-600 text-xl"></i>
                                <span class="text-slate-700">Secure payment guaranteed</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="ri-customer-service-2-line text-blue-600 text-xl"></i>
                                <span class="text-slate-700">24/7 customer support</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="ri-medal-line text-amber-600 text-xl"></i>
                                <span class="text-slate-700">100% authentic products</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('home.footer')

</body>
</html>
