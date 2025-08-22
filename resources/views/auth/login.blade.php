{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



{{-- <x-guest-layout>

    <div class="min-h-screen flex flex-col items-center justify-center 
                bg-[#f5f5dc] text-[#4b2e2e] p-6">
        
        <h1 class="text-3xl font-bold mb-6 text-center">
            Hey bookworm, it’s been long, welcome to your forest home 🌲📚
        </h1>

       
        <form method="POST" action="{{ route('login') }}" 
              class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
            @csrf

            <!-- Email -->
            <div>
               
                <x-input-label for="email" :value="__('Email')" class="text-[#4b2e2e]" />
                
              
                <x-text-input id="email" 
                    class="block mt-1 w-full border-[#4b2e2e] 
                           focus:border-[#4b2e2e] focus:ring-[#4b2e2e]" 
                    type="email" name="email" required autofocus />
                
                <x-input-error :messages="$errors->get('email')" 
                               class="mt-2 text-red-600" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-[#4b2e2e]" />
                <x-text-input id="password" 
                    class="block mt-1 w-full border-[#4b2e2e] 
                           focus:border-[#4b2e2e] focus:ring-[#4b2e2e]" 
                    type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" 
                               class="mt-2 text-red-600" />
            </div>

            <!-- Login Button -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="bg-[#4b2e2e] hover:bg-[#3a2323] 
                                     text-white px-6 py-2 rounded-lg">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <a href="{{ route('register') }}" 
               class="text-[#4b2e2e] font-semibold underline hover:text-[#3a2323]">
                🌱 New worm in the forest? Find your safe now
            </a>
        </div>
    </div>
</x-guest-layout> --}}










{{-- 
<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center 
                bg-[#f4e8c1] text-[#3c2f2f] p-6">
        
        <h1 class="text-3xl font-bold mb-6 text-center">
            Hey bookworm, it’s been long, welcome to your forest home 🌲📚
        </h1>

        <form method="POST" action="{{ route('login') }}" 
              class="bg-[#faf0d7] rounded-2xl shadow-lg p-8 w-full max-w-md">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-[#3c2f2f]" />
                <x-text-input id="email" 
                    class="block mt-1 w-full border-[#5c4033] 
                           focus:border-[#5c4033] focus:ring-[#5c4033]" 
                    type="email" name="email" required autofocus />
                <x-input-error :messages="$errors->get('email')" 
                               class="mt-2 text-[#8b0000]" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-[#3c2f2f]" />
                <x-text-input id="password" 
                    class="block mt-1 w-full border-[#5c4033] 
                           focus:border-[#5c4033] focus:ring-[#5c4033]" 
                    type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" 
                               class="mt-2 text-[#8b0000]" />
            </div>

            <!-- Login Button -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="bg-[#5c4033] hover:bg-[#4a3226] 
                                     text-white px-6 py-2 rounded-lg">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <a href="{{ route('register') }}" 
               class="text-[#3c2f2f] font-semibold underline hover:text-[#4a3226]">
                🌱 New worm in the forest? Find your safe now
            </a>
        </div>
    </div>
</x-guest-layout> --}}


<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center 
                bg-[#f4e8c1] text-[#3c2f2f] p-6">
        
        <h1 class="text-3xl font-bold mb-6 text-center">
            Hey bookworm, it’s been long, welcome to your forest home 🌲📚
        </h1>

        <form method="POST" action="{{ route('login') }}" 
              class="bg-[#faf0d7] rounded-2xl shadow-lg p-8 w-full max-w-md">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-[#3c2f2f]" />
                <x-text-input id="email" 
                    class="block mt-1 w-full !bg-white !text-[#3c2f2f] border-[#5c4033] 
                           focus:border-[#5c4033] focus:ring-[#5c4033] 
                           focus:ring-opacity-50 rounded-md" 
                    style="background-color: white !important; color: #3c2f2f !important; -webkit-text-fill-color: #3c2f2f !important;" 
                    type="email" name="email" required autofocus />
                <x-input-error :messages="$errors->get('email')" 
                               class="mt-2 text-[#8b0000]" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-[#3c2f2f]" />
                <x-text-input id="password" 
                    class="block mt-1 w-full !bg-white !text-[#3c2f2f] border-[#5c4033] 
                           focus:border-[#5c4033] focus:ring-[#5c4033] 
                           focus:ring-opacity-50 rounded-md" 
                    style="background-color: white !important; color: #3c2f2f !important; -webkit-text-fill-color: #3c2f2f !important;" 
                    type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" 
                               class="mt-2 text-[#8b0000]" />
            </div>

            <!-- Login Button -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="bg-[#5c4033] hover:bg-[#4a3226] 
                                     text-white px-6 py-2 rounded-lg">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <a href="{{ route('register') }}" 
               class="text-[#3c2f2f] font-semibold underline hover:text-[#4a3226]">
                🌱 New worm in the forest? Find your safe now
            </a>
        </div>
    </div>
</x-guest-layout>