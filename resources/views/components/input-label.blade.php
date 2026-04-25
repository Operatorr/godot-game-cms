@props(['value'])

<label {{ $attributes->merge([
    'class' => 'block font-cinzel text-xs font-semibold uppercase tracking-[0.2em] text-secondary/90 mb-2'
]) }}>
    {{ $value ?? $slot }}
</label>
