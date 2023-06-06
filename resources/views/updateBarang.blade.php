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
				<form method="post" action="process" enctype="multipart/form-data">
				@csrf
					<div class="form-group">
						<label class="font-weight-bold">Kode Barang</label>
						<input type="text" class="form-control" name="kode" placeholder="Enter Code" value="{{ $dtmhs->kd_brg }}" readonly>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Photo Barang</label>
						<input type="file" class="form-control" name="photo" accept=".jpg, .jpeg, .png">
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Nama Barang</label>
						<input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?=(old('name')=='')? $dtmhs->namabrg : old('name')?>" required>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Kategori</label>
						<select class="form-control" name="kategori" required>
							<option value="">-- Pilih Kategori --</option>
								<option value="Cage" <?=(old('prodi')=='')?(($dtmhs->kategori=='Cage')?'selected':''):((old('kategori')=='Cage')?'selected':'');?>>Cage</option>
								<option value="Food" <?=(old('prodi')=='')?(($dtmhs->kategori=='Food')?'selected':''):((old('kategori')=='Food')?'selected':'');?>>Food</option>
								<option value="Grooming" <?=(old('prodi')=='')?(($dtmhs->kategori=='Grooming')?'selected':''):((old('kategori')=='Grooming')?'selected':'');?>>Grooming</option>
							</optgroup>
					   </select>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Harga</label>
						<input type="number" class="form-control" name="harga" placeholder="Enter Price" value="<?=(old('harga')=='')? $dtmhs->hrg : old('harga')?>" required>
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-primary" value="Add">
					</div>
					<div class="form-group">
						<a href="/barang"><input type="button" class="form-control btn btn-danger" value="Cancel"></a>
					</div>
				</form>
			</div>
		</div>
</body>
@endsection