@extends('Layout.app')
	@section('content')
		<div class="row">
		@foreach ($dtmhs as $i => $m)
		<div class="col-md-3 col-sm-12">
			<div class="card border-0" style="width:18rem; float: left; margin: 20px;">
				<img src="{{ url('/foto brg/'.$m->foto) }}" class="card-img-top img-responsive">
				<div class="card-body">
					<h5 class="card-title">{{ $m->namabrg }}</h5>
					<h6 class="card-subtitle mb-2 text-muted">{{ $m->kategori }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">@currency( $m->hrg )</h6>
					@if(Session::get('level')=="Customer")
                    <a href="/form" class="btn btn-danger">Beli</a>
                    @else
                    @endif
				</div>
			</div>
		</div>
		@endforeach
		</div>
   @endsection