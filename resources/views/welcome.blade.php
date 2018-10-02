
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login/Register</title>
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/material-kit.css?v=2.0.4') }}" rel="stylesheet">
</head>

<body>

  <div class="view" id="intro">
    <div class="mask rgba-black-strong">

      <div class="container-fluid d-flex align-items-center justify-content-center h-100">

        <div class="row d-flex justify-content-center text-center">

          <div class="col-md-10">

            <!-- Heading -->
            <h2 class="display-4 font-weight-bold white-text pt-5 mb-2">FaceGram</h2>

            <!-- Divider -->
            <hr class="hr-light">

            <!-- Description -->
            <h4 class="white-text font-weight-bold my-4">Share. Grow. Connect.</h4>
            <h4 class="white-text my-4">SignUp or Login to meet new people</h4>
            <div class="row d-flex justify-content-center text-center">
              <!-- <span class="col-xs-4">
                <button type="button" class="btn btn-outline-white" data-toggle="modal" data-target="#modalLogin">Login<i class="fa fa-sign-in-alt ml-2"></i></button>
              </span> -->
              <button class="btn btn-round btn-white" data-toggle="modal" data-target="#signupModal">
                Signup <i class="material-icons">person_add</i>
              </button>
              <button class="btn btn-round btn-white" data-toggle="modal" data-target="#loginModal">
                Login<i class="material-icons">person</i>
              </button>
            </div>

          </div>

        </div>

      </div>


      <div class="modal fade" id="signupModal" tabindex="-1" role="">
        <div class="modal-dialog modal-login" role="document">
          <div class="modal-content">
            <div class="card card-signup card-plain">
              <div class="modal-header">
                <div class="card-header card-header-primary text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                  <h4 class="card-title">Sign Up</h4>
                  <div class="social-line">
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-google-plus"></i>
                      <div class="ripple-container"></div></a>
                    </div>
                  </div>
                </div>
                <div class="modal-body">
                  <form class="form" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body">

                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">face</i>
                          </span>
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>

                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">email</i>
                          </span>
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>

                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                          </span>
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>

                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                          </span>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                      </div>
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                    
                  </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>

      <div class="modal fade" id="loginModal" tabindex="-1" role="">
        <div class="modal-dialog modal-login" role="document">
          <div class="modal-content">
            <div class="card card-signup card-plain">
              <div class="modal-header">
                <div class="card-header card-header-primary text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                  <h4 class="card-title">Login</h4>
                  <div class="social-line">
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-google-plus"></i>
                      <div class="ripple-container"></div></a>
                    </div>
                  </div>
                </div>
                <div class="modal-body">
                  <form class="form" method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="card-body">

                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">email</i>
                          </span>
                          
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>

                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                          </span>
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                      </div>
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                    
                  </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
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
