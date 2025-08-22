<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-[#f5f5dc] text-[#4b2e2e] p-6">
        
        <h1 class="text-3xl font-bold mb-6 text-center">
            🌱 Welcome new worm! Find your safe space in the forest of books 🌳
        </h1>

        <form method="POST" action="{{ route('register') }}" class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" class="text-[#4b2e2e]" />
                <x-text-input id="name" 
                    class="block mt-1 w-full border-[#4b2e2e] focus:border-[#4b2e2e] focus:ring-[#4b2e2e]" 
                    type="text" 
                    name="name" 
                    required 
                    autofocus 
                    placeholder="Enter your full name" 
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-[#4b2e2e]" />
                <x-text-input id="email" 
                    class="block mt-1 w-full border-[#4b2e2e] focus:border-[#4b2e2e] focus:ring-[#4b2e2e]" 
                    type="email" 
                    name="email" 
                    required 
                    placeholder="Enter your email address" 
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-[#4b2e2e]" />
                <x-text-input id="password" 
                    class="block mt-1 w-full border-[#4b2e2e] focus:border-[#4b2e2e] focus:ring-[#4b2e2e]" 
                    type="password" 
                    name="password" 
                    required 
                    placeholder="Create a password" 
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-[#4b2e2e]" />
                <x-text-input id="password_confirmation" 
                    class="block mt-1 w-full border-[#4b2e2e] focus:border-[#4b2e2e] focus:ring-[#4b2e2e]" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    placeholder="Confirm your password" 
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="bg-[#4b2e2e] hover:bg-[#3a2323] text-white px-6 py-2 rounded-lg">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

