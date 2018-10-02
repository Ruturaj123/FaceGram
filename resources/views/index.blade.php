<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login/Register</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!--Navbar-->
  <!-- <nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="basicExampleNav">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="" data-toggle="modal" data-target="#modalLogin">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="" data-toggle="modal" data-target="#modalSignUp">SignUp</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>

      </ul>

      <form class="form-inline">
        <div class="md-form my-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        </div>
      </form>
    </div>

  </nav> -->
  <!--/.Navbar-->

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
            <h4 class="white-text my-4">SignUp or Login to meet new people.</h4>
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

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
