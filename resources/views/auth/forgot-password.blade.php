<x-guest-layout>
    <img src="{{ url('/img/1712070101.png') }}" width="200" alt="">

    <div style="background-color: rgba(255, 255, 255, 0.3)" class="w-[40%] rounded-lg px-5 py-8">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Aktif')" />
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <x-primary-button>
                    {{ __('Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
