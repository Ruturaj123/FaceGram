@extends('master')

@section('title')
Messages
@endsection

@section('content')
<script type="text/javascript">
  var friendName = '';

  function startChat(btnId) {
      console.log("Inside " + btnId);
      friendName = btnId.split('-')[1];
      console.log(friendName);
      $('#top-status').text('Chatting with ' + friendName);
      $.ajax({
        url: '/get-message/' + {{ Auth::user()->id }} + '/' + friendName,
        method: 'get',
        success: function(result){
         console.log(result);
         $('#messagesLoaded').html('');
         var messages = '';
         for(var i = 0; i < result.messages.length; i++){
          if(result.messages[i].sender_user_id == `{{ Auth::user()->id }}`)
            messages += '<div class="card card-body" style="display: inline-block;"><strong>You: </strong>' + result.messages[i].message + '</div>';
          else
            messages += '<div class="card card-body" style="display: inline-block;"><strong>' + friendName + ': </strong>' + result.messages[i].message + '</div>';
        }
        console.log(messages);
        $('#messagesLoaded').html(messages);
      }  

    });
    }

  $(document).ready(function(){
    // $('#friend-1').click(function(e) {
      
    // });

    $('#sendMsg').click(function(e) {
      var message = $('#msg').val();
      $('#msg').val('');
      if(!message)
        message = 'not there';
      console.log(message);
      e.preventDefault();
      if(!message)
        message = '';
      console.log(message);
      $.ajax({
        url: '/send-message/' + {{ Auth::user()->id }} + '/' + friendName + '/' + message,
        method: 'get',
        success: function(result){
         console.log(result);
         var msgHTML = '<div class="card card-body" style="display: inline-block;"><strong>You: </strong>' + message + '</div>';

         $('#messagesLoaded').append(msgHTML);
      }  

    });
    });

  });

  $.ajax({
    url: `{{ route('friendList', Auth::user()->id ) }}`,
    method: 'get',
    success: function(result){
     console.log(result);
     $('#friendLoaded').html('');
     var friends = '';
     for(var i = 0; i < result.friends.length; i++){
      friends += '<button id="friend-' + result.friends[i] + '" class="btn btn-primary" onclick="startChat(this.id);">' + result.friends[i] + '</button>';
    }
    console.log(friends);
    $('#friendLoaded').html(friends);
  }  
});

  

</script>
<div class="row" style="text-align: center; margin-top: 100px;">
  <div class="col-md-2">
    <div class="card">
      <div class="card-header card-header-text card-header-rose">
        <div class="card-text">
          <i class="material-icons">face</i>
          <h4 class="card-title">Friend List</h4>
        </div>

      </div>
      <div id="friendLoaded">

          {{-- <ul class="list-group list-group-flush">

            <li class="btn btn-success list-group-item">Aayush Jain</li>
            <li class="btn btn-success list-group-item">Vidhi Doshi</li>
            <li class="btn btn-success list-group-item">Ruturaj Gujar</li>
          </ul> --}}
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
          <div class="card card-body" >
            <p id="top-status">Click on a friend to start the chat!</p>
          </div>

          <div id="messagesLoaded"></div>
          
          <div class="card-body">
            <div class="form-group no-border">

              <input id="msg" type="text" name="body" id="new-post" class="form-control" placeholder="Type a message...">
              <button id="sendMsg" class="btn btn-primary">Send</button>
            </div>
              {{-- <div class="row">
                <input type="hidden" value="{{ Session::token() }}" name="_token">
              </div> --}}

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



   @endsection

