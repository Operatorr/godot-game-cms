<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'group relative inline-flex items-center justify-center gap-2
                px-6 py-3 bg-primary text-primary-content
                font-cinzel text-sm font-semibold tracking-[0.2em] uppercase
                border border-primary/60 rounded-sm
                glow-blood hover:animate-pulse-glow
                hover:bg-primary/90 active:bg-primary
                focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2 focus:ring-offset-base-300
                transition-all duration-200'
]) }}>
    <span class="relative">{{ $slot }}</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
    </svg>
</button>
