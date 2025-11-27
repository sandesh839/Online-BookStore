<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart | Online Bookstore</title>

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

    <!-- Cart Section -->
    <section class="py-16 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Page Header -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ url('/') }}" class="text-slate-500 hover:text-primary-600 transition-colors">
                        <i class="ri-home-line"></i> Home
                    </a>
                    <i class="ri-arrow-right-s-line text-slate-400"></i>
                    <span class="text-slate-900 font-semibold">Shopping Cart</span>
                </div>
                <h1 class="text-4xl font-display font-bold text-slate-900 mb-2 flex items-center gap-3">
                    <i class="ri-shopping-cart-2-line text-primary-600"></i>
                    Your Shopping Cart
                </h1>
                <p class="text-slate-600">Review your items before checkout</p>
            </div>

            <!-- Success Message -->
            @if(session()->has('message'))
                <div id="success-alert" class="max-w-4xl mx-auto mb-8 bg-gradient-to-r from-emerald-500 to-green-600 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-4">
                    <i class="ri-checkbox-circle-fill text-3xl"></i>
                    <p class="font-semibold flex-grow">{{ session()->get('message') }}</p>
                    <button onclick="this.parentElement.remove()" class="hover:bg-white/20 rounded-lg p-1">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
                <script>
                    setTimeout(() => {
                        const alert = document.getElementById('success-alert');
                        if (alert) {
                            alert.style.transition = 'all 0.5s ease';
                            alert.style.opacity = '0';
                            alert.style.transform = 'translateY(-20px)';
                            setTimeout(() => alert.remove(), 500);
                        }
                    }, 3500);
                </script>
            @endif

            @if($cart->count() > 0)
                <div class="grid lg:grid-cols-3 gap-8">
                    
                    <!-- Cart Items -->
                    <div class="lg:col-span-2 space-y-4">
                        <?php $totalprice = 0; ?>
                        
                        @foreach($cart as $item)
                            <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 p-6 border border-slate-100 hover:border-primary-200 transition-all">
                                <div class="flex gap-6">
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0">
                                        <div class="w-24 h-32 rounded-xl overflow-hidden bg-slate-100 shadow-md">
                                            <img src="/productimage/{{ $item->image }}" alt="{{ $item->product_title }}" class="w-full h-full object-contain p-2">
                                        </div>
                                    </div>

                                    <!-- Product Details -->
                                    <div class="flex-grow">
                                        <h3 class="font-display font-bold text-lg text-slate-900 mb-2">{{ $item->product_title }}</h3>
                                        
                                        <div class="flex items-center gap-4 mb-3">
                                            <div class="flex items-center gap-2 text-slate-600">
                                                <i class="ri-stack-line"></i>
                                                <span class="text-sm">Qty: <strong>{{ $item->quantity }}</strong></span>
                                            </div>
                                            <div class="text-2xl font-bold text-primary-600">
                                                ${{ $item->price }}
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <button onclick="return confirm('Remove this item from cart?') && (window.location='{{ url('remove_cart', $item->id) }}')" class="inline-flex items-center gap-2 px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg font-semibold transition-colors">
                                                <i class="ri-delete-bin-line"></i>
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $totalprice += $item->price; ?>
                        @endforeach
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-2xl shadow-slate-200/50 p-8 border border-slate-100 sticky top-24">
                            <h2 class="text-2xl font-display font-bold text-slate-900 mb-6 flex items-center gap-2">
                                <i class="ri-file-list-3-line text-primary-600"></i>
                                Order Summary
                            </h2>

                            <div class="space-y-4 mb-6">
                                <div class="flex justify-between text-slate-600">
                                    <span>Subtotal</span>
                                    <span class="font-semibold">${{ $totalprice }}</span>
                                </div>
                                <div class="flex justify-between text-slate-600">
                                    <span>Shipping</span>
                                    <span class="font-semibold text-emerald-600">FREE</span>
                                </div>
                                <div class="border-t border-slate-200 pt-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-semibold text-slate-900">Total</span>
                                        <span class="text-3xl font-bold text-primary-600">${{ $totalprice }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <a href="{{ url('cash_order') }}" class="block w-full px-6 py-4 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold rounded-xl shadow-2xl shadow-primary-500/40 hover:shadow-primary-500/60 transition-all duration-300 transform hover:scale-105 text-center flex items-center justify-center gap-2">
                                    <i class="ri-money-dollar-circle-line text-xl"></i>
                                    Cash On Delivery
                                </a>
                                
                                <a href="{{ url('stripe', $totalprice) }}" class="block w-full px-6 py-4 bg-gradient-to-r from-violet-500 to-purple-600 hover:from-violet-600 hover:to-purple-700 text-white font-bold rounded-xl shadow-2xl shadow-violet-500/40 hover:shadow-violet-500/60 transition-all duration-300 transform hover:scale-105 text-center flex items-center justify-center gap-2">
                                    <i class="ri-bank-card-line text-xl"></i>
                                    Pay With Card
                                </a>
                            </div>

                            <div class="mt-6 pt-6 border-t border-slate-200">
                                <div class="flex items-center gap-3 text-sm text-slate-600">
                                    <i class="ri-shield-check-line text-emerald-500 text-xl"></i>
                                    <span>Secure checkout guaranteed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty Cart -->
                <div class="text-center py-20">
                    <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-slate-100 flex items-center justify-center">
                        <i class="ri-shopping-cart-line text-6xl text-slate-400"></i>
                    </div>
                    <h2 class="text-3xl font-display font-bold text-slate-900 mb-4">Your Cart is Empty</h2>
                    <p class="text-slate-600 mb-8">Looks like you haven't added any items to your cart yet</p>
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold rounded-xl shadow-2xl shadow-primary-500/40 transition-all duration-300 transform hover:scale-105">
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