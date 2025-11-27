<!-- Livestreams Section -->
<section id="livestreams" class="py-20 bg-base-200/50 relative">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<!-- Section Header -->
		<div class="text-center mb-12 scroll-reveal">
			<h2 class="font-cinzel text-3xl sm:text-4xl font-bold text-bone text-shadow-eldritch tracking-wider mb-4">
				LIVE FROM THE VOID
			</h2>
			<p class="text-bone/60 max-w-2xl mx-auto">
				Watch survivors battle through the darkness. Learn from the best, or witness their demise.
			</p>
		</div>

		<!-- Livestream Grid -->
		<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
			<div class="scroll-reveal" style="transition-delay: 0.1s;">
				<x-landing.livestream-card
					channel="survivor_one"
					title="Hardcore Permadeath Run - Day 7"
					viewers="1234"
					:isLive="true"
				/>
			</div>

			<div class="scroll-reveal" style="transition-delay: 0.15s;">
				<x-landing.livestream-card
					channel="void_walker"
					title="Boss Rush Challenge"
					viewers="856"
					:isLive="true"
				/>
			</div>

			<div class="scroll-reveal" style="transition-delay: 0.2s;">
				<x-landing.livestream-card
					channel="eldritch_gamer"
					title="New Player Guide"
					viewers="432"
					:isLive="true"
				/>
			</div>

			<div class="scroll-reveal" style="transition-delay: 0.25s;">
				<x-landing.livestream-card
					channel="death_dealer"
					title="PvP Tournament Finals"
					viewers="2156"
					:isLive="true"
				/>
			</div>
		</div>

		<!-- View All Button -->
		<div class="text-center scroll-reveal">
			<a href="https://twitch.tv/directory/game/Omega%20Realm" target="_blank" rel="noopener"
				class="btn btn-outline border-accent text-accent hover:bg-accent hover:text-accent-content font-semibold tracking-wide gap-2">
				<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
					<path d="M11.571 4.714h1.715v5.143H11.57zm4.715 0H18v5.143h-1.714zM6 0L1.714 4.286v15.428h5.143V24l4.286-4.286h3.428L22.286 12V0zm14.571 11.143l-3.428 3.428h-3.429l-3 3v-3H6.857V1.714h13.714z"/>
				</svg>
				View All Streams on Twitch
			</a>
		</div>
	</div>
</section>
