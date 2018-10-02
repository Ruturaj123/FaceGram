@extends('master')

@section('title')
Home
@endsection

@section('content')
	
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					
					<img class="card-header card-header-success ml-auto mr-auto" src="{{ asset('img/avatar_man.png') }}" style="border-radius: 50%;" width="100px" height="100px">
					<div class="card-body">
						The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card card-nav-tabs">
					<div class="card-header card-header-warning">
						<center>
							<h4 class="card-title">What's on your mind ?</h4></center>
					</div>
					<div class="card-body">
						<form action="{{ route('post.create') }}" method="post">
							<div class="form-group no-border">
								<input type="text" name="body" id="new-post" class="form-control" placeholder="Write Something...">
							</div>
							<div class="row">
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary">Post</button>
							</div>
							<div class="col-md-2 ml-auto">
								<button class="btn btn-primary btn-just-icon btn-round"><i class="material-icons">file_upload</i></button>
							</div>
							<input type="hidden" value="{{ Session::token() }}" name="_token">
						</div>
						</form>
						
					</div>
				</div>
				<div class="card">
					<img class="card-img-top" src="https://images.unsplash.com/photo-1517303650219-83c8b1788c4c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd4c162d27ea317ff8c67255e955e3c8&auto=format&fit=crop&w=2691&q=80" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Card title</h4>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<div class="upload-time">
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
						<div class="row">
							<button type="submit" class="btn btn-red btn-just-icon btn-round">
		                    <i class="fas fa-heart"></i>
		                </button>
		                <button type="submit" class="btn btn-blue btn-just-icon btn-round">
		                    <i class="fas fa-edit"></i>
		                </button>
						</div>
					</div>
				</div>
			</div>
			<div class="card card-nav-tabs" style="width: 20rem;">
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