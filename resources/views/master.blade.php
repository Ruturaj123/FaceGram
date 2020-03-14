<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>
		Miniproject
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link href="{{ secure_asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ secure_asset('css/mdb.min.css') }}" rel="stylesheet">
	<link href="{{ secure_asset('css/material-kit.css?v=2.0.4') }}" rel="stylesheet">
	<link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
	<nav class="navbar bg-danger fixed-top navbar-expand-lg" id="sectionsNav">
		<div class="container">
			<div class="navbar-translate">
				<a class="navbar-brand" href="/home">FaceGram</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="sr-only">Toggle navigation</span>
					<span class="navbar-toggler-icon"></span>
					<span class="navbar-toggler-icon"></span>
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse">

				<form class="form-inline ml-auto" action="{{ route('search') }}">
					<div class="form-group no-border">
						<input name="search_input" type="text" class="form-control" placeholder="Search">
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
					{{-- <button data-toggle="modal" data-target="#notificationsModal" class="btn btn-white btn-just-icon btn-round">
						<i class="fas fa-bell" ></i>
					</button>
					--}}
					<li class="nav-item">
						<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="{{ route('message') }}" data-original-title="Messages">
							<i class="material-icons">chat</i>
						</a>
					</li>
					<li class="nav-item">
						<a id="loadLink" class="nav-link" data-toggle="modal" data-target="#notificationsModal" rel="tooltip" title="" data-placement="bottom" href="#" data-original-title="Notifications">
							<i class="fa fa-bell"></i>
						</a>
					</li>
					<a style="color: white;" class="nav-link" rel="tooltip" title="" data-placement="bottom" href="{{ route('profile') }}" data-original-title="View your Profile">
						<i class="material-icons" style="color: white;">person</i> {{ Auth::user()->name}}
					</a>

					{{-- <li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							Settings <span class="caret"></span>
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
				</li> --}}
				<li class="dropdown nav-item">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fa fa-gears"></i> Settings
					</a>
					<div class="dropdown-menu dropdown-with-icons">

						<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="material-icons">logout</i> Logout
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

<div class="modal" tabindex="-1" role="dialog" id="notificationsModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Notifications</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="notifsLoaded"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ secure_asset('js/core/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/core/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/core/bootstrap-material-design.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/plugins/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/plugins/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/plugins/nouislider.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/plugins/jquery.sharrre.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script type="text/javascript" src="{{ secure_asset('js/material-kit.js?v=2.0.4') }}"></script>

<div class="container-fluid">
	@yield('content')
</div>
<!--   Core JS Files   -->
{{-- <script type="text/javascript" src="{{ secure_asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/mdb.min.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ secure_asset('js/jquery-3.3.1.min.js') }}"></script> --}}


<script type="text/javascript">

	function acceptRequest(friendName) {
		console.log(friendName);
		document.getElementById(friendName).style.display = 'none';
		var name = friendName.split('-')[1];
		$.ajax({
                  url: 'accept-request/' + `{{ Auth::user()->id }}` + '/' + name,
                  method: 'get',
                  success: function(result){
                     console.log(result);
                     document.getElementById('requestBlock-' + name).style.display = 'none';
                  }

              });	
	}

	$('#loadLink').click(function(e) {
		e.preventDefault();
		var id = `{{ route('notifications', Auth::user()->id) }}`;
		$.ajax({
                  url: `{{ route('notifications', Auth::user()->id ) }}`,
                  method: 'get',
                  success: function(result){
                     console.log(result);
                     $('#notifsLoaded').html('');
                     var notifs = '';
                     for(var i = 0; i < result.notif.length; i++){
                     	notifs += '<div id="requestBlock-' + result.notif[i] + '" class="card card-body" style="display: inline-block;">' + result.notif[i] + ' sent you a request <button id="accept-' + result.notif[i] + '" onclick="acceptRequest(this.id)" style"float: right;" class="btn btn-success btn-fab btn-fab-mini btn-round"><i class="fas fa-check"></i></button></div>';
                     }
                     console.log(notifs);
                     $('#notifsLoaded').html(notifs);
                  }

              });	
	});
		
</script>
</body>

</html>
