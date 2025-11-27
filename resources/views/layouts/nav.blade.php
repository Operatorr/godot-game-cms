<!-- Main Navigation -->
<nav x-data="{ scrolled: false, mobileMenuOpen: false }"
	x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
	:class="{ 'bg-base-300/95 backdrop-blur-md shadow-lg': scrolled, 'bg-transparent': !scrolled }"
	class="fixed top-10 left-0 right-0 z-40 transition-all duration-300">

	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex items-center justify-between h-16">
			<!-- Logo -->
			<a href="/" class="flex items-center gap-3 group">
				<div class="w-10 h-10 bg-primary rounded flex items-center justify-center glow-blood">
					<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-content" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
					</svg>
				</div>
				<span class="font-cinzel text-xl font-bold text-bone tracking-wider group-hover:text-secondary transition-colors">
					OMEGA REALM
				</span>
			</a>

			<!-- Desktop Menu -->
			<div class="hidden lg:flex items-center gap-8">
				<a href="/" class="nav-link font-semibold text-bone hover:text-secondary transition-colors tracking-wide">Home</a>
				<a href="/game" class="nav-link font-semibold text-bone/80 hover:text-secondary transition-colors tracking-wide">Game</a>
				<a href="/faq" class="nav-link font-semibold text-bone/80 hover:text-secondary transition-colors tracking-wide">FAQ</a>
				<a href="/community" class="nav-link font-semibold text-bone/80 hover:text-secondary transition-colors tracking-wide">Community</a>
				<a href="/press" class="nav-link font-semibold text-bone/80 hover:text-secondary transition-colors tracking-wide">Press</a>
			</div>

			<!-- Mobile Menu Button -->
			<button @click="mobileMenuOpen = !mobileMenuOpen"
				class="lg:hidden p-2 text-bone hover:text-secondary transition-colors"
				aria-label="Toggle menu">
				<svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
				</svg>
				<svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
		</div>
	</div>

	<!-- Mobile Menu -->
	<div x-show="mobileMenuOpen"
		x-cloak
		x-transition:enter="transition ease-out duration-200"
		x-transition:enter-start="opacity-0 -translate-y-4"
		x-transition:enter-end="opacity-100 translate-y-0"
		x-transition:leave="transition ease-in duration-150"
		x-transition:leave-start="opacity-100 translate-y-0"
		x-transition:leave-end="opacity-0 -translate-y-4"
		class="lg:hidden bg-base-300/95 backdrop-blur-md border-t border-base-100">
		<div class="max-w-7xl mx-auto px-4 py-4 space-y-2">
			<a href="/" class="block py-3 px-4 text-bone hover:text-secondary hover:bg-base-200 rounded transition-colors font-semibold tracking-wide">Home</a>
			<a href="/game" class="block py-3 px-4 text-bone/80 hover:text-secondary hover:bg-base-200 rounded transition-colors font-semibold tracking-wide">Game</a>
			<a href="/faq" class="block py-3 px-4 text-bone/80 hover:text-secondary hover:bg-base-200 rounded transition-colors font-semibold tracking-wide">FAQ</a>
			<a href="/community" class="block py-3 px-4 text-bone/80 hover:text-secondary hover:bg-base-200 rounded transition-colors font-semibold tracking-wide">Community</a>
			<a href="/press" class="block py-3 px-4 text-bone/80 hover:text-secondary hover:bg-base-200 rounded transition-colors font-semibold tracking-wide">Press</a>

			<div class="border-t border-base-100 pt-4 mt-4 space-y-2">
				<a href="/login" class="block py-3 px-4 text-bone/80 hover:text-secondary hover:bg-base-200 rounded transition-colors font-semibold">Sign In</a>
				<a href="/register" class="block py-3 px-4 bg-primary text-primary-content hover:bg-primary/80 rounded transition-colors font-semibold text-center">Create Account</a>
			</div>
		</div>
	</div>
</nav>
