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

    <section class="py-16 min-h-screen">
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

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $item)
                        <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100 hover:shadow-2xl transition-all">
                            
                            <!-- CLICK IMAGE TO OPEN DETAILS -->
                            <a href='{{ url("product.details", $item->id) }}' class="block">
                                <div class="w-full h-56 rounded-xl overflow-hidden bg-slate-100 flex items-center justify-center">
                                    <img src='{{ asset("productimage/{$item->image}") }}'
                                         alt="{{ $item->title }}"
                                         class="max-h-full object-contain p-4">
                                </div>

                                <div class="mt-4">
                                    <h3 class="text-lg font-display font-semibold text-slate-900 line-clamp-2">
                                        {{ $item->title }}
                                    </h3>
                                    <p class="mt-2 text-primary-600 font-bold text-xl">
                                        Rs. {{ $item->price }}
                                    </p>
                                </div>
                            </a>

                            <!-- BUTTONS -->
                            <div class="mt-4 flex items-center justify-between gap-2">

                                <!-- View Button -->
                                <a href='{{ url("product.details", $item->id) }}'
                                   class="inline-flex items-center gap-2 px-3 py-2 bg-primary-50 text-primary-700 
                                          rounded-lg font-semibold hover:bg-primary-100 transition-colors">
                                    <i class="ri-eye-line"></i>
                                    View
                                </a>

                                <!-- Add to Cart Button -->
                                <a href='{{ url("add_cart", $item->id) }}'
                                   class="inline-flex items-center gap-2 px-3 py-2 bg-gradient-to-r 
                                          from-primary-500 to-primary-600 text-white rounded-lg font-semibold 
                                          hover:opacity-95 transition">
                                    <i class="ri-shopping-cart-line"></i>
                                    Add to Cart
                                </a>

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
