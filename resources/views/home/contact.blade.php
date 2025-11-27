<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us | Online Bookstore</title>

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

            <div class="mb-12">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ url('/') }}" class="text-slate-500 hover:text-primary-600 transition-colors">
                        <i class="ri-home-line"></i> Home
                    </a>
                    <i class="ri-arrow-right-s-line text-slate-400"></i>
                    <span class="text-slate-900 font-semibold">Contact Us</span>
                </div>

                <h1 class="text-4xl font-display font-bold text-slate-900 mb-2 flex items-center gap-3">
                    <i class="ri-mail-line text-primary-600"></i>
                    Contact Us
                </h1>
                <p class="text-slate-600">Have a question? Send us a message and we'll get back to you shortly.</p>
            </div>

            @if(session('success'))
                <div id="success-alert" class="max-w-4xl mx-auto mb-8 bg-gradient-to-r from-emerald-500 to-green-600 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-4">
                    <i class="ri-checkbox-circle-fill text-3xl"></i>
                    <p class="font-semibold flex-grow">{{ session('success') }}</p>
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

            @if($errors->any())
                <div class="max-w-4xl mx-auto mb-6">
                    <div class="bg-rose-50 border border-rose-200 text-rose-700 px-6 py-4 rounded-xl">
                        <ul class="list-disc pl-5 space-y-1 mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf

                            <div class="grid sm:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Name</label>
                                    <input id="name" name="name" type="text" required value="{{ old('name') }}" class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                                    <input id="email" name="email" type="email" required value="{{ old('email') }}" class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="subject" class="block text-sm font-medium text-slate-700 mb-1">Subject</label>
                                <input id="subject" name="subject" type="text" value="{{ old('subject') }}" class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                            </div>

                            <div class="mb-6">
                                <label for="message" class="block text-sm font-medium text-slate-700 mb-1">Message</label>
                                <textarea id="message" name="message" rows="6" required class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">{{ old('message') }}</textarea>
                            </div>

                            <div class="flex items-center gap-3">
                                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-bold rounded-xl shadow-md hover:scale-[1.02] transition transform">
                                    <i class="ri-send-plane-line"></i>
                                    Send Message
                                </button>

                                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-4 py-3 bg-slate-100 text-slate-700 rounded-xl hover:bg-slate-200 transition">
                                    <i class="ri-arrow-left-line"></i>
                                    Back to Shop
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-2xl p-6 border border-slate-100 sticky top-24">
                        <h5 class="text-lg font-display font-bold text-slate-900 mb-3">Contact Info</h5>
                        <p class="text-slate-600 mb-2"><strong>Address:</strong> Gaindakot</p>
                        <p class="text-slate-600 mb-2"><strong>Phone:</strong> +977 9877656545</p>
                        <p class="text-slate-600 mb-4"><strong>Email:</strong> santroz260@gmail.com</p>

                        <div class="mt-4">
                            <h6 class="text-sm font-medium text-slate-700 mb-2">Office Hours</h6>
                            <p class="text-sm text-slate-600">Mon - Fri: 9:00 AM - 6:00 PM</p>
                            <p class="text-sm text-slate-600">Sat: 10:00 AM - 4:00 PM</p>
                        </div>

                        <div class="mt-6">
                            <a href="mailto:support@example.com" class="inline-flex items-center gap-2 px-4 py-3 bg-gradient-to-r from-violet-500 to-purple-600 text-white font-semibold rounded-xl">
                                <i class="ri-mail-open-line"></i>
                                Email Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('home.footer')

</body>
</html>