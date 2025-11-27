@props([
	'channel' => 'streamer_name',
	'title' => 'Playing Omega Realm',
	'viewers' => '0',
	'isLive' => false,
	'thumbnail' => null
])

<div class="card bg-base-200 card-hover overflow-hidden group">
	<!-- Thumbnail -->
	<figure class="relative aspect-video overflow-hidden">
		@if($thumbnail)
			<img src="{{ $thumbnail }}" alt="{{ $channel }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
		@else
			<!-- Placeholder -->
			<div class="w-full h-full bg-gradient-to-br from-accent/20 to-base-300 flex items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-accent/40" fill="currentColor" viewBox="0 0 24 24">
					<path d="M11.571 4.714h1.715v5.143H11.57zm4.715 0H18v5.143h-1.714zM6 0L1.714 4.286v15.428h5.143V24l4.286-4.286h3.428L22.286 12V0zm14.571 11.143l-3.428 3.428h-3.429l-3 3v-3H6.857V1.714h13.714z"/>
				</svg>
			</div>
		@endif

		<!-- Live Badge -->
		@if($isLive)
			<div class="absolute top-2 left-2">
				<span class="badge badge-error badge-sm gap-1 font-bold">
					<span class="w-2 h-2 rounded-full bg-error-content animate-pulse"></span>
					LIVE
				</span>
			</div>
		@else
			<div class="absolute top-2 left-2">
				<span class="badge badge-neutral badge-sm font-semibold">OFFLINE</span>
			</div>
		@endif

		<!-- Viewer Count -->
		@if($isLive)
			<div class="absolute bottom-2 right-2">
				<span class="badge badge-neutral badge-sm gap-1">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
					</svg>
					{{ number_format((int)$viewers) }}
				</span>
			</div>
		@endif

		<!-- Hover Overlay -->
		<div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors flex items-center justify-center">
			<div class="opacity-0 group-hover:opacity-100 transition-opacity">
				<div class="w-12 h-12 rounded-full bg-accent flex items-center justify-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent-content ml-0.5" fill="currentColor" viewBox="0 0 24 24">
						<path d="M8 5v14l11-7z"/>
					</svg>
				</div>
			</div>
		</div>
	</figure>

	<!-- Content -->
	<div class="card-body p-4">
		<!-- Channel Name -->
		<a href="https://twitch.tv/{{ $channel }}" target="_blank" rel="noopener"
			class="font-semibold text-bone hover:text-accent transition-colors truncate">
			{{ $channel }}
		</a>

		<!-- Stream Title -->
		<p class="text-sm text-bone/60 truncate">{{ $title }}</p>
	</div>
</div>
