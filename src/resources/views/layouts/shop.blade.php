<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="{{ mix('css/app.css') }}" rel="stylesheet">
		@stack('styles')
		<title>{{ config('app.name') }} - @yield('title')</title>
    </head>
	</head>
	<body>
		<div class="container py-3">
			@include('partials.header', ['menu' => $menu])
			<main>
				@yield('content')
			</main>
			@include('partials.footer')
		</div>
	</body>
	<script src="{{ mix('js/app.js') }}"></script>
	@stack('scripts')
</html>