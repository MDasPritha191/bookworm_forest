

<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center 
                bg-[#f4e8c1] text-[#3c2f2f] p-6">
        
        <h1 class="text-3xl font-bold mb-6 text-center">
            Hey bookworm, it’s been long, welcome to your forest home 🌲📚
        </h1>

        <form method="POST" action="{{ route('login') }}" 
              class="bg-[#faf0d7] rounded-2xl shadow-lg p-8 w-full max-w-md">
            @csrf
            <!-- Email Input -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-[#3c2f2f]" />
            <x-text-input id="email" 
                class="block mt-1 w-full !bg-white !text-[#3c2f2f] border-[#5c4033] 
                    focus:border-[#5c4033] focus:ring-[#5c4033] 
                    focus:ring-opacity-50 rounded-md" 
                style="background-color: white !important; color: #3c2f2f !important; -webkit-text-fill-color: #3c2f2f !important;" 
                type="email" 
                name="email" 
                required 
                autofocus 
                placeholder="Enter your email address" {{-- ADD THIS LINE --}}
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[#8b0000]" />
        </div>

        <!-- Password Input -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-[#3c2f2f]" />
            <x-text-input id="password" 
                class="block mt-1 w-full !bg-white !text-[#3c2f2f] border-[#5c4033] 
                    focus:border-[#5c4033] focus:ring-[#5c4033] 
                    focus:ring-opacity-50 rounded-md" 
                style="background-color: white !important; color: #3c2f2f !important; -webkit-text-fill-color: #3c2f2f !important;" 
                type="password" 
                name="password" 
                required 
                placeholder="Enter your password" {{-- ADD THIS LINE --}}
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[#8b0000]" />
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