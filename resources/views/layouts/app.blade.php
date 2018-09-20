<!doctype html>
<html lang="en">
<head>
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">  
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="@yield('meta_description','Здесь Вы увидите различную информацию, которая Вам скорее всего не пригодится.')">
	<meta name="keywords" content="@yield('meta_keywords','Life, Blog, WEB, Laravel, PHP, HTML, VPS, Блог, Жизнь')">
	<meta name="author" content="Charlz Vard">
	
	<link rel="canonical" href="https://dagon.su"/>
	
	<!-- For IE 9 and below. ICO should be 32x32 pixels in size -->
	<!--[if IE]><link rel="shortcut icon" href="{{ asset('/favicon-32x32.png') }}"><![endif]-->
	<!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. --> 
	<link rel="apple-touch-icon-precomposed" href="{{ asset('/apple-touch-icon-180x180.png') }}">
	<!-- Firefox, Chrome, Safari, IE 11+ and Opera. 196x196 pixels in size. -->
	<link rel="icon" href="{{ asset('/favicon-32x32.png') }}">
	
	<!-- Bootstrap CSS & Font Awesome JS -->
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" crossorigin="anonymous">
	{{-- <script defer src="{{ asset('/js/fontawesome.min.js') }}" crossorigin="anonymous"></script> --}}
	<!-- User style -->	
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}" crossorigin="anonymous">
	
	<title>@yield('title','Блог товарища C.V., в котором он хранит свои мысли')</title>
</head>
<body>
	
	<div id="app">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item{{{ Request::is('/') ? ' active' : '' }}}">
						<a class="nav-link" href="{{ url('/') }}">Главная</a>
					</li>
					<li class="nav-item{{{ Request::is('article*') ? ' active' : '' }}}">
						<a class="nav-link" href="{{ route('articles') }}">Статьи</a>
					</li>
					<li class="nav-item{{{ Route::is('about') ? ' active' : '' }}}">
						<a class="nav-link" href="{{ route('about') }}">О проекте</a>
					</li>
				</ul>
				<ul class="navbar-nav mr-right">
					@guest
					<li class="nav-item{{{ Route::is('about') ? ' active' : '' }}}">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					{{-- <li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li> --}}
					@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ Auth::user()->name }}
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('admin.index') }}">AsAdmin</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
				@endguest
			</ul>
			
		</div>
	</nav>
	<main class="py-4">
		@yield('content')
	</main>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('/js/jquery-3.3.1.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('/js/popper.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
</body>
</html>