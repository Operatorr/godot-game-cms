<x-guest-layout>
    <x-slot:eyebrow>The Final Rite</x-slot:eyebrow>
    <x-slot:heading>PROVE THE SIGIL</x-slot:heading>
    <x-slot:subheading>A raven was dispatched to your sigil bearing the seal of confirmation. Find it. Click the seal. Then we shall speak.</x-slot:subheading>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 flex items-start gap-3 p-4 bg-success/10 border border-success/40 rounded-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-success mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-bone text-sm font-medium tracking-wide">
                {{ __('A new raven has flown to your sigil.') }}
            </span>
        </div>
    @endif

    <div class="space-y-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="w-full">
                {{ __('Dispatch Another Raven') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full text-center font-cinzel text-xs tracking-[0.2em] uppercase
                           text-bone/50 hover:text-error border-b border-bone/10 hover:border-error/60
                           pb-1 transition-colors">
                {{ __('Sever the Connection') }}
            </button>
        </form>
    </div>
</x-guest-layout>
