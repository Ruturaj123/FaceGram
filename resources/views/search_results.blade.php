@extends('master')

@section('title')
Search
@endsection

@section('content')


<script type="text/javascript">

	function sendRequest(user_id, friend_id) {
		$.ajax({
                  url: "/send-request/" + user_id + '/' + friend_id,
                  method: 'get',
                  success: function(result){
                     console.log(friend_id);
                     $('#requestBtn-' + friend_id).prop('disabled', true);
                  }

              });
	}
</script>

<h4 align="center">{{ count($users) }} result(s) found.</h4><br>

<div class="row">
	<div class="col-md-6">
		@foreach($users as $user)
		<div class="card card-body">
			<div class="row">
				<div class="col">
					<h3 id="result-{{ $user->id }}" style="cursor: pointer;"><a href="{{ route('getProfile', ['friend_id' => $user->id]) }}">{{ $user->name }}</a></h3>
				</div>
				<div class="col">
					<form method="get" action=" {{ route('user.sendRequest', ['user_id' => Auth::user()->id, 'friend_id' => $user->id]) }}">
					<button type="submit" id="requestBtn-{{ $user->id }}" style="float: right;" class="btn btn-primary btn-fab btn-round" >
						<i class="fas fa-user-plus"></i>
					</button>
				</form>
				</div>
			</div>

			
		</div>
		@endforeach
	</div>
	<div class="card card-nav-tabs" style="width: 20rem; bottom: 0; position: fixed; right: 10px;">
		<div class="card-header card-header-success">
			<center>
				<h4 class="card-title">Online Friends</h4>
			</center>
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Aayush Jain</li>
			<li class="list-group-item">Vidhi Doshi</li>
			<li class="list-group-item">Ruturaj Gujar</li>
		</ul>
	</div>
</div>


@endsection