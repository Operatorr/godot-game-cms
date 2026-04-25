<x-guest-layout>
    <x-slot:eyebrow>Sanctum Threshold</x-slot:eyebrow>
    <x-slot:heading>SPEAK THE WORD</x-slot:heading>
    <x-slot:subheading>You stand before the inner sanctum. Whisper your word once more to pass.</x-slot:subheading>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="password" :value="__('Whispered Word')" />
            <x-text-input id="password" type="password" name="password"
                          required autocomplete="current-password"
                          placeholder="•••••••••" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full">
                {{ __('Pass Beyond') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
