@extends('Layout.app')
	@section('content')
	
<style type="text/css">
body { 
  	height: 100%;
  	background-position: center;
    background-image: url("../image/bgall.png");
	background-repeat: no-repeat;
    background-size: cover;
}
.bgimg {
	height: 100%;
  	background-position: center;
    background-image: url("../image/bgall.png");
	background-repeat: no-repeat;
    background-size: cover;
}
#to-top{

	display: none;
	width: 34px;
	height: 34px;
	position: fixed;
	right: 10px;
	bottom: 50px;
	background: url("../image/up.png") no-repeat;
	border : 2px solid #fff;
	border-radius: 50%;
}

</style>
<body>
<div class="bgimg">
<div class="row justify-content-center align-items-center">
			<div class="col-md-6 col-sm-12 bg-white p-4">
			@if($message = Session::get('failed'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<b>{{ $message }}</b>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
				<form method="post" action="process">
				@csrf
					<div class="form-group">
						<label class="font-weight-bold">New Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter new password" value="{{old('password')}}" required>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Confirm Password</label>
						<input type="password" class="form-control" name="confirm" placeholder="Re-enter new password" value="{{old('confirm')}}" required>
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-primary" value="Update">
					</div>
					<div class="form-group">
						<a href="/"><input type="button" class="form-control btn btn-danger" value="Cancel"></a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<a id="to-top" href="#"></a>
</body>
@endsection