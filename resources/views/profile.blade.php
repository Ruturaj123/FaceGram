<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    FaceGram Profile
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

<body class="profile-page sidebar-collapse">
  <div class="container-fluid">
  	<nav class="navbar bg-danger navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="101" id="sectionsNav">
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
</div>

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


<div class="page-header header-filter" data-parallax="true" style="background-image: url({{ URL::secure_asset('img/city-profile.jpg') }});" id="CoverPhoto"></div>
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile">
            <div class="avatar">
              @if($user[0]->profile_pic != null)
              <img class="ml-auto mr-auto" src="{{ secure_asset('storage/upload/' + $user[0]->profile_pic) }}" style="border-radius: 50%;"height="150px">
              @else
              <img class="ml-auto mr-auto" src="{{ secure_asset('img/avatar_man.png') }}" style="border-radius: 50%;"height="150px">
              @endif
              @if($root)
              <div class="upload-btn-wrapper">
                  <button onclick="updateProfile();" type="submit" class="btn btn-primary btn-just-icon btn-round"><i class="material-icons">file_upload</i></button>
                  <input id="profilePhotoInput" type="file" name="profilePhoto" />
                </div>
              @endif
            </div>
            <div class="name">
              <br>
              <h3 class="title">{{ $user[0]->name }}</h3>
              <h5 id="WhoAreYou"><a href="#" onclick="Edit()">Designer</a></h5>
              <a href="#" class="btn btn-just-icon btn-link btn-school" target="_blank" data-original-title="Education" onclick="Do()"><i class="material-icons">school</i></a>
              <a href="#" class="btn btn-just-icon btn-link btn-birthday" data-original-title="Birthdate" onclick="Do()"><i class="fa fa-birthday-cake"></i></a>
              <!-- <a href="#" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a> -->
            </div>
          </div>
        </div>
      </div>
        <!-- <div class="container" style="padding: 10px;">
            <div class="card card-nav-tabs">
                <div class="card-header card-header-danger">
                  <center>
                    <h4 class="card-title">What's on your mind ?</h4></center>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group no-border">
                      <input type="text" class="form-control" placeholder="Write Something...">
                    </div>
                  </form>
                  <div class="row">
                    <div class="col-md-2">
                      <a href="#0" class="btn btn-primary">Post</a>
                    </div>
                    <div class="col-md-2 ml-auto">
                      <button class="btn btn-primary btn-just-icon btn-round"><i class="material-icons">file_upload</i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-6 ml-auto mr-auto">
                <div class="profile-tabs">
                  <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                        <i class="material-icons">collections</i> Collections
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                        <i class="material-icons">camera</i> Uploads
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                        <i class="material-icons">favorite</i> Favorite
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="tab-content tab-space">
              <div class="tab-pane active text-center gallery" id="studio">
                <div class="row">
              {{-- <div class="col-md-3 ml-auto">
                <img src="{{ secure_asset('img/examples/studio-1.jpg') }}" class="rounded" data-original-title="View" alt="Image" id="img1">
                <!-- Modal-->
                <div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img01">
                  <div id="caption"></div>
                </div>
                <!-- Modal Ends -->
                <img src="{{ secure_asset('img/examples/studio-2.jpg') }}" class="rounded">
              </div> --}}
              @foreach($posts as $post)
              @if($post->image_name)
              <div class="col-md-3">
                <img src="{{ secure_asset('storage/upload/'.$post->image_name) }}" style="cursor: pointer;" class="rounded">
              </div>
              @endif
              @endforeach
            </div>
          </div>
         {{--  <div class="tab-pane text-center gallery" id="works">
            <div class="row">
              <div class="col-md-3 ml-auto">
                <img src="{{ secure_asset('img/examples/olu-eletu.jpg') }}" class="rounded">
                <img src="{{ secure_asset('img/examples/clem-onojeghuo.jpg') }}" class="rounded">
                <img src="{{ secure_asset('img/examples/cynthia-del-rio.jpg') }}" class="rounded">
              </div>
              <div class="col-md-3 mr-auto">
                <img src="{{ secure_asset('img/examples/mariya-georgieva.jpg') }}" class="rounded">
                <img src="{{ secure_asset('img/examples/clem-onojegaw.jpg') }}" class="rounded">
              </div>
            </div>
          </div> --}}
          {{-- <div class="tab-pane text-center gallery" id="favorite">
            <div class="row">
              <div class="col-md-3 ml-auto">
                <img src="{{ secure_asset('img/examples/mariya-georgieva.jpg') }}" class="rounded">
                <img src="{{ secure_asset('img/examples/studio-3.jpg') }}" class="rounded">
              </div>
              <div class="col-md-3 mr-auto">
                <img src="{{ secure_asset('img/examples/clem-onojeghuo.jpg') }}" class="rounded">
                <img src="{{ secure_asset('img/examples/olu-eletu.jpg') }}" class="rounded">
                <img src="{{ secure_asset('img/examples/studio-1.jpg') }}" class="rounded">
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

  <div class="container" style="padding-top: 20px;text-align: center;">
    <div class="col-md-12">
      <div class="card" style="padding: 20px;">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Posts</h4>
        </div>
        @foreach($posts as $post)
          @if($post->body)
        <div class="card card-body">
          <p class="card-text"><b>{{ $post->body }}</b></p>
          <p class="card-text"><small class="text-muted">Posted on {{ $post->created_at }}</small></p>
        </div>
        @endif
        @endforeach
      </div>
    </div>



    <!-- Modal Goes Here -->
    <!-- Modal Ends Here-->
    <footer class="footer footer-default">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="#">
                Aayush Jain
              </a>
            </li>
            <li>
              <a href="#">
                About Us
              </a>
            </li>
            <li>
              <a href="#">
                Blog
              </a>
            </li>
            <li>
              <a href="#">
                Licenses
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="material-icons">favorite</i> by
          <a href="#" target="_blank">FaceGram Team</a> for a better Social Network.
        </div>
      </div>
    </footer>

{{--     <script>
    // Get the modal
    var modal = document.getElementById('myModal');
    
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('img1');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
    }
  </script> --}}

  <script type="text/javascript" src="{{ secure_asset('js/core/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/core/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/core/bootstrap-material-design.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/plugins/moment.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/plugins/bootstrap-datetimepicker.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/plugins/nouislider.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/plugins/jquery.sharrre.js') }}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script type="text/javascript" src="{{ secure_asset('js/material-kit.js?v=2.0.4') }}"></script>
  <script type="text/javascript">

    function updateProfile() {
      var input = $('#profilePhotoInput').val();
      input = input.split('\\')[2];
      console.log(input);
      $.ajax({
        url: 'update-profile-pic/' + input,
        method: 'get',
        success: function(result){
         console.log(result);
        //  $('#notifsLoaded').html('');
        //  var notifs = '';
        //  for(var i = 0; i < result.notif.length; i++){
        //   notifs += '<div class="card card-body" style="display: inline-block;">' + result.notif[i] + ' sent you a request <button style"float: right;" class="btn btn-success btn-fab btn-fab-mini btn-round"><i class="fas fa-check"></i></button></div>';
        // }
        // console.log(notifs);
        // $('#notifsLoaded').html(notifs);
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
          notifs += '<div class="card card-body" style="display: inline-block;">' + result.notif[i] + ' sent you a request <button style"float: right;" class="btn btn-success btn-fab btn-fab-mini btn-round"><i class="fas fa-check"></i></button></div>';
        }
        console.log(notifs);
        $('#notifsLoaded').html(notifs);
      }

    }); 
    });
    
  </script>
</body>

</html>

