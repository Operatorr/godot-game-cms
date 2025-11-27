<!-- Top Utility Bar -->
<div class="bg-base-300 border-b border-base-100 fixed top-0 left-0 right-0 z-50">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex items-center justify-between h-10">
			<!-- Left: CTA -->
			<a href="/register" class="btn btn-primary btn-xs sm:btn-sm gap-2 font-semibold animate-pulse-glow">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
				</svg>
				<span class="hidden sm:inline">Get Access Now!</span>
				<span class="sm:hidden">Access</span>
			</a>

			<!-- Right: Auth & Utility Links -->
			<div class="flex items-center gap-2 sm:gap-4">
				<!-- Sign In -->
				<a href="/login" class="text-xs sm:text-sm text-bone/70 hover:text-secondary transition-colors font-medium hidden sm:block">
					Sign In
				</a>

				<!-- Create Account -->
				<a href="/register" class="text-xs sm:text-sm text-bone/70 hover:text-secondary transition-colors font-medium hidden md:block">
					Create Account
				</a>

				<!-- Divider -->
				<span class="hidden md:block text-bone/30">|</span>

				<!-- Support -->
				<a href="/support" class="text-xs sm:text-sm text-bone/70 hover:text-secondary transition-colors font-medium">
					Support
				</a>

				<!-- Language Dropdown -->
				<div class="dropdown dropdown-end">
					<label tabindex="0" class="btn btn-ghost btn-xs sm:btn-sm gap-1 text-bone/70 hover:text-secondary">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
						</svg>
						<span class="hidden sm:inline text-xs">EN</span>
						<svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</label>
					<ul tabindex="0" class="dropdown-content z-[60] menu p-2 shadow-lg bg-base-200 rounded-box w-32 border border-base-100">
						<li><a class="text-sm">English</a></li>
						<li><a class="text-sm">Deutsch</a></li>
						<li><a class="text-sm">Francais</a></li>
						<li><a class="text-sm">Espanol</a></li>
						<li><a class="text-sm">Portugues</a></li>
						<li><a class="text-sm">Russian</a></li>
						<li><a class="text-sm">Japanese</a></li>
						<li><a class="text-sm">Korean</a></li>
						<li><a class="text-sm">Chinese</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
