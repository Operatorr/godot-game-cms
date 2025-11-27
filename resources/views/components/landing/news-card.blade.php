@props([
	'title' => 'News Title',
	'date' => 'Dec 1, 2024',
	'excerpt' => 'News excerpt goes here...',
	'image' => null,
	'category' => 'Update',
	'link' => '#'
])

@php
	$categoryColors = [
		'Update' => 'badge-primary',
		'Event' => 'badge-secondary',
		'Dev Blog' => 'badge-accent',
		'Patch Notes' => 'badge-info',
	];
	$badgeClass = $categoryColors[$category] ?? 'badge-neutral';
@endphp

<article class="card bg-base-200 card-hover border-glow-blood overflow-hidden group">
	<!-- Image -->
	<figure class="relative h-48 overflow-hidden">
		@if($image)
			<img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
		@else
			<!-- Placeholder -->
			<div class="w-full h-full bg-gradient-to-br from-base-300 to-base-100 flex items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-bone/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2" />
				</svg>
			</div>
		@endif
		<!-- Category Badge -->
		<div class="absolute top-3 left-3">
			<span class="badge {{ $badgeClass }} badge-sm font-semibold">{{ $category }}</span>
		</div>
	</figure>

	<!-- Content -->
	<div class="card-body p-5">
		<!-- Date -->
		<time class="text-xs text-bone/50 uppercase tracking-wider">{{ $date }}</time>

		<!-- Title -->
		<h3 class="card-title text-lg font-cinzel text-bone group-hover:text-secondary transition-colors">
			<a href="{{ $link }}" class="hover:underline">{{ $title }}</a>
		</h3>

		<!-- Excerpt -->
		<p class="text-sm text-bone/70 line-clamp-2">{{ $excerpt }}</p>

		<!-- Read More -->
		<div class="card-actions justify-end mt-2">
			<a href="{{ $link }}" class="text-secondary hover:text-secondary/80 text-sm font-semibold flex items-center gap-1 transition-colors">
				Read More
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
				</svg>
			</a>
		</div>
	</div>
</article>
