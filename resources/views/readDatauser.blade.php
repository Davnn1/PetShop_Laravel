@extends('layout.app')
    @section('content')
        @if($message = Session::get('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<b>{{ $message }}</b>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		@elseif($message = Session::get('failed'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<b>{{ $message }}</b>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		<div class="col-md-12 bg-white p-4">
			<div class="row">
				<div class="col-md-8">
				</div>
				<div class="col-md-4">
					<form action="/user"  method="get">
						<div class="input-group mb-3">
							<input type="text" class="form-control shadow-sm" placeholder="Search Username / E-mail / Level" name="keyword" value="<?= (isset($_GET['keyword']))?$_GET['keyword']:''; ?>">
							<div class="input-group-append">
								@if(isset($_GET['keyword']))
									<a class="btn btn-outline-danger shadow-sm" href="/user">&times;</a>
								@else
									<button class="btn btn-outline-primary shadow-sm" type="submit"><span class="fa-solid fa-magnifying-glass"></span></button>
								@endif
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<table class="table table-responsive table-hover table-stripped">
					<thead>
						<tr class="table-info">
							<th width="5%">No</th>
							<th width="20%">Username </th>
							<th width="20%">E-mail</th>
							<th width="20%">Level</th>
							<th width="20%">Created</th>
                            <th width="1000px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($dtusr as $i => $m)
							<tr>
								<td>{{ ++$i }}</td>
								<td>{{ $m->username }}</td>
								<td>{{ $m->email }}</td>
								<td>{{ $m->level }}</td>
								<td>{{ $m->created }}</td>
								<td>
									<a href="/user/update/{{ $m->username }}/"><button class="btn btn-success">Edit</button></a>
									<a href="/user/delete/{{ $m->username }}"><button class="btn btn-danger" onclick="javascript:return confirm('Apakah anda yakin ingin hapus??')">Delete</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
   @endsection