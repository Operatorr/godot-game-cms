@props(['status'])

@if ($status)
    <div {{ $attributes->merge([
        'class' => 'flex items-start gap-3 p-4 bg-secondary/10 border border-secondary/40 rounded-sm
                    text-bone text-sm font-medium tracking-wide'
    ]) }}>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-secondary mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ $status }}</span>
    </div>
@endif
