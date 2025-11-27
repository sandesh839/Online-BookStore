<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Orders | Online Bookstore</title>

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

    <!-- Orders Section -->
    <section class="py-16 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Page Header -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ url('/') }}" class="text-slate-500 hover:text-primary-600 transition-colors">
                        <i class="ri-home-line"></i> Home
                    </a>
                    <i class="ri-arrow-right-s-line text-slate-400"></i>
                    <span class="text-slate-900 font-semibold">My Orders</span>
                </div>
                <h1 class="text-4xl font-display font-bold text-slate-900 mb-2 flex items-center gap-3">
                    <i class="ri-box-3-line text-primary-600"></i>
                    My Orders
                </h1>
                <p class="text-slate-600">Track and manage your orders</p>
            </div>

            <!-- Success Message -->
            @if(session('message'))
                <div id="success-alert" class="max-w-4xl mx-auto mb-8 bg-gradient-to-r from-emerald-500 to-green-600 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-4">
                    <i class="ri-checkbox-circle-fill text-3xl"></i>
                    <p class="font-semibold flex-grow">{{ session('message') }}</p>
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

            @if($orders->count())
                <div class="space-y-6">
                    @foreach($orders as $order)
                        @php 
                            $ds = strtolower($order->delivery_status); 
                            $ps = strtolower($order->payment_status);
                        @endphp

                        <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                            <div class="p-6">
                                <div class="flex flex-col lg:flex-row gap-6">
                                    
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0">
                                        <div class="w-32 h-40 rounded-xl overflow-hidden bg-slate-100 shadow-md">
                                            <img src="{{ asset('productimage/'.$order->image) }}" alt="{{ $order->product_title }}" class="w-full h-full object-contain p-2">
                                        </div>
                                    </div>

                                    <!-- Order Details -->
                                    <div class="flex-grow space-y-4">
                                        <div class="flex flex-wrap items-start justify-between gap-4">
                                            <div>
                                                <h3 class="text-xl font-display font-bold text-slate-900 mb-2">
                                                    {{ $order->product_title }}
                                                </h3>
                                                <div class="flex flex-wrap gap-4 text-sm text-slate-600">
                                                    <span class="flex items-center gap-1">
                                                        <i class="ri-stack-line"></i>
                                                        Qty: <strong>{{ $order->quantity }}</strong>
                                                    </span>
                                                    <span class="flex items-center gap-1">
                                                        <i class="ri-money-dollar-circle-line"></i>
                                                        Price: <strong>${{ number_format($order->price, 2) }}</strong>
                                                    </span>
                                                    <span class="flex items-center gap-1">
                                                        <i class="ri-calculator-line"></i>
                                                        Total: <strong class="text-primary-600">${{ number_format($order->price * $order->quantity, 2) }}</strong>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Status Badges -->
                                            <div class="flex flex-wrap gap-3">
                                                <!-- Payment Status -->
                                                @if($ps === 'paid')
                                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-500 to-green-600 text-white rounded-full text-sm font-semibold shadow-lg">
                                                        <i class="ri-checkbox-circle-fill"></i>
                                                        Paid
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-amber-400 to-orange-500 text-white rounded-full text-sm font-semibold shadow-lg">
                                                        <i class="ri-time-line"></i>
                                                        {{ ucfirst($order->payment_status) }}
                                                    </span>
                                                @endif

                                                <!-- Delivery Status -->
                                                @if($ds === 'processing')
                                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500 to-cyan-600 text-white rounded-full text-sm font-semibold shadow-lg">
                                                        <i class="ri-loader-4-line animate-spin"></i>
                                                        Processing
                                                    </span>
                                                @elseif($ds === 'delivered')
                                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-full text-sm font-semibold shadow-lg">
                                                        <i class="ri-truck-line"></i>
                                                        Delivered
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-slate-400 to-slate-600 text-white rounded-full text-sm font-semibold shadow-lg">
                                                        <i class="ri-information-line"></i>
                                                        {{ ucfirst($order->delivery_status) }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Order Timeline -->
                                        <div class="bg-gradient-to-r from-slate-50 to-primary-50 rounded-xl p-4 border border-slate-200">
                                            <div class="flex items-center gap-4">
                                                <div class="flex items-center gap-2 flex-1">
                                                    <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white">
                                                        <i class="ri-checkbox-line text-sm"></i>
                                                    </div>
                                                    <span class="text-xs font-semibold text-slate-700">Ordered</span>
                                                </div>
                                                <div class="flex-1 h-1 bg-slate-200 rounded">
                                                    <div class="h-full bg-gradient-to-r from-green-500 to-blue-500 rounded" style="width: {{ $ds === 'processing' ? '50%' : ($ds === 'delivered' ? '100%' : '25%') }}"></div>
                                                </div>
                                                <div class="flex items-center gap-2 flex-1">
                                                    <div class="w-8 h-8 rounded-full {{ $ds === 'processing' || $ds === 'delivered' ? 'bg-blue-500' : 'bg-slate-300' }} flex items-center justify-center text-white">
                                                        <i class="ri-box-3-line text-sm"></i>
                                                    </div>
                                                    <span class="text-xs font-semibold text-slate-700">Processing</span>
                                                </div>
                                                <div class="flex-1 h-1 bg-slate-200 rounded">
                                                    <div class="h-full bg-gradient-to-r from-blue-500 to-green-500 rounded" style="width: {{ $ds === 'delivered' ? '100%' : '0%' }}"></div>
                                                </div>
                                                <div class="flex items-center gap-2 flex-1">
                                                    <div class="w-8 h-8 rounded-full {{ $ds === 'delivered' ? 'bg-green-500' : 'bg-slate-300' }} flex items-center justify-center text-white">
                                                        <i class="ri-truck-line text-sm"></i>
                                                    </div>
                                                    <span class="text-xs font-semibold text-slate-700">Delivered</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex items-center gap-3 pt-2">
                                            @if($ds === 'processing')
                                                <button onclick="return confirm('Are you sure you want to cancel this order?') && (window.location='{{ url('cancel_order', $order->id) }}')" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-rose-500 to-pink-600 hover:from-rose-600 hover:to-pink-700 text-white font-semibold rounded-xl shadow-lg shadow-rose-500/30 hover:shadow-rose-500/50 transition-all duration-300 transform hover:scale-105">
                                                    <i class="ri-close-circle-line"></i>
                                                    Cancel Order
                                                </button>
                                            @else
                                                <span class="text-sm text-slate-500 italic">Cancellation not available</span>
                                            @endif

                                            <button class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl transition-colors">
                                                <i class="ri-customer-service-2-line"></i>
                                                Contact Support
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty Orders -->
                <div class="text-center py-20">
                    <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-slate-100 flex items-center justify-center">
                        <i class="ri-box-3-line text-6xl text-slate-400"></i>
                    </div>
                    <h2 class="text-3xl font-display font-bold text-slate-900 mb-4">No Orders Yet</h2>
                    <p class="text-slate-600 mb-8">Start shopping to see your orders here</p>
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold rounded-xl shadow-2xl shadow-primary-500/40 transition-all duration-300 transform hover:scale-105">
                        <i class="ri-shopping-bag-3-line"></i>
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </section>

    @include('home.footer')

</body>
</html>