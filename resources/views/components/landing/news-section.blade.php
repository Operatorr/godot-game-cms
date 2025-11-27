<!-- News Section -->
<section id="news" class="py-20 bg-base-300 relative">
	<!-- Background accent -->
	<div class="absolute inset-0 bg-gradient-to-b from-base-300 via-base-200/30 to-base-300"></div>

	<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<!-- Section Header -->
		<div class="text-center mb-12 scroll-reveal">
			<h2 class="font-cinzel text-3xl sm:text-4xl font-bold text-bone text-shadow-blood tracking-wider mb-4">
				LATEST TRANSMISSIONS
			</h2>
			<p class="text-bone/60 max-w-2xl mx-auto">
				Stay informed with the latest updates from the void. Development progress, community events, and more.
			</p>
		</div>

		<!-- News Grid -->
		<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
			<div class="scroll-reveal" style="transition-delay: 0.1s;">
				<x-landing.news-card
					title="Early Access Announcement"
					date="Coming Soon"
					excerpt="The void awaits. Prepare for the early access launch of Omega Realm. Death is only the beginning."
					category="Update"
					link="#"
				/>
			</div>

			<div class="scroll-reveal" style="transition-delay: 0.2s;">
				<x-landing.news-card
					title="Community Discord Launch"
					date="Coming Soon"
					excerpt="Join thousands of survivors in our official Discord. Share strategies, find allies, or make enemies."
					category="Event"
					link="#"
				/>
			</div>

			<div class="scroll-reveal" style="transition-delay: 0.3s;">
				<x-landing.news-card
					title="Development Update #1"
					date="Coming Soon"
					excerpt="A deep dive into the core gameplay mechanics, permadeath system, and the horrors that await in the depths."
					category="Dev Blog"
					link="#"
				/>
			</div>
		</div>

		<!-- View All Button -->
		<div class="text-center scroll-reveal">
			<a href="/news" class="btn btn-outline border-secondary text-secondary hover:bg-secondary hover:text-secondary-content font-semibold tracking-wide">
				View All News
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
				</svg>
			</a>
		</div>
	</div>
</section>
