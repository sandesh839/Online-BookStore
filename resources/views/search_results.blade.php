<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results | Online Store</title>

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

    <section class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Header -->
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-3">
                    <a href="{{ url('/') }}" class="text-slate-500 hover:text-primary-600 transition-colors">
                        <i class="ri-home-line"></i> Home
                    </a>
                    <i class="ri-arrow-right-s-line text-slate-400"></i>
                    <span class="text-slate-900 font-semibold">Search</span>
                </div>

                <h1 class="text-3xl md:text-4xl font-display font-bold text-slate-900 mb-2 flex items-center gap-3">
                    <i class="ri-search-line text-primary-600"></i>
                    Search Results for: <span class="ml-2 text-primary-600">{{ $query }}</span>
                </h1>
                <p class="text-slate-600">Showing results matching your query</p>
            </div>

            {{-- for sorting algorithm --}}
            @if($products->count() > 0)
                <!-- Sorting Dropdown -->
                <div class="flex justify-between items-center mb-6">
                    <p class="text-slate-600 font-semibold">{{ $products->count() }} results found</p>
                    <form action="{{ route('search') }}" method="GET" class="inline-block">
                        <input type="hidden" name="query" value="{{ $query }}">
                        <div class="relative">
                            <label for="sort" class="text-sm font-semibold text-slate-700 mr-2">Sort by:</label>
                            <select 
                                name="sort" 
                                id="sort"
                                onchange="this.form.submit()"
                                class="px-6 py-3 pr-10 bg-white border-2 border-slate-200 rounded-xl text-slate-700 font-semibold 
                                       focus:border-primary-500 focus:ring-4 focus:ring-primary-100 outline-none 
                                       cursor-pointer hover:border-primary-300 transition-all appearance-none"
                                style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27currentColor%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3e%3cpolyline points=%276 9 12 15 18 9%27%3e%3c/polyline%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 0.5rem center; background-size: 1.5em 1.5em;">
                                <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>💰 Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>💎 Price: High to Low</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>🆕 Newest First</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>🔥 Most Popular</option>
                                <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>👁️ Most Viewed</option>
                                <option value="name_az" {{ request('sort') == 'name_az' ? 'selected' : '' }}>🔤 A to Z</option>
                                <option value="name_za" {{ request('sort') == 'name_za' ? 'selected' : '' }}>🔤 Z to A</option>
                            </select>
                        </div>
                    </form>
                </div>

                {{-- end sorting algorithm --}}
                
                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($products as $product)
                        <div class="group bg-white rounded-2xl shadow-lg shadow-slate-200/50 overflow-hidden border border-slate-100 hover:border-primary-200 transition-all duration-500 hover:shadow-2xl hover:shadow-primary-500/20 hover:-translate-y-2">
                            
                            <!-- Image Container -->
                            <div class="relative overflow-hidden bg-gradient-to-br from-slate-50 to-slate-100 aspect-[3/4]">
                                <a href="{{ url('product.details', $product->id) }}">
                                    <img 
                                        src="/productimage/{{ $product->image }}" 
                                        alt="{{ $product->title }}"
                                        class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                                    >
                                </a>
                                
                                @if($product->discount_price)
                                    <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-pink-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg">
                                        {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <!-- Category Badge -->
                                <span class="inline-block px-3 py-1 bg-primary-50 text-primary-700 text-xs font-semibold rounded-full mb-3">
                                    {{ $product->category }}
                                </span>

                                <!-- Title -->
                                <a href="{{ url('product.details', $product->id) }}">
                                    <h3 class="text-lg font-bold text-slate-900 mb-3 line-clamp-2 min-h-[3.5rem] group-hover:text-primary-600 transition-colors">
                                        {{ $product->title }}
                                    </h3>
                                </a>

                                <!-- Description -->
                                <p class="text-slate-600 text-sm mb-4 line-clamp-2">
                                    {{ Str::limit($product->description, 80) }}
                                </p>

                                <!-- Price -->
                                <div class="flex items-baseline gap-2 mb-4">
                                    @if($product->discount_price)
                                        <span class="text-2xl font-bold text-primary-600">
                                            ${{ $product->discount_price }}
                                        </span>
                                        <span class="text-lg text-slate-400 line-through">
                                            ${{ $product->price }}
                                        </span>
                                    @else
                                        <span class="text-2xl font-bold text-primary-600">
                                            ${{ $product->price }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-2">
                                    <a href="{{ url('add_cart', $product->id) }}" class="flex-1 px-4 py-3 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold rounded-xl shadow-lg shadow-primary-500/30 transition-all duration-300 hover:scale-105 flex items-center justify-center gap-2">
                                        <i class="ri-shopping-cart-line"></i>
                                        Add to Cart
                                    </a>
                                    <a href="{{ url('product.details', $product->id) }}" class="px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl transition-all duration-300 flex items-center justify-center">
                                        <i class="ri-eye-line text-xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if (method_exists($products, 'links'))
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                @endif

            @else
                <!-- No results -->
                <div class="text-center py-20">
                    <div class="w-36 h-36 mx-auto mb-6 rounded-full bg-slate-100 flex items-center justify-center">
                        <i class="ri-search-line text-6xl text-slate-400"></i>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-display font-bold text-slate-900 mb-3">No products found</h2>
                    <p class="text-slate-600 mb-6">
                        We couldn't find any items matching 
                        "<span class="font-semibold text-slate-800">{{ $query }}</span>".  
                        Try a different keyword.
                    </p>
                    <a href="{{ url('/') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-bold rounded-xl shadow-2xl transition-transform hover:scale-105">
                        <i class="ri-arrow-left-line"></i>
                        Continue Shopping
                    </a>
                </div>
            @endif

        </div>
    </section>

    @include('home.footer')

</body>
</html>
