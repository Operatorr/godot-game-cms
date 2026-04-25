<x-guest-layout>
    <x-slot:eyebrow>Forge the Pact</x-slot:eyebrow>
    <x-slot:heading>CLAIM YOUR NAME</x-slot:heading>
    <x-slot:subheading>Mark the ledger. The void demands a name to remember—and one to grieve.</x-slot:subheading>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="username" :value="__('Chosen Name')" />
            <x-text-input id="username" type="text" name="username" :value="old('username')"
                          required autofocus autocomplete="username"
                          placeholder="DoomWielder" />
            <x-input-error :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Sigil of Contact')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')"
                          required autocomplete="email"
                          placeholder="warrior@omega.realm" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Whispered Word')" />
            <x-text-input id="password" type="password" name="password"
                          required autocomplete="new-password"
                          placeholder="•••••••••" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Speak it Again')" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                          required autocomplete="new-password"
                          placeholder="•••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <p class="text-[11px] text-bone/40 italic leading-relaxed pt-1 border-l-2 border-primary/30 pl-3">
            By signing the pact, you accept that in the Omega Realm there is no mercy and no second life.
        </p>

        <div class="pt-2">
            <x-primary-button class="w-full">
                {{ __('Sign in Blood') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 pt-6 border-t border-primary/15 text-center">
        <p class="text-xs font-cinzel uppercase tracking-[0.2em] text-bone/40">
            {{ __('Already bound?') }}
        </p>
        <a href="{{ route('login') }}"
           class="inline-block mt-2 font-cinzel text-sm tracking-[0.2em] uppercase text-secondary hover:text-bone transition-colors">
            {{ __('Return to the Gate ⛧') }}
        </a>
    </div>
</x-guest-layout>
