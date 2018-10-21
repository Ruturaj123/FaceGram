@extends('master')

@section('title')
Messages
@endsection

@section('content')
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
            <form action="{{ route('.create') }}" method="post">
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

        <img class="card-header card-header-success ml-auto mr-auto" src="{{ asset('img/avatar_man.png') }}" style="border-radius: 50%;" width="100px" height="100px">
        <div class="card-body">
         <i class="material-icons">settings</i>Settings<br>
         <i class="material-icons">notifications</i>Notifications<br>

       </div>
     </div>
   </div>
 </div>


@endsection

