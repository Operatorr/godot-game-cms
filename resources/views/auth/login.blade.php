<x-guest-layout>
    <x-slot:eyebrow>Initiate Communion</x-slot:eyebrow>
    <x-slot:heading>ENTER THE VOID</x-slot:heading>
    <x-slot:subheading>Speak your name to the gate. The old gods remember those who return.</x-slot:subheading>

    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Sigil of Contact')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')"
                          required autofocus autocomplete="username"
                          placeholder="warrior@omega.realm" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Whispered Word')" />
            <x-text-input id="password" type="password" name="password"
                          required autocomplete="current-password"
                          placeholder="•••••••••" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember"
                       class="appearance-none w-4 h-4 bg-base-300 border border-primary/40 rounded-sm
                              checked:bg-primary checked:border-primary
                              focus:outline-none focus:ring-2 focus:ring-secondary/40
                              transition-colors cursor-pointer">
                <span class="ms-2 text-xs font-cinzel uppercase tracking-[0.15em] text-bone/60 group-hover:text-secondary transition-colors">
                    {{ __('Remember Me') }}
                </span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-xs font-cinzel uppercase tracking-[0.15em] text-bone/60 hover:text-secondary border-b border-bone/20 hover:border-secondary transition-colors"
                   href="{{ route('password.request') }}">
                    {{ __('Lost the word?') }}
                </a>
            @endif
        </div>

        <div class="pt-4">
            <x-primary-button class="w-full">
                {{ __('Cross the Threshold') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 pt-6 border-t border-primary/15 text-center">
        <p class="text-xs font-cinzel uppercase tracking-[0.2em] text-bone/40">
            {{ __('A stranger to these halls?') }}
        </p>
        <a href="{{ route('register') }}"
           class="inline-block mt-2 font-cinzel text-sm tracking-[0.2em] uppercase text-secondary hover:text-bone transition-colors">
            {{ __('Forge a New Pact ⛧') }}
        </a>
    </div>
</x-guest-layout>
