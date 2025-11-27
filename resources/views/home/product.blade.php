<!-- Modern Products Section -->
<section id="products" class="py-20 bg-gradient-to-b from-white to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 text-primary-700 text-sm font-semibold mb-4">
                <i class="ri-book-3-line"></i>
                Featured Collection
            </span>
            <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-4">
                Discover Our <span class="bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">Amazing Books</span>
            </h2>
            <p class="text-slate-600 text-lg max-w-2xl mx-auto mb-8">
                Browse through our curated collection of bestsellers, classics, and hidden gems
            </p>

            <!-- Modern Search Bar -->
            <form action="{{ url('search_product') }}" method="GET" class="max-w-2xl mx-auto">
                @csrf
                <div class="relative">
                    <i class="ri-search-line absolute left-6 top-1/2 transform -translate-y-1/2 text-slate-400 text-xl"></i>
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search for your favorite books, authors, or genres..."
                        class="w-full pl-14 pr-32 py-4 rounded-2xl border-2 border-slate-200 focus:border-primary-500 focus:ring-4 focus:ring-primary-100 outline-none transition-all duration-300 text-slate-700 placeholder:text-slate-400"
                    >
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 px-6 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold rounded-xl shadow-lg shadow-primary-500/30 transition-all duration-300 hover:scale-105">
                        Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Success Message -->
        @if(session()->has('message'))
            <div id="success-alert" class="max-w-md mx-auto mb-8 bg-gradient-to-r from-emerald-500 to-green-600 text-white px-6 py-4 rounded-2xl shadow-2xl shadow-emerald-500/30 flex items-center gap-4 animate-slide-up">
                <i class="ri-checkbox-circle-fill text-3xl"></i>
                <p class="font-semibold flex-grow">{{ session()->get('message') }}</p>
                <button onclick="this.parentElement.remove()" class="hover:bg-white/20 rounded-lg p-1 transition-colors">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>

            <script>
                setTimeout(function(){
                    const alertEl = document.getElementById('success-alert');
                    if (alertEl) {
                        alertEl.style.transition = 'all 0.5s ease';
                        alertEl.style.opacity = '0';
                        alertEl.style.transform = 'translateY(-20px)';
                        setTimeout(() => alertEl.remove(), 500);
                    }
                }, 3500);
            </script>
        @endif


        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div class="group bg-white rounded-2xl shadow-lg shadow-slate-200/50 overflow-hidden border border-slate-100 hover:border-primary-200 transition-all duration-500 hover:shadow-2xl hover:shadow-primary-500/20 hover:-translate-y-2">
                    
                    <!-- Image Container -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-slate-50 to-slate-100 aspect-[3/4]">
                        <img 
                            src="/productimage/{{ $product->image }}" 
                            alt="{{ $product->title }}"
                            class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                        >
                        
                        <!-- Discount Badge -->
                        @if ($product->discount_price != null)
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-rose-500 to-pink-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg animate-pulse">
                                {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF
                            </div>
                        @endif

                        <!-- Quick View Button -->
                        <a href="{{ url('product.details', $product->id) }}" class="absolute inset-x-4 bottom-4 bg-white/95 backdrop-blur-sm text-slate-900 py-3 rounded-xl font-semibold text-center opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300 shadow-xl border border-slate-200 hover:bg-slate-50 flex items-center justify-center gap-2">
                            <i class="ri-eye-line"></i>
                            Quick View
                        </a>
                    </div>

                    <!-- Product Info -->
                    <div class="p-5">
                        <!-- Title -->
                        <h3 class="font-display font-bold text-slate-900 text-lg mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                            {{ $product->title }}
                        </h3>

                        <!-- Category -->
                        <p class="text-sm text-slate-500 mb-3 flex items-center gap-1">
                            <i class="ri-bookmark-line"></i>
                            {{ $product->category ?? 'General' }}
                        </p>

                        <!-- Price -->
                        <div class="flex items-center gap-3 mb-4">
                            @if ($product->discount_price != null)
                                <span class="text-2xl font-bold text-emerald-600">
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

                        <!-- Add to Cart Form -->
                        <form action="{{ url('add_cart', $product->id) }}" method="POST" class="space-y-3">
                            @csrf
                            
                            <!-- Quantity Input -->
                            <div class="flex items-center gap-2 bg-slate-50 rounded-xl p-2 border border-slate-200">
                                <i class="ri-shopping-cart-line text-slate-500 ml-2"></i>
                                <input 
                                    type="number" 
                                    name="quantity" 
                                    value="1" 
                                    min="1"
                                    class="flex-grow bg-transparent border-none outline-none px-2 py-1 font-semibold text-slate-700"
                                >
                                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg shadow-primary-500/30">
                                    Add
                                </button>
                            </div>
                        </form>

                        <!-- View Details Link -->
                        <a href="{{ url('product.details', $product->id) }}" class="block text-center mt-3 text-primary-600 hover:text-primary-700 font-semibold text-sm flex items-center justify-center gap-1 group/link">
                            View Full Details
                            <i class="ri-arrow-right-line group-hover/link:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-16 flex justify-center">
            <div class="inline-flex items-center gap-2 bg-white rounded-2xl shadow-lg p-2 border border-slate-200">
                {!! $products->withQueryString()->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>
</section>
