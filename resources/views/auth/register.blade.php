<x-guest-layout>
    <div class="min-h-screen bg-slate-50 flex items-center py-16">
        <div class="max-w-2xl mx-auto w-full px-4">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
                <h2 class="text-3xl font-display font-bold text-slate-900 mb-2 flex items-center gap-3">
                    <i class="ri-user-add-line text-primary-600"></i>
                    Create Your Account
                </h2>
                <p class="text-slate-600 mb-6">Create an account to start shopping.</p>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Name</label>
                            <input id="name" name="name" type="text" required value="{{ old('name') }}"
                                   class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                            @error('name') <p class="text-rose-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email (Only Gmail allowed)</label>
                            <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                   class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                            @error('email') <p class="text-rose-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">Phone (10 digits)</label>
                            <input id="phone" name="phone" type="text" required value="{{ old('phone') }}"
                                   class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                            @error('phone') <p class="text-rose-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-slate-700 mb-1">Address</label>
                            <input id="address" name="address" type="text" required value="{{ old('address') }}"
                                   class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                            @error('address') <p class="text-rose-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password (Min 8 characters)</label>
                            <input id="password" name="password" type="password" required
                                   class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                            @error('password') <p class="text-rose-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                   class="block w-full rounded-lg border border-slate-200 px-4 py-3 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <div class="mt-6 flex items-center gap-3">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-bold rounded-xl shadow-md hover:scale-[1.02] transition transform">
                            <i class="ri-user-add-line"></i>
                            Register
                        </button>

                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-4 py-3 bg-slate-100 text-slate-700 rounded-xl hover:bg-slate-200 transition">
                            <i class="ri-arrow-left-line"></i>
                            Already registered? Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
