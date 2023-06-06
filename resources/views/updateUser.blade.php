@extends('Layout.app')
	@section('content')
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
						<input type="hidden" class="form-control" name="username" value="{{ $dtusr->username }}" readonly>
					</div>
                    <div class="form-group">
                        <label class="font-weight-bold">E-Mail</label>
						<input type="email" class="form-control" name="email" placeholder="Enter new E-Mail">
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Change Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter new password">
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Level</label>
						<select class="form-control" name="level" required>
							<option value="">-- Pilih Level --</option>
							<option value="Admin" <?= ($dtusr->level == 'Admin') ? 'selected' : ''; ?>>Admin</option>
							<option value="Customer" <?= ($dtusr->level == 'Customer') ? 'selected' : ''; ?>>Customer</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-primary" value="Edit">
					</div>
					<div class="form-group">
						<a href="/user"><input type="button" class="form-control btn btn-danger" value="Cancel"></a>
					</div>
				</form>
			</div>
		</div>
   @endsection