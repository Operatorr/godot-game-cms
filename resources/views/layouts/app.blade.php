<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="grimdark">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Omega Realm - A grimdark bullet-hell multiplayer shooter where cosmic horrors and permadeath collide in a dying universe that offers no mercy and no salvation.">
	<meta name="keywords" content="Omega Realm, bullet hell, roguelike, multiplayer, shooter, grimdark, cosmic horror, permadeath">

	<title>{{ $title ?? 'Omega Realm - Enter the Void' }}</title>

	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" href="/favicon.svg" type="image/svg+xml">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	@livewireStyles
	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<script>
		// Theme management
		window.themeState = window.themeState || {
			preservedTheme: 'grimdark'
		};
	</script>
</head>

<body class="bg-base-300 min-h-screen font-rajdhani text-base-content">
	<x-landing.top-bar />
	@include('layouts.nav')

	<main>
		@yield('content')
	</main>

	<x-landing.footer />

	@livewireScriptConfig
	@stack('scripts')

	<script>
		// Scroll reveal initialization
		document.addEventListener('DOMContentLoaded', function() {
			const observerOptions = {
				threshold: 0.1,
				rootMargin: '0px 0px -50px 0px'
			};

			const observer = new IntersectionObserver((entries) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						entry.target.classList.add('revealed');
					}
				});
			}, observerOptions);

			document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right').forEach(el => {
				observer.observe(el);
			});
		});
	</script>
</body>

</html>
