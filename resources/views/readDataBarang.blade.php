@extends('Layout.app')
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
					<a href="/barang/create/"><button class="btn btn-primary mb-3">Create Data</button></a>
				</div>
				<div class="col-md-4">
					<form action="/barang"  method="get">
						<div class="input-group mb-3">
							<input type="text" class="form-control shadow-sm" placeholder="Search Kode barang/Nama Barang/Harga Barang" name="keyword" value="<?= (isset($_GET['keyword']))?$_GET['keyword']:''; ?>">
							<div class="input-group-append">
								@if(isset($_GET['keyword']))
									<a class="btn btn-outline-danger shadow-sm" href="/barang">&times;</a>
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
							<th width="10%">No</th>
                            <th width="20%">Photo</th>
							<th width="20%">Kode Barang</th>
                            <th width="15%">Nama Barang</th>
							<th width="10%">Kategori</th>
                            <th width="10%">Harga Barang</th>
							<th width="1000px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($dtmhs as $i => $m)
							<tr>
								<td>{{ ++$i }}</td>
								<td><img src="{{ url('/foto brg/'.$m->foto) }}" class="rounded-circle" width="80" height="80"></td>
								<td>{{ $m->kd_brg }}</td>
                                <td>{{ $m->namabrg }}</td>
								<td>{{ $m->kategori }}</td>
                                <td>@currency( $m->hrg )</td>
								<td>
									<a href="/barang/update/{{ $m->kd_brg }}/"><button class="btn btn-success">Update</button></a>
									<a href="/barang/delete/{{ $m->kd_brg }}"><button class="btn btn-danger" onclick="javascript:return confirm('Apakah anda yakin ingin hapus??')">Delete</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
   @endsection