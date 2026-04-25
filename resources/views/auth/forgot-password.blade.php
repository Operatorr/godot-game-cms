<x-guest-layout>
    <x-slot:eyebrow>Lost in the Void</x-slot:eyebrow>
    <x-slot:heading>RECLAIM THE WORD</x-slot:heading>
    <x-slot:subheading>Speak your sigil and a raven shall carry the path of return to your hand.</x-slot:subheading>

    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Sigil of Contact')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')"
                          required autofocus
                          placeholder="warrior@omega.realm" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full">
                {{ __('Send the Raven') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 pt-6 border-t border-primary/15 text-center">
        <a href="{{ route('login') }}"
           class="inline-block font-cinzel text-sm tracking-[0.2em] uppercase text-bone/60 hover:text-secondary transition-colors">
            ← {{ __('Back to the Gate') }}
        </a>
    </div>
</x-guest-layout>
