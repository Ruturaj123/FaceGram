@extends('layouts.master')
@section('title')
	Welcome!
@endsection
@section('content')
	<!--<div class="row">
		<div class="col-md-6">
			<h3>Sign-Up</h3>
			<form action="{{ route('signup') }}" method="post">
				<div class="form-group">
					<label for="email">E-mail</label>
					<input class="form-control" type="text" name="email" id="email">
					
				</div>
				<div class="form-group">
					<label for="first_name">Your Firstname</label>
					<input class="form-control" type="text" name="first_name" id="first_name">
				</div>
				<div class="form-group">
					<label for="password">Your Password</label>
					<input class="form-control" type="password" name="password" id="password">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				<input type="hidden" name="_token" value="{{Session::token() }}">
			</form>
		</div>
		<div class="col-md-6">
			<h3>Sign-in</h3>
			<form action="{{ route('signin') }}" method="post">
				<div class="form-group">
					<label for="email">E-mail</label>
					<input class="form-control" type="text" name="email" id="email">
					
				</div>
				
				<div class="form-group">
					<label for="password">Your Password</label>
					<input class="form-control" type="password" name="password" id="password">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				<input type="hidden" name="_token" value="{{Session::token() }}">
			</form>
		</div>
	</div>-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
	<div class="view" id="intro" style="background-image: url('img/facegrambackground.jpeg')">
    <div class="mask rgba-black-strong">

      <div class="container-fluid d-flex align-items-center justify-content-center h-100">

        <div class="row d-flex justify-content-center text-center">

          <div class="col-md-10">

            <!-- Heading -->
            <h2 class="display-4 font-weight-bold white-text pt-5 mb-2">FaceGram</h2>

            <!-- Divider -->
            <hr class="hr-light">

            <!-- Description -->
            <h4 class="white-text my-4">Share.Grow.Connect.SignUp or Login to meet new people</h4>
            <div class="row d-flex justify-content-center text-center">
              <span class="col-xs-4">
                <button type="button" class="btn btn-outline-white" data-toggle="modal" data-target="#modalLogin">Login<i class="fa fa-sign-in-alt ml-2"></i></button>
              </span>
              <span class="col-xs-4">
                <button type="button" class="btn btn-white waves-effect" data-toggle="modal" data-target="#modalSignUp">SignUp<i class="fa fa-user-plus ml-2"></i></button>
              </span>
            </div>
          </div>

        </div>

      </div>

      <div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!--Modal: Contact form-->
        <div class="modal-dialog cascading-modal" role="document">
          <!--Content-->
          <div class="modal-content">

            <!--Header-->
            <div class="modal-header light-blue darken-3 white-text">
              <h4 class="title"><i class="fa fa-user-plus"></i> SignUp</h4>
              <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
            </div>
            <!--Body-->
            <div class="modal-body mb-0">
              <div class="md-form form-sm">
                <i class="fa fa-user prefix"></i>
                <input type="text" id="form8" class="form-control">
                <label for="form8">Your name</label>
              </div>

              <div class="md-form form-sm">
                <i class="fa fa-envelope prefix"></i>
                <input type="password" id="form9" class="form-control">
                <label for="form9">Your email</label>
              </div>

              <div class="md-form form-sm">
                <i class="fa fa-lock prefix"></i>
                <input type="password" id="form10" class="form-control">
                <label for="form10">password</label>
              </div>

              <div class="text-center mt-1-half">
                <button class="btn btn-info mb-2">Sign Up <i class="fas fa-paper-plane ml-1"></i></button>
              </div>

            </div>
          </div>
          <!--/.Content-->
        </div>
        <!--/Modal: Contact form-->
      </div>

      <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!--Modal: Subscription-->
        <div class="modal-dialog cascading-modal" role="document">
          <!--Content-->
          <div class="modal-content">

            <!--Header-->
            <div class="modal-header light-blue darken-3 white-text">
              <h4 class="title"><i class="fa fa-sign-in-alt"></i> Login</h4>
              <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
            </div>
            <!--Body-->
            <div class="modal-body mb-0">

              <div class="md-form form-sm">
                <i class="fas fa-envelope prefix"></i>
                <input type="text" id="form17" class="form-control">
                <label for="form17">Your email</label>
              </div>

              <div class="md-form form-sm">
                <i class="fas fa-lock prefix"></i>
                <input type="password" id="form16" class="form-control">
                <label for="form16">Password</label>
              </div>

              <div class="text-center mt-1-half">
                <button class="btn btn-info mb-1">Login <i class="fas fa-paper-plane ml-1"></i></button>
              </div>

            </div>
          </div>
          <!--/.Content-->
        </div>
        <!--/Modal: Subscription-->
      </div>
    </div>
  </div>

@endsection