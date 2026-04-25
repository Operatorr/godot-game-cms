@extends('layouts.app')

@section('content')
    <section class="min-h-screen pt-32 pb-20 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <p class="font-cinzel text-xs tracking-[0.4em] text-secondary uppercase mb-4">The Sanctum</p>
            <h1 class="font-cinzel text-4xl sm:text-5xl font-bold text-bone text-shadow-blood tracking-wider mb-6">
                WELCOME, {{ strtoupper(auth()->user()->username ?? 'WARRIOR') }}
            </h1>
            <div class="flex items-center justify-center gap-3 my-6">
                <span class="h-px w-16 bg-gradient-to-r from-transparent to-primary/50"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L13.5 8.5L20 10L13.5 11.5L12 22L10.5 11.5L4 10L10.5 8.5L12 2Z"/>
                </svg>
                <span class="h-px w-16 bg-gradient-to-l from-transparent to-primary/50"></span>
            </div>
            <p class="text-bone/60 italic max-w-xl mx-auto">
                The void has accepted your pact. The hunt begins where you choose.
            </p>

            <form method="POST" action="{{ route('logout') }}" class="mt-12">
                @csrf
                <button type="submit"
                        class="font-cinzel text-xs tracking-[0.2em] uppercase text-bone/50 hover:text-error border-b border-bone/20 hover:border-error/60 pb-1 transition-colors">
                    Sever the Connection
                </button>
            </form>
        </div>
    </section>
@endsection
