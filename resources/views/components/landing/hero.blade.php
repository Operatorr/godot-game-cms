<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-26">
	<!-- Background Layers -->
	<div class="absolute inset-0 bg-base-300">
		<!-- Placeholder for background image -->
		<div class="absolute inset-0 bg-gradient-to-b from-base-300 via-base-300/50 to-base-300"></div>

		<!-- Atmospheric overlay effects -->
		<div class="absolute inset-0 bg-gradient-radial from-primary/10 via-transparent to-transparent opacity-50"></div>
		<div class="absolute inset-0 bg-noise opacity-30"></div>

		<!-- Animated vignette -->
		<div class="absolute inset-0 bg-gradient-to-t from-base-300 via-transparent to-base-300/80"></div>
	</div>

	<!-- Content Container -->
	<div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
		<div class="grid lg:grid-cols-2 gap-12 items-center">
			<!-- Left: Title and CTA -->
			<div class="text-center lg:text-left space-y-8">
				<!-- Game Title -->
				<div class="space-y-4">
					<h1 class="font-cinzel text-5xl sm:text-6xl lg:text-7xl font-bold text-bone text-shadow-blood tracking-wider leading-tight">
						OMEGA<br>
						<span class="text-primary">REALM</span>
					</h1>
					<p class="text-xl sm:text-2xl text-secondary font-medium tracking-wide text-shadow-gold">
						Death is not the end. It's the beginning of your legend.
					</p>
				</div>

				<!-- Description -->
				<p class="text-lg text-bone/70 max-w-lg mx-auto lg:mx-0 leading-relaxed">
					A grimdark bullet-hell multiplayer shooter where cosmic horrors and permadeath
					collide in a dying universe that offers no mercy and no salvation.
				</p>

				<!-- CTA Buttons -->
				<div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
					<a href="https://store.steampowered.com" target="_blank" rel="noopener"
						class="btn btn-primary btn-lg gap-3 glow-blood font-semibold tracking-wide">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
							<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
						</svg>
						Wishlist on Steam
					</a>
					<a href="#features" class="btn btn-outline btn-lg border-bone/30 text-bone hover:bg-bone/10 hover:border-bone font-semibold tracking-wide">
						Learn More
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</a>
				</div>

				<!-- Social Proof -->
				<div class="flex items-center gap-6 justify-center lg:justify-start text-sm text-bone/50">
					<div class="flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary" fill="currentColor" viewBox="0 0 24 24">
							<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
						</svg>
						<span>Wishlist Now</span>
					</div>
					<div class="flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
						</svg>
						<span>Join the Community</span>
					</div>
				</div>
			</div>

			<!-- Right: Video Embed -->
			<div class="relative">
				<!-- Video Container with glow effect -->
				<div class="relative rounded-lg overflow-hidden border-glow-blood bg-base-200">
					<!-- Video Placeholder -->
					<div class="video-container">
						<!-- Replace with actual YouTube embed -->
						<div class="absolute inset-0 flex items-center justify-center bg-base-200">
							<div class="text-center space-y-4">
								<!-- Play Button Placeholder -->
								<button class="w-20 h-20 rounded-full bg-primary/80 hover:bg-primary flex items-center justify-center transition-all glow-blood group">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary-content ml-1 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
										<path d="M8 5v14l11-7z"/>
									</svg>
								</button>
								<p class="text-bone/50 text-sm">Game Trailer Coming Soon</p>
							</div>
						</div>
						<!-- Uncomment when you have a video:
						<iframe
							src="https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=0&rel=0"
							title="Omega Realm Trailer"
							frameborder="0"
							allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen>
						</iframe>
						-->
					</div>
				</div>

				<!-- Decorative elements -->
				<div class="absolute -top-4 -right-4 w-24 h-24 bg-primary/20 rounded-full blur-2xl"></div>
				<div class="absolute -bottom-4 -left-4 w-32 h-32 bg-accent/20 rounded-full blur-2xl"></div>
			</div>
		</div>
	</div>

	<!-- Scroll Indicator -->
	<div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce-slow">
		<a href="#news" class="flex flex-col items-center gap-2 text-bone/50 hover:text-secondary transition-colors">
			<span class="text-xs tracking-widest uppercase">Scroll</span>
			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
			</svg>
		</a>
	</div>
</section>
