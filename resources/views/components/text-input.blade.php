@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'w-full bg-base-300/60 border border-primary/30 text-bone placeholder:text-bone/30
                px-4 py-3 font-rajdhani tracking-wide
                rounded-sm shadow-inner shadow-black/40
                focus:outline-none focus:border-secondary focus:ring-2 focus:ring-secondary/40
                hover:border-primary/60
                transition-colors duration-200
                disabled:opacity-50 disabled:cursor-not-allowed'
]) }}>
