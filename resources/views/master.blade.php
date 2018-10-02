<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Miniproject
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/material-kit.css?v=2.0.4') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-expand-lg bg-danger">
		<div class="container">
			<div class="navbar-translate">
				<a class="navbar-brand" href="#">FaceGram</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            </button>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a href="#pablo" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="#pablo" class="nav-link">link</a>
					</li>
				</ul>

				<form class="form-inline ml-auto">
					<div class="form-group no-border">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-white btn-just-icon btn-round">
                    <i class="material-icons">search</i>
                </button>
				</form>

				<ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
		</div>
	</nav>

	<div class="container-fluid">
		@yield('content')
	</div>
	<!--   Core JS Files   -->
	<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/core/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/core/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/plugins/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/plugins/nouislider.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/plugins/jquery.sharrre.js') }}"></script>
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<script type="text/javascript" src="{{ asset('js/material-kit.js?v=2.0.4') }}"></script>
</body>

</html>
