<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="grimdark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Omega Realm — The Threshold' }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-300 text-base-content font-rajdhani min-h-screen overflow-x-hidden">

    {{-- Atmospheric layered backdrop --}}
    <div class="fixed inset-0 -z-10 pointer-events-none">
        {{-- Radial vignettes --}}
        <div class="absolute inset-0 bg-gradient-to-b from-base-300 via-base-200 to-base-300"></div>
        <div class="absolute inset-0 bg-gradient-radial from-primary/10 via-transparent to-transparent"
             style="background: radial-gradient(ellipse at 20% 10%, rgba(107,28,28,0.18), transparent 55%);"></div>
        <div class="absolute inset-0"
             style="background: radial-gradient(ellipse at 85% 90%, rgba(74,59,107,0.18), transparent 55%);"></div>
        {{-- Faint geometric grid --}}
        <div class="absolute inset-0 opacity-[0.07]"
             style="background-image: linear-gradient(rgba(232,228,220,0.5) 1px, transparent 1px), linear-gradient(90deg, rgba(232,228,220,0.5) 1px, transparent 1px); background-size: 64px 64px;"></div>
        {{-- Grain overlay --}}
        <div class="absolute inset-0 bg-noise opacity-60"></div>
    </div>

    {{-- Top sigil bar --}}
    <header class="relative z-10 border-b border-primary/20 bg-base-300/40 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-14 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-9 h-9 bg-primary rounded flex items-center justify-center glow-blood">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-content" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-cinzel text-base sm:text-lg font-bold text-bone tracking-[0.25em] group-hover:text-secondary transition-colors">
                    OMEGA&nbsp;REALM
                </span>
            </a>
            <a href="/" class="hidden sm:flex items-center gap-2 text-bone/60 hover:text-secondary text-xs font-cinzel tracking-[0.25em] uppercase transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Return
            </a>
        </div>
    </header>

    {{-- The threshold pane --}}
    <main class="relative z-10 min-h-[calc(100vh-3.5rem)] flex items-center justify-center px-4 py-12 sm:py-16">
        <div class="relative w-full max-w-md">

            {{-- Decorative corner ornaments --}}
            <div class="absolute -top-3 -left-3 w-8 h-8 border-t-2 border-l-2 border-secondary/60 pointer-events-none"></div>
            <div class="absolute -top-3 -right-3 w-8 h-8 border-t-2 border-r-2 border-secondary/60 pointer-events-none"></div>
            <div class="absolute -bottom-3 -left-3 w-8 h-8 border-b-2 border-l-2 border-secondary/60 pointer-events-none"></div>
            <div class="absolute -bottom-3 -right-3 w-8 h-8 border-b-2 border-r-2 border-secondary/60 pointer-events-none"></div>

            {{-- The seal card --}}
            <div class="relative bg-base-200/80 backdrop-blur-md border border-primary/30 rounded-sm shadow-2xl shadow-black/60 border-glow-blood">
                {{-- Inner frame --}}
                <div class="absolute inset-2 border border-primary/15 rounded-sm pointer-events-none"></div>

                <div class="relative px-8 py-10 sm:px-10 sm:py-12">
                    {{-- Header section --}}
                    <div class="text-center mb-8">
                        @isset($eyebrow)
                            <p class="font-cinzel text-[10px] sm:text-xs tracking-[0.4em] text-secondary uppercase mb-3">
                                {{ $eyebrow }}
                            </p>
                        @endisset

                        @isset($heading)
                            <h1 class="font-cinzel text-2xl sm:text-3xl font-bold text-bone text-shadow-blood tracking-wider mb-3">
                                {{ $heading }}
                            </h1>
                        @endisset

                        {{-- Sigil divider --}}
                        <div class="flex items-center justify-center gap-3 my-4">
                            <span class="h-px w-12 bg-gradient-to-r from-transparent to-primary/50"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary/80" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2L13.5 8.5L20 10L13.5 11.5L12 22L10.5 11.5L4 10L10.5 8.5L12 2Z"/>
                            </svg>
                            <span class="h-px w-12 bg-gradient-to-l from-transparent to-primary/50"></span>
                        </div>

                        @isset($subheading)
                            <p class="text-bone/60 text-sm leading-relaxed italic">
                                {{ $subheading }}
                            </p>
                        @endisset
                    </div>

                    {{ $slot }}
                </div>
            </div>

            {{-- Footer flavor text --}}
            <p class="mt-8 text-center text-bone/30 text-xs italic font-rajdhani tracking-wide">
                "The void watches. The void waits. The void remembers."
            </p>
        </div>
    </main>

    @stack('scripts')
</body>
</html>
