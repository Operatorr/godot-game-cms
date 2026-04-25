@extends('layouts.app')

@php
    // Placeholder roster — wire to real Character model when ready
    $characters = [
        [
            'name' => 'Vael of the Ashen Choir',
            'class' => 'Voidcaller',
            'level' => 47,
            'level_max' => 60,
            'world' => 'Mournhold',
            'pvp' => 'Open',
            'last_seen' => '3 hours ago',
            'sigil' => 'eye',
            'tint' => 'eldritch',
        ],
        [
            'name' => 'Korrath Ironmourn',
            'class' => 'Ironclad',
            'level' => 62,
            'level_max' => 70,
            'world' => 'Grimhold',
            'pvp' => 'Hardcore',
            'last_seen' => 'Yesterday',
            'sigil' => 'blade',
            'tint' => 'blood',
        ],
        [
            'name' => 'Sibyl Wraithveil',
            'class' => 'Hollowed Seer',
            'level' => 28,
            'level_max' => 30,
            'world' => 'Mournhold',
            'pvp' => 'Sanctum',
            'last_seen' => '6 days ago',
            'sigil' => 'moon',
            'tint' => 'gold',
        ],
    ];
    $maxSlots = 6;
@endphp

@section('content')
    {{-- Atmospheric backdrop --}}
    <div class="fixed inset-0 -z-10 bg-noise opacity-40 pointer-events-none"></div>
    <div class="fixed inset-0 -z-10 pointer-events-none"
         style="background:
            radial-gradient(ellipse at 20% 0%, rgba(107,28,28,0.18), transparent 55%),
            radial-gradient(ellipse at 85% 30%, rgba(74,59,107,0.14), transparent 50%),
            radial-gradient(ellipse at 50% 110%, rgba(154,123,79,0.10), transparent 60%);"></div>

    <section class="min-h-screen pt-28 pb-24 px-4 sm:px-6 lg:px-10">

        {{-- ─────────────────────  SANCTUM HEADER  ───────────────────── --}}
        <header class="max-w-7xl mx-auto text-center mb-20">
            <p class="font-cinzel text-[10px] tracking-[0.6em] text-secondary uppercase mb-3">
                ✶ &nbsp;The Sanctum &nbsp;✶
            </p>
            <h1 class="font-cinzel text-4xl sm:text-5xl lg:text-6xl font-bold text-bone text-shadow-blood tracking-[0.15em] mb-5">
                {{ strtoupper(auth()->user()->username ?? auth()->user()->name ?? 'Warrior') }}
            </h1>

            {{-- Ornate divider --}}
            <div class="flex items-center justify-center gap-4 my-6">
                <span class="h-px w-24 sm:w-40 bg-gradient-to-r from-transparent via-primary/40 to-primary/70"></span>
                <svg class="h-6 w-6 text-primary text-shadow-blood" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L13.5 8.5L20 10L13.5 11.5L12 22L10.5 11.5L4 10L10.5 8.5L12 2Z"/>
                </svg>
                <span class="h-px w-24 sm:w-40 bg-gradient-to-l from-transparent via-primary/40 to-primary/70"></span>
            </div>

            <p class="font-rajdhani text-bone/60 italic max-w-xl mx-auto tracking-wide">
                The void has accepted your pact. Tend your souls. Seal your wards.
            </p>

            {{-- Account meta strip --}}
            <dl class="mt-10 grid grid-cols-2 sm:grid-cols-4 gap-px max-w-3xl mx-auto bg-bone/5 border border-bone/10 rounded-sm overflow-hidden">
                @foreach ([
                    ['Souls Bound', count($characters) . ' / ' . $maxSlots],
                    ['Account Tier', 'Initiate'],
                    ['Pact Sealed', auth()->user()->created_at?->format('M Y') ?? 'Unknown'],
                    ['Last Hunt', '3 hours ago'],
                ] as $stat)
                    <div class="bg-base-300/80 px-4 py-4">
                        <dt class="font-cinzel text-[9px] tracking-[0.3em] text-secondary/80 uppercase">{{ $stat[0] }}</dt>
                        <dd class="font-cinzel text-bone mt-1 tracking-wider">{{ $stat[1] }}</dd>
                    </div>
                @endforeach
            </dl>
        </header>

        {{-- ─────────────────────  TWO-COLUMN BODY  ───────────────────── --}}
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12">

            {{-- ═══════════  ROSTER  ═══════════ --}}
            <div class="lg:col-span-8">
                <div class="flex items-end justify-between mb-8 border-b border-bone/15 pb-4">
                    <div>
                        <p class="font-cinzel text-[10px] tracking-[0.5em] text-secondary uppercase">Chapter I</p>
                        <h2 class="font-cinzel text-2xl sm:text-3xl text-bone tracking-[0.15em] mt-1">ROSTER OF SOULS</h2>
                    </div>
                    <span class="font-cinzel text-xs text-bone/40 tracking-[0.3em]">
                        {{ count($characters) }} / {{ $maxSlots }} BOUND
                    </span>
                </div>

                {{-- Character grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    {{-- Bound characters --}}
                    @foreach ($characters as $i => $char)
                        @php
                            $tint = $char['tint']; // blood | gold | eldritch
                            $tintClass = [
                                'blood'    => ['ring' => 'border-primary/60',   'bar' => 'bg-primary',         'glow' => 'group-hover:shadow-[0_0_30px_rgba(107,28,28,0.55)]', 'accent' => 'text-primary'],
                                'gold'     => ['ring' => 'border-secondary/60', 'bar' => 'bg-secondary',       'glow' => 'group-hover:shadow-[0_0_30px_rgba(154,123,79,0.55)]','accent' => 'text-secondary'],
                                'eldritch' => ['ring' => 'border-accent/60',    'bar' => 'bg-accent',          'glow' => 'group-hover:shadow-[0_0_30px_rgba(74,59,107,0.6)]', 'accent' => 'text-eldritch-light'],
                            ][$tint];
                            $pct = min(100, round($char['level'] / max(1,$char['level_max']) * 100));
                        @endphp

                        <article class="group relative">
                            {{-- Clipped frame --}}
                            <div class="relative bg-base-200/90 border {{ $tintClass['ring'] }} transition-all duration-500 {{ $tintClass['glow'] }} overflow-hidden"
                                 style="clip-path: polygon(14px 0, 100% 0, 100% calc(100% - 14px), calc(100% - 14px) 100%, 0 100%, 0 14px);">

                                {{-- Inner noise + gradient --}}
                                <div class="absolute inset-0 bg-noise opacity-50 pointer-events-none"></div>
                                <div class="absolute inset-0 pointer-events-none opacity-40"
                                     style="background: radial-gradient(ellipse at top right, rgba(107,28,28,0.25), transparent 60%);"></div>

                                {{-- Slot index --}}
                                <span class="absolute top-3 right-4 font-cinzel text-[10px] tracking-[0.3em] text-bone/30">
                                    SLOT {{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <div class="relative p-5 sm:p-6 flex gap-5">

                                    {{-- Sigil disc --}}
                                    <div class="shrink-0">
                                        <div class="relative h-20 w-20 rounded-full border {{ $tintClass['ring'] }} flex items-center justify-center bg-base-300/80"
                                             style="box-shadow: inset 0 0 24px rgba(0,0,0,0.6);">
                                            {{-- rotating outer rune ring (decorative) --}}
                                            <svg class="absolute inset-0 h-full w-full opacity-60 animate-[spin_24s_linear_infinite]" viewBox="0 0 100 100" fill="none">
                                                <circle cx="50" cy="50" r="46" stroke="currentColor" stroke-width="0.4" stroke-dasharray="2 4" class="{{ $tintClass['accent'] }}"/>
                                                <circle cx="50" cy="2" r="1.2" fill="currentColor" class="{{ $tintClass['accent'] }}"/>
                                                <circle cx="50" cy="98" r="1.2" fill="currentColor" class="{{ $tintClass['accent'] }}"/>
                                                <circle cx="2" cy="50" r="1.2" fill="currentColor" class="{{ $tintClass['accent'] }}"/>
                                                <circle cx="98" cy="50" r="1.2" fill="currentColor" class="{{ $tintClass['accent'] }}"/>
                                            </svg>
                                            {{-- Class sigil --}}
                                            <svg class="relative h-9 w-9 {{ $tintClass['accent'] }}" viewBox="0 0 24 24" fill="currentColor">
                                                @switch($char['sigil'])
                                                    @case('blade')
                                                        <path d="M12 1l1 5 5 1-5 1-1 13-1-13-5-1 5-1 1-5z M11 14h2v8h-2z"/>
                                                        @break
                                                    @case('eye')
                                                        <path d="M12 5C6 5 2 12 2 12s4 7 10 7 10-7 10-7-4-7-10-7zm0 11a4 4 0 110-8 4 4 0 010 8zm0-2a2 2 0 100-4 2 2 0 000 4z"/>
                                                        @break
                                                    @case('moon')
                                                        <path d="M16 2c-4 1-6 4.5-6 8s2 7 6 8c-3 2-7 2-10 0C2.5 16 1 13 1 10c0-4 3-7 7-8 2-.5 5-.3 8 0z M19 4l1 2 2 1-2 1-1 2-1-2-2-1 2-1z"/>
                                                        @break
                                                    @default
                                                        <path d="M12 2L13.5 8.5L20 10L13.5 11.5L12 22L10.5 11.5L4 10L10.5 8.5L12 2Z"/>
                                                @endswitch
                                            </svg>
                                        </div>
                                        {{-- World tag --}}
                                        <p class="text-center mt-3 font-cinzel text-[9px] tracking-[0.25em] text-bone/40 uppercase">{{ $char['world'] }}</p>
                                    </div>

                                    {{-- Body --}}
                                    <div class="min-w-0 flex-1">
                                        <p class="font-cinzel text-[10px] tracking-[0.4em] {{ $tintClass['accent'] }} uppercase">{{ $char['class'] }}</p>
                                        <h3 class="font-cinzel text-bone text-lg tracking-wider truncate mt-0.5">{{ $char['name'] }}</h3>

                                        {{-- Level rune bar --}}
                                        <div class="mt-3">
                                            <div class="flex items-baseline justify-between">
                                                <span class="font-cinzel text-[10px] tracking-[0.3em] text-bone/50 uppercase">Level</span>
                                                <span class="font-cinzel text-bone tracking-wider"><span class="text-shadow-blood">{{ $char['level'] }}</span><span class="text-bone/40 text-xs"> / {{ $char['level_max'] }}</span></span>
                                            </div>
                                            <div class="mt-1.5 h-1.5 bg-base-300 border border-bone/10 relative overflow-hidden">
                                                <div class="h-full {{ $tintClass['bar'] }}" style="width: {{ $pct }}%; box-shadow: 0 0 12px currentColor;"></div>
                                                {{-- tick marks --}}
                                                <div class="absolute inset-0 flex justify-between pointer-events-none">
                                                    @for($t=0; $t<8; $t++)
                                                        <span class="w-px h-full bg-base-100/60"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Meta --}}
                                        <div class="mt-4 flex flex-wrap items-center gap-x-4 gap-y-1.5 font-cinzel text-[10px] tracking-[0.25em] uppercase">
                                            <span class="text-bone/50">{{ $char['pvp'] }}</span>
                                            <span class="text-bone/20">•</span>
                                            <span class="text-bone/40">Last seen {{ $char['last_seen'] }}</span>
                                        </div>

                                        {{-- Actions --}}
                                        <div class="mt-5 flex items-center gap-3 pt-3 border-t border-bone/10">
                                            <a href="#" class="font-cinzel text-[10px] tracking-[0.3em] uppercase text-bone/70 hover:text-secondary transition-colors">
                                                Enter →
                                            </a>
                                            <span class="text-bone/15">|</span>
                                            <a href="#" class="font-cinzel text-[10px] tracking-[0.3em] uppercase text-bone/50 hover:text-bone transition-colors">
                                                Codex
                                            </a>
                                            <span class="ml-auto">
                                                <button type="button"
                                                        x-data
                                                        @click="$dispatch('open-banish', { id: {{ $i }}, name: '{{ $char['name'] }}' })"
                                                        class="font-cinzel text-[10px] tracking-[0.3em] uppercase text-bone/30 hover:text-error transition-colors cursor-pointer">
                                                    Banish
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Bottom corner ornament --}}
                                <div class="absolute bottom-0 left-0 w-3.5 h-px bg-bone/30"></div>
                                <div class="absolute bottom-0 left-0 w-px h-3.5 bg-bone/30"></div>
                                <div class="absolute top-0 right-0 w-3.5 h-px bg-bone/30"></div>
                                <div class="absolute top-0 right-0 w-px h-3.5 bg-bone/30"></div>
                            </div>
                        </article>
                    @endforeach

                    {{-- Empty slot — Forge new soul --}}
                    @if (count($characters) < $maxSlots)
                        <button type="button"
                                x-data
                                @click="$dispatch('open-forge')"
                                class="group relative cursor-pointer text-left">
                            <div class="relative bg-base-300/40 border border-dashed border-bone/15 hover:border-secondary/60 transition-all duration-500 overflow-hidden min-h-full"
                                 style="clip-path: polygon(14px 0, 100% 0, 100% calc(100% - 14px), calc(100% - 14px) 100%, 0 100%, 0 14px);">
                                <div class="absolute inset-0 bg-noise opacity-30 pointer-events-none"></div>

                                <div class="relative p-8 flex flex-col items-center justify-center text-center min-h-[14rem]">
                                    <div class="h-16 w-16 rounded-full border border-bone/20 group-hover:border-secondary/70 flex items-center justify-center transition-all duration-500 group-hover:rotate-90"
                                         style="box-shadow: inset 0 0 20px rgba(0,0,0,0.6);">
                                        <svg class="h-7 w-7 text-bone/30 group-hover:text-secondary transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                                            <path d="M12 4v16M4 12h16"/>
                                        </svg>
                                    </div>
                                    <p class="font-cinzel text-[10px] tracking-[0.5em] text-bone/30 group-hover:text-secondary uppercase mt-5 transition-colors">Awaiting a Soul</p>
                                    <p class="font-cinzel text-bone/60 group-hover:text-bone tracking-[0.2em] uppercase text-sm mt-2 transition-colors">
                                        Forge New Champion
                                    </p>
                                    <p class="font-rajdhani text-bone/30 italic text-xs mt-3 max-w-[16rem]">
                                        An empty altar hungers. Bind a soul to the pact and step into the void.
                                    </p>
                                </div>
                            </div>
                        </button>
                    @endif

                    {{-- Locked / sealed slots --}}
                    @for ($s = count($characters) + 1; $s < $maxSlots; $s++)
                        <div class="relative opacity-60">
                            <div class="relative bg-base-300/30 border border-bone/10 overflow-hidden min-h-full"
                                 style="clip-path: polygon(14px 0, 100% 0, 100% calc(100% - 14px), calc(100% - 14px) 100%, 0 100%, 0 14px);">
                                <div class="absolute inset-0 bg-noise opacity-20 pointer-events-none"></div>
                                <div class="relative p-8 flex flex-col items-center justify-center text-center min-h-[14rem]">
                                    <svg class="h-8 w-8 text-bone/20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                                        <rect x="5" y="11" width="14" height="9" rx="1"/>
                                        <path d="M8 11V7a4 4 0 018 0v4"/>
                                    </svg>
                                    <p class="font-cinzel text-[10px] tracking-[0.4em] text-bone/25 uppercase mt-4">Sealed Altar</p>
                                    <p class="font-rajdhani text-bone/20 italic text-xs mt-2">Unlocks at higher tier</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            {{-- ═══════════  SETTINGS — RITES  ═══════════ --}}
            <aside class="lg:col-span-4"
                   x-data="{ tab: 'identity' }">
                <div class="flex items-end justify-between mb-8 border-b border-bone/15 pb-4">
                    <div>
                        <p class="font-cinzel text-[10px] tracking-[0.5em] text-secondary uppercase">Chapter II</p>
                        <h2 class="font-cinzel text-2xl sm:text-3xl text-bone tracking-[0.15em] mt-1">RITES OF THE SELF</h2>
                    </div>
                </div>

                {{-- Tab triad --}}
                <nav class="grid grid-cols-3 gap-px bg-bone/10 border border-bone/10 mb-6">
                    @foreach ([
                        ['identity',  'Identity',  '◈'],
                        ['wards',     'Wards',     '✦'],
                        ['severance', 'Severance', '☥'],
                    ] as [$key, $label, $glyph])
                        <button type="button"
                                @click="tab = '{{ $key }}'"
                                :class="tab === '{{ $key }}' ? 'bg-base-200 text-bone' : 'bg-base-300 text-bone/50 hover:text-bone'"
                                class="font-cinzel text-[10px] tracking-[0.3em] uppercase py-3 transition-colors cursor-pointer">
                            <span class="block text-base mb-0.5">{{ $glyph }}</span>
                            {{ $label }}
                        </button>
                    @endforeach
                </nav>

                {{-- ── Identity ── --}}
                <section x-show="tab === 'identity'" x-cloak x-transition.opacity.duration.300ms class="space-y-5">
                    <div class="bg-base-200/80 border border-bone/10 p-5 relative overflow-hidden">
                        <div class="absolute inset-0 bg-noise opacity-30 pointer-events-none"></div>
                        <div class="relative">
                            <p class="font-cinzel text-[10px] tracking-[0.4em] text-secondary uppercase mb-4">Sigil & Name</p>
                            <form action="#" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="font-cinzel text-[10px] tracking-[0.3em] text-bone/60 uppercase block mb-1.5">True Name</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name ?? '' }}"
                                           class="w-full bg-base-300 border border-bone/15 focus:border-secondary/60 focus:outline-none font-rajdhani text-bone px-3 py-2.5 text-sm tracking-wide rounded-sm transition-colors">
                                </div>
                                <div>
                                    <label class="font-cinzel text-[10px] tracking-[0.3em] text-bone/60 uppercase block mb-1.5">Sending Vessel</label>
                                    <input type="email" name="email" value="{{ auth()->user()->email ?? '' }}"
                                           class="w-full bg-base-300 border border-bone/15 focus:border-secondary/60 focus:outline-none font-rajdhani text-bone px-3 py-2.5 text-sm tracking-wide rounded-sm transition-colors">
                                </div>
                                <button type="submit" class="font-cinzel text-[10px] tracking-[0.3em] uppercase text-bone/80 hover:text-secondary border-b border-bone/20 hover:border-secondary/60 pb-1 transition-colors cursor-pointer">
                                    Inscribe Changes →
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Verification status --}}
                    @if (auth()->user() && method_exists(auth()->user(), 'hasVerifiedEmail'))
                        <div class="bg-base-200/40 border border-bone/10 px-5 py-3 flex items-center gap-3">
                            <span class="h-2 w-2 rounded-full {{ auth()->user()->hasVerifiedEmail() ? 'bg-success' : 'bg-warning' }} animate-pulse"></span>
                            <p class="font-cinzel text-[10px] tracking-[0.3em] uppercase {{ auth()->user()->hasVerifiedEmail() ? 'text-bone/60' : 'text-warning' }}">
                                {{ auth()->user()->hasVerifiedEmail() ? 'Vessel Sealed' : 'Vessel Awaits Sealing' }}
                            </p>
                        </div>
                    @endif
                </section>

                {{-- ── Wards (password) ── --}}
                <section x-show="tab === 'wards'" x-cloak x-transition.opacity.duration.300ms class="space-y-5">
                    <div class="bg-base-200/80 border border-bone/10 p-5 relative overflow-hidden">
                        <div class="absolute inset-0 bg-noise opacity-30 pointer-events-none"></div>
                        <div class="relative">
                            <p class="font-cinzel text-[10px] tracking-[0.4em] text-secondary uppercase mb-2">Renew the Ward</p>
                            <p class="font-rajdhani text-bone/40 italic text-xs mb-5">A strong ward shields against the watchers in the dark.</p>
                            <form action="{{ Route::has('password.update') ? route('password.update') : '#' }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')
                                @foreach ([
                                    ['current_password', 'Current Ward'],
                                    ['password',         'New Ward'],
                                    ['password_confirmation', 'Confirm the New Ward'],
                                ] as [$n, $l])
                                    <div>
                                        <label class="font-cinzel text-[10px] tracking-[0.3em] text-bone/60 uppercase block mb-1.5">{{ $l }}</label>
                                        <input type="password" name="{{ $n }}" autocomplete="new-password"
                                               class="w-full bg-base-300 border border-bone/15 focus:border-secondary/60 focus:outline-none font-rajdhani text-bone px-3 py-2.5 text-sm tracking-wide rounded-sm transition-colors">
                                    </div>
                                @endforeach
                                <button type="submit" class="font-cinzel text-[10px] tracking-[0.3em] uppercase text-bone/80 hover:text-secondary border-b border-bone/20 hover:border-secondary/60 pb-1 transition-colors cursor-pointer">
                                    Renew the Ward →
                                </button>
                            </form>
                        </div>
                    </div>
                </section>

                {{-- ── Severance ── --}}
                <section x-show="tab === 'severance'" x-cloak x-transition.opacity.duration.300ms class="space-y-5">
                    <div class="bg-gradient-to-br from-base-200/80 to-primary/10 border border-primary/40 p-5 relative overflow-hidden">
                        <div class="absolute inset-0 bg-noise opacity-30 pointer-events-none"></div>
                        <div class="absolute -top-12 -right-12 h-32 w-32 rounded-full bg-primary/20 blur-3xl pointer-events-none"></div>
                        <div class="relative">
                            <p class="font-cinzel text-[10px] tracking-[0.4em] text-error uppercase mb-2">⚠ Final Rites</p>
                            <p class="font-rajdhani text-bone/70 text-sm mb-1 leading-relaxed">
                                To sever the pact is to unmake every soul bound to this account.
                            </p>
                            <p class="font-rajdhani text-bone/40 italic text-xs mb-5">
                                The ash will not be returned. The void does not refund.
                            </p>

                            <form action="{{ Route::has('profile.destroy') ? route('profile.destroy') : '#' }}" method="POST"
                                  x-data="{ confirm: '' }" class="space-y-4">
                                @csrf
                                @method('DELETE')
                                <div>
                                    <label class="font-cinzel text-[10px] tracking-[0.3em] text-bone/60 uppercase block mb-1.5">
                                        Inscribe your name: <span class="text-error">{{ auth()->user()->username ?? auth()->user()->name ?? '' }}</span>
                                    </label>
                                    <input type="text" x-model="confirm" placeholder="—"
                                           class="w-full bg-base-300 border border-error/30 focus:border-error focus:outline-none font-cinzel text-error tracking-[0.2em] px-3 py-2.5 text-sm rounded-sm">
                                </div>
                                <input type="password" name="password" placeholder="Speak your ward"
                                       class="w-full bg-base-300 border border-bone/15 focus:border-error/60 focus:outline-none font-rajdhani text-bone px-3 py-2.5 text-sm tracking-wide rounded-sm">
                                <button type="submit"
                                        :disabled="confirm !== '{{ auth()->user()->username ?? auth()->user()->name ?? '' }}'"
                                        :class="confirm === '{{ auth()->user()->username ?? auth()->user()->name ?? '' }}' ? 'bg-error/90 hover:bg-error text-error-content cursor-pointer' : 'bg-base-300 text-bone/30 cursor-not-allowed'"
                                        class="w-full font-cinzel text-xs tracking-[0.3em] uppercase border border-error/40 py-3 transition-all">
                                    Sever the Pact Forever
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}" class="text-center pt-2">
                        @csrf
                        <button type="submit" class="font-cinzel text-[10px] tracking-[0.4em] uppercase text-bone/40 hover:text-bone border-b border-bone/15 hover:border-bone/40 pb-1 transition-colors cursor-pointer">
                            Or, simply leave the sanctum
                        </button>
                    </form>
                </section>
            </aside>
        </div>

        {{-- ─────────────────────  FORGE MODAL  ───────────────────── --}}
        <div x-data="{ open: false }"
             @open-forge.window="open = true"
             @keydown.escape.window="open = false"
             x-show="open" x-cloak
             x-transition.opacity
             class="fixed inset-0 z-[80] flex items-center justify-center px-4">
            <div class="absolute inset-0 bg-obsidian/85 backdrop-blur-sm" @click="open = false"></div>

            <div class="relative w-full max-w-lg bg-base-200 border border-secondary/40 p-8"
                 style="clip-path: polygon(20px 0, 100% 0, 100% calc(100% - 20px), calc(100% - 20px) 100%, 0 100%, 0 20px); box-shadow: 0 0 80px rgba(154,123,79,0.2);"
                 @click.stop>
                <div class="absolute inset-0 bg-noise opacity-40 pointer-events-none"></div>

                <div class="relative">
                    <p class="font-cinzel text-[10px] tracking-[0.5em] text-secondary uppercase">The Binding</p>
                    <h3 class="font-cinzel text-2xl text-bone tracking-[0.2em] mt-1 text-shadow-blood">FORGE A SOUL</h3>
                    <div class="flex items-center gap-3 my-4">
                        <span class="h-px flex-1 bg-gradient-to-r from-secondary/60 to-transparent"></span>
                        <svg class="h-4 w-4 text-secondary" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L13.5 8.5L20 10L13.5 11.5L12 22L10.5 11.5L4 10L10.5 8.5L12 2Z"/></svg>
                        <span class="h-px flex-1 bg-gradient-to-l from-secondary/60 to-transparent"></span>
                    </div>

                    <form action="#" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="font-cinzel text-[10px] tracking-[0.3em] text-bone/60 uppercase block mb-1.5">True Name of the Soul</label>
                            <input type="text" name="character_name" required
                                   class="w-full bg-base-300 border border-bone/15 focus:border-secondary/60 focus:outline-none font-rajdhani text-bone px-3 py-2.5 text-sm tracking-wide rounded-sm">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="font-cinzel text-[10px] tracking-[0.3em] text-bone/60 uppercase block mb-1.5">Vocation</label>
                                <select name="class" class="w-full bg-base-300 border border-bone/15 focus:border-secondary/60 focus:outline-none font-rajdhani text-bone px-3 py-2.5 text-sm rounded-sm">
                                    <option>Voidcaller</option>
                                    <option>Ironclad</option>
                                    <option>Hollowed Seer</option>
                                    <option>Ash Reaper</option>
                                    <option>Pale Surgeon</option>
                                </select>
                            </div>
                            <div>
                                <label class="font-cinzel text-[10px] tracking-[0.3em] text-bone/60 uppercase block mb-1.5">World</label>
                                <select name="world" class="w-full bg-base-300 border border-bone/15 focus:border-secondary/60 focus:outline-none font-rajdhani text-bone px-3 py-2.5 text-sm rounded-sm">
                                    <option>Mournhold</option>
                                    <option>Grimhold</option>
                                    <option>Pale Reach</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <p class="font-cinzel text-[10px] tracking-[0.3em] text-bone/60 uppercase mb-2">Pact Ruleset</p>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach (['Sanctum', 'Open', 'Hardcore'] as $r)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="ruleset" value="{{ $r }}" class="peer sr-only" {{ $loop->first ? 'checked' : '' }}>
                                        <div class="border border-bone/15 peer-checked:border-primary peer-checked:bg-primary/15 peer-checked:text-bone text-bone/50 hover:text-bone hover:border-bone/40 font-cinzel text-[10px] tracking-[0.3em] uppercase text-center py-2.5 transition-all">
                                            {{ $r }}
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex items-center gap-3 pt-3">
                            <button type="button" @click="open = false" class="font-cinzel text-[10px] tracking-[0.3em] uppercase text-bone/50 hover:text-bone transition-colors cursor-pointer">
                                Abandon
                            </button>
                            <button type="submit" class="ml-auto group inline-flex items-center gap-2 px-5 py-3 bg-primary text-primary-content font-cinzel text-[11px] tracking-[0.3em] uppercase border border-primary/60 rounded-sm glow-blood hover:animate-pulse-glow cursor-pointer">
                                Bind the Soul
                                <svg class="h-3.5 w-3.5 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- ─────────────────────  BANISH MODAL  ───────────────────── --}}
        <div x-data="{ open: false, id: null, name: '', confirm: '' }"
             @open-banish.window="open = true; id = $event.detail.id; name = $event.detail.name; confirm = ''"
             @keydown.escape.window="open = false"
             x-show="open" x-cloak x-transition.opacity
             class="fixed inset-0 z-[80] flex items-center justify-center px-4">
            <div class="absolute inset-0 bg-obsidian/85 backdrop-blur-sm" @click="open = false"></div>

            <div class="relative w-full max-w-md bg-base-200 border border-error/50 p-8"
                 style="clip-path: polygon(20px 0, 100% 0, 100% calc(100% - 20px), calc(100% - 20px) 100%, 0 100%, 0 20px); box-shadow: 0 0 80px rgba(139,30,30,0.3);"
                 @click.stop>
                <div class="absolute inset-0 bg-noise opacity-40 pointer-events-none"></div>
                <div class="absolute -top-16 -right-16 h-40 w-40 rounded-full bg-error/30 blur-3xl pointer-events-none"></div>

                <div class="relative">
                    <p class="font-cinzel text-[10px] tracking-[0.5em] text-error uppercase">⚠ Banishment</p>
                    <h3 class="font-cinzel text-2xl text-bone tracking-[0.2em] mt-1 text-shadow-blood">UNMAKE THE SOUL</h3>

                    <p class="font-rajdhani text-bone/70 text-sm mt-5 leading-relaxed">
                        You are about to cast <span class="font-cinzel text-error tracking-wider" x-text="name"></span> into the void. Their progress, hoard, and bindings will be unmade.
                    </p>
                    <p class="font-rajdhani text-bone/40 italic text-xs mt-2">
                        This rite cannot be reversed.
                    </p>

                    <form :action="'/characters/' + id" method="POST" class="space-y-4 mt-6">
                        @csrf
                        @method('DELETE')
                        <div>
                            <label class="font-cinzel text-[10px] tracking-[0.3em] text-bone/60 uppercase block mb-1.5">
                                Inscribe the soul's name to confirm
                            </label>
                            <input type="text" x-model="confirm" :placeholder="name"
                                   class="w-full bg-base-300 border border-error/30 focus:border-error focus:outline-none font-cinzel text-error tracking-[0.15em] px-3 py-2.5 text-sm rounded-sm">
                        </div>
                        <div class="flex items-center gap-3 pt-2">
                            <button type="button" @click="open = false" class="font-cinzel text-[10px] tracking-[0.3em] uppercase text-bone/60 hover:text-bone transition-colors cursor-pointer">
                                Spare them
                            </button>
                            <button type="submit"
                                    :disabled="confirm !== name"
                                    :class="confirm === name ? 'bg-error/90 hover:bg-error text-error-content cursor-pointer' : 'bg-base-300 text-bone/30 cursor-not-allowed border-error/20'"
                                    class="ml-auto px-5 py-3 font-cinzel text-[11px] tracking-[0.3em] uppercase border border-error/50 rounded-sm transition-all">
                                Banish Forever
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
