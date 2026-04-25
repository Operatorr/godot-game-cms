<x-guest-layout>
    <x-slot:eyebrow>Rite of Renewal</x-slot:eyebrow>
    <x-slot:heading>FORGE A NEW WORD</x-slot:heading>
    <x-slot:subheading>The old word is ash. Carve a new one into the obsidian and remember it well.</x-slot:subheading>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-input-label for="email" :value="__('Sigil of Contact')" />
            <x-text-input id="email" type="email" name="email"
                          :value="old('email', $request->email)"
                          required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Whispered Word')" />
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

        <div class="pt-2">
            <x-primary-button class="w-full">
                {{ __('Seal the New Pact') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
