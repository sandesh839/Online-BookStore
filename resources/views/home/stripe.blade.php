<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout | Online Bookstore</title>

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
        /* Stripe Elements fallback styling inside Tailwind */
        #card-element { padding: 12px; border-radius: 0.5rem; border: 1px solid #e5e7eb; background: white; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    @include('home.header')

    <main class="py-16 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ url('/') }}" class="text-slate-500 hover:text-primary-600 transition-colors">
                        <i class="ri-home-line"></i> Home
                    </a>
                    <i class="ri-arrow-right-s-line text-slate-400"></i>
                    <span class="text-slate-900 font-semibold">Checkout</span>
                </div>
                <h1 class="text-3xl font-display font-bold text-slate-900 mb-2 flex items-center gap-3">
                    <i class="ri-bank-card-line text-primary-600"></i>
                    Card Payment
                </h1>
                <p class="text-slate-600">Secure payment via Stripe</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Payment Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
                        <h2 class="text-xl font-display font-bold text-slate-900 mb-4">Pay with Card</h2>

                        <div id="payment-message" class="hidden mb-4 px-4 py-3 rounded-lg text-sm"></div>

                        <form id="payment-form" class="space-y-4">
                            @csrf
                            <input type="hidden" id="amount" value="{{ $totalprice }}">

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Card Holder Name</label>
                                <input id="cardholder-name" class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-200" placeholder="John Doe" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Card Details</label>
                                <div id="card-element" class="w-full rounded-lg"></div>
                                <div id="card-errors" class="text-rose-600 text-sm mt-2"></div>
                            </div>

                            <div class="pt-4">
                                <button id="submit-button" class="w-full inline-flex items-center justify-center gap-3 px-6 py-3 bg-gradient-to-r from-violet-500 to-purple-600 hover:from-violet-600 hover:to-purple-700 text-white font-bold rounded-xl shadow-2xl transition-all">
                                    <i class="ri-bank-card-line text-lg"></i>
                                    Pay ${{ $totalprice }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-2xl p-6 border border-slate-100 sticky top-24">
                        <h3 class="text-lg font-display font-bold text-slate-900 mb-4">Order Summary</h3>
                        <div class="text-sm text-slate-600 mb-4">
                            <div class="flex justify-between mb-2">
                                <span>Subtotal</span>
                                <span class="font-semibold">${{ $totalprice }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span>Shipping</span>
                                <span class="font-semibold text-emerald-600">FREE</span>
                            </div>
                            <div class="border-t border-slate-200 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-semibold text-slate-900">Total</span>
                                    <span class="text-2xl font-bold text-primary-600">${{ $totalprice }}</span>
                                </div>
                            </div>
                        </div>

                        <a href="{{ url('cash_order') }}" class="block w-full text-center px-4 py-3 bg-emerald-50 text-emerald-700 rounded-lg font-semibold mb-3 border border-emerald-100">
                            Pay with Cash (Back)
                        </a>

                        <p class="text-xs text-slate-500 mt-3">Your card details are processed securely by Stripe. We do not store card details on our servers.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('home.footer')

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements();
        const card = elements.create("card", { hidePostalCode: true });
        card.mount("#card-element");

        function showMessage(text, type = 'success') {
            const box = document.getElementById('payment-message');
            box.classList.remove('hidden', 'bg-emerald-500', 'bg-rose-500', 'text-white', 'bg-emerald-50', 'text-emerald-800');
            if (type === 'success') {
                box.classList.add('bg-emerald-500', 'text-white');
            } else {
                box.classList.add('bg-rose-500', 'text-white');
            }
            box.textContent = text;
            // auto-hide on success
            if (type === 'success') {
                setTimeout(() => {
                    box.classList.add('hidden');
                }, 3500);
            }
        }

        card.on('change', function(event) {
            const errorDiv = document.getElementById('card-errors');
            if (event.error) {
                errorDiv.textContent = event.error.message;
            } else {
                errorDiv.textContent = '';
            }
        });

        document.getElementById('payment-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const submitBtn = document.getElementById('submit-button');
            submitBtn.disabled = true;
            const initialText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="ri-loader-4-line animate-spin"></i> Processing...';

            const amount = document.getElementById('amount').value;

            // Create PaymentIntent on server
            const resp = await fetch("{{ route('stripe.intent') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ amount: amount })
            });

            const data = await resp.json();

            const result = await stripe.confirmCardPayment(data.clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: document.getElementById('cardholder-name').value
                    }
                }
            });

            if (result.error) {
                showMessage(result.error.message || 'Payment failed', 'error');
            } else if (result.paymentIntent && result.paymentIntent.status === 'succeeded') {
                showMessage('Payment successful! Thank you.', 'success');
                // optional: redirect or call server to finalize order
                // window.location = "{{ url('orders/success') }}";
            }

            submitBtn.disabled = false;
            submitBtn.innerHTML = initialText;
        });
    </script>
</body>
</html>
