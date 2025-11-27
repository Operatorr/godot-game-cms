@props([
	'title' => 'Feature Title',
	'description' => 'Feature description goes here.',
	'reverse' => false,
	'icon' => 'bolt',
	'video' => null,
	'delay' => '0s'
])

@php
	$icons = [
		'bolt' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />',
		'skull' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 9.75l.92 2.68a1.5 1.5 0 002.66 0l.92-2.68m-4.5 0A1.5 1.5 0 1112 6a1.5 1.5 0 01-2.25 3.75zm4.5 0A1.5 1.5 0 1112 6a1.5 1.5 0 012.25 3.75zM12 21a9 9 0 110-18 9 9 0 010 18z" />',
		'swords' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z" />',
		'rocket' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />',
		'fire' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />',
		'shield' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />',
	];
	$iconPath = $icons[$icon] ?? $icons['bolt'];
@endphp

<div class="py-16 lg:py-24 {{ $reverse ? 'scroll-reveal-right' : 'scroll-reveal-left' }}" style="transition-delay: {{ $delay }};">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col {{ $reverse ? 'lg:flex-row-reverse' : 'lg:flex-row' }} gap-8 lg:gap-16 items-center">
			<!-- Text Content -->
			<div class="flex-1 space-y-6 text-center {{ $reverse ? 'lg:text-right' : 'lg:text-left' }}">
				<!-- Icon -->
				<div class="inline-flex items-center justify-center w-16 h-16 rounded-lg bg-primary/20 border border-primary/30">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						{!! $iconPath !!}
					</svg>
				</div>

				<!-- Title -->
				<h3 class="font-cinzel text-2xl sm:text-3xl lg:text-4xl font-bold text-bone tracking-wide">
					{{ $title }}
				</h3>

				<!-- Description -->
				<p class="text-lg text-bone/70 leading-relaxed max-w-lg {{ $reverse ? 'lg:ml-auto' : '' }}">
					{{ $description }}
				</p>

				<!-- Optional slot for additional content -->
				{{ $slot }}
			</div>

			<!-- Video/Image Container -->
			<div class="flex-1 w-full max-w-xl lg:max-w-none">
				<div class="relative rounded-lg overflow-hidden border-glow-blood">
					@if($video)
						<div class="video-container">
							<video autoplay loop muted playsinline class="w-full h-full object-cover">
								<source src="{{ $video }}" type="video/mp4">
							</video>
						</div>
					@else
						<!-- Placeholder -->
						<div class="aspect-video bg-gradient-to-br from-base-300 via-base-200 to-base-300 flex items-center justify-center relative overflow-hidden">
							<!-- Animated background pattern -->
							<div class="absolute inset-0 opacity-20">
								<div class="absolute inset-0 bg-gradient-to-r from-primary/20 via-transparent to-accent/20 animate-pulse"></div>
							</div>

							<div class="relative text-center space-y-3">
								<div class="w-16 h-16 mx-auto rounded-full bg-base-100/50 flex items-center justify-center">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-bone/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
									</svg>
								</div>
								<p class="text-bone/40 text-sm">Gameplay Video Coming Soon</p>
							</div>
						</div>
					@endif

					<!-- Decorative corner accents -->
					<div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-primary/50"></div>
					<div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-primary/50"></div>
					<div class="absolute bottom-0 left-0 w-8 h-8 border-b-2 border-l-2 border-primary/50"></div>
					<div class="absolute bottom-0 right-0 w-8 h-8 border-b-2 border-r-2 border-primary/50"></div>
				</div>
			</div>
		</div>
	</div>
</div>
