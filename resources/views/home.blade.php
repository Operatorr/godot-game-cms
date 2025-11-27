@extends('layouts.app')

@section('content')
	<!-- Hero Section -->
	<x-landing.hero />

	<!-- News Section -->
	<x-landing.news-section />

	<!-- Livestreams Section -->
	<x-landing.livestreams-section />

	<!-- Features Section -->
	<section id="features" class="bg-base-300 py-8">
		<!-- Section Header -->
		<div class="text-center py-16 scroll-reveal">
			<h2 class="font-cinzel text-3xl sm:text-4xl lg:text-5xl font-bold text-bone text-shadow-blood tracking-wider mb-4">
				EMBRACE THE DARKNESS
			</h2>
			<p class="text-bone/60 max-w-2xl mx-auto text-lg">
				In the grim darkness of the Omega Realm, there is only the fight to survive.
			</p>
		</div>

		<!-- Feature 1: Bullet Hell Combat -->
		<x-landing.feature-section
			title="BULLET HELL COMBAT"
			description="Weave through cascading patterns of eldritch projectiles. Split-second reflexes separate the living from the dead. Master the dance of death or become another forgotten soul in the void."
			icon="bolt"
			delay="0.1s"
		/>

		<!-- Divider -->
		<div class="max-w-4xl mx-auto px-4">
			<div class="border-t border-primary/20"></div>
		</div>

		<!-- Feature 2: Permadeath Stakes -->
		<x-landing.feature-section
			title="PERMADEATH STAKES"
			description="Hardcore mode means permanent death. Your legend lives on the leaderboard—your character does not. Every decision carries weight. Every battle could be your last. There are no safety nets in the Omega Realm."
			icon="skull"
			:reverse="true"
			delay="0.15s"
		/>

		<!-- Divider -->
		<div class="max-w-4xl mx-auto px-4">
			<div class="border-t border-primary/20"></div>
		</div>

		<!-- Feature 3: Cutthroat Competition -->
		<x-landing.feature-section
			title="CUTTHROAT COMPETITION"
			description="Races and tournaments with real consequences. Will you cooperate with others, or put a knife in their back when they least expect it? Trust is a currency that can buy victory—or seal your doom."
			icon="fire"
			delay="0.2s"
		/>

		<!-- Divider -->
		<div class="max-w-4xl mx-auto px-4">
			<div class="border-t border-primary/20"></div>
		</div>

		<!-- Feature 4: Fast Progression -->
		<x-landing.feature-section
			title="FAST PROGRESSION, DEEP ENDGAME"
			description="Race to level cap. Then the real game begins: hunting rare gear, consuming permanent stat potions, and climbing the ladder. The strongest warriors carry scars from a hundred battles—those who don't carry graves."
			icon="rocket"
			:reverse="true"
			delay="0.25s"
		/>
	</section>

	<!-- Call to Action Section -->
	<section class="py-24 bg-gradient-to-b from-base-300 via-base-200 to-base-300 relative overflow-hidden">
		<!-- Background effects -->
		<div class="absolute inset-0 bg-gradient-radial from-primary/5 via-transparent to-transparent"></div>

		<div class="relative max-w-4xl mx-auto px-4 text-center scroll-reveal">
			<h2 class="font-cinzel text-3xl sm:text-4xl lg:text-5xl font-bold text-bone text-shadow-blood tracking-wider mb-6">
				YOUR DEATH HAS BEEN WRITTEN
			</h2>
			<p class="text-xl text-secondary mb-4 font-medium text-shadow-gold">
				Prove it wrong.
			</p>
			<p class="text-bone/60 max-w-2xl mx-auto mb-10 text-lg">
				Join thousands of survivors in the battle for existence.
				The old gods are hungry. Feed them your enemies—or become the feast.
			</p>

			<div class="flex flex-col sm:flex-row gap-4 justify-center">
				<a href="https://store.steampowered.com" target="_blank" rel="noopener"
					class="btn btn-primary btn-lg gap-3 glow-blood font-semibold tracking-wide animate-pulse-glow">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
						<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
					</svg>
					Wishlist on Steam
				</a>
				<a href="/register" class="btn btn-secondary btn-lg font-semibold tracking-wide">
					Create Account
				</a>
			</div>

			<!-- Tagline -->
			<p class="mt-12 text-bone/40 text-sm italic">
				"In the Omega Realm, there is only war. And what comes after."
			</p>
		</div>
	</section>
@endsection

@push('scripts')
	<script>
		// Smooth scroll for anchor links
		document.querySelectorAll('a[href^="#"]').forEach(anchor => {
			anchor.addEventListener('click', function (e) {
				e.preventDefault();
				const target = document.querySelector(this.getAttribute('href'));
				if (target) {
					target.scrollIntoView({
						behavior: 'smooth',
						block: 'start'
					});
				}
			});
		});
	</script>
@endpush
