<!doctype html>
<html lang="en">
  <head>
    <title>Messages</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--  Fonts and icons  -->
      <!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Material Kit CSS -->
    <link href="{{ secure_asset('css/material-kit.css?v=2.0.4') }}" rel="stylesheet">
  <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
  </head>
  <body style="margin: 75px 50px 75px 50px;">
    <center>
    <div class="row">
      <div class="col-md-2">
      <div class="card">
          <div class="card-header card-header-text card-header-rose">
            <div class="card-text">
              <i class="material-icons">face</i>
              <h4 class="card-title">Online Friends</h4>
            </div>

          </div>
          <div>

            <ul class="list-group list-group-flush">

          <li class="list-group-item">Aayush Jain</li>
          <li class="list-group-item">Vidhi Doshi</li>
          <li class="list-group-item">Ruturaj Gujar</li>
        </ul>
      </div>


          </div>
      </div>
  
  <div class="col-md-8">
      <div class="card">
          <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
              <i class="material-icons">message</i>
              <h4 class="card-title">Messenger</h4>
            </div>
          </div>
          <div class="card-body">
              Say Hi! to start the conversation
              <div class="card">
  <div class="card-body">
    This is some text within a card body.
  </div>
</div>
<div class="card">
  <div class="card-body">
    This is some text within a card body.
  </div>
</div>
<div class="card">
  <div class="card-body">
    This is some text within a card body.
  </div>
</div>
<div class="card">
  <div class="card-body">
    This is some text within a card body.
  </div>
</div>
<div class="card-body">
            <form method="post">
              <div class="form-group no-border">
                
                <input type="text" name="body" id="new-post" class="form-control" placeholder="Write hi to start the conversation...">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
              <div class="row">
             
              
              <input type="hidden" value="{{ Session::token() }}" name="_token">
            </div>
            </form>
            
          </div>
          </div>
      </div>
  </div>
 <div class="col-md-2">
        <div class="card">
          
          <img class="card-header card-header-success ml-auto mr-auto" src="{{ secure_asset('img/avatar_man.png') }}" style="border-radius: 50%;" width="100px" height="100px">
          <div class="card-body">
           <i class="material-icons">settings</i>Settings<br>
            <i class="material-icons">notifications</i>Notifications<br>

          </div>
        </div>
      </div>
    </div>
     
      </center>
<!--   Core JS Files   -->
<script type="text/javascript" src="{{ secure_asset('js/core/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/core/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/core/bootstrap-material-design.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/plugins/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/plugins/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/plugins/nouislider.min.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/plugins/jquery.sharrre.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script type="text/javascript" src="{{ secure_asset('js/material-kit.js?v=2.0.4') }}"></script>
</html>