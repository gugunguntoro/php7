@extends('main')

@section('title')

@section('stylesheets')
	<style type="text/css">
		a:hover {
			text-decoration: none;
		}

		.podcast {
			height: 100%; 
			border-radius: 0px; 
			filter: drop-shadow(2px 2px 5px grey);
			border: 0px solid white;
		}
	</style>
@endsection

@section('content')
	<div class="container" style="margin-top: 30px;">
		<div class="row">
			<div class="col-md-5">
				<h2 style="letter-spacing: 10px;">P<i class="fa fa-podcast" aria-hidden="true"></i>DCASTS</h2><hr>
			</div>
			<div class="col">
				{{-- search --}}
			</div>
		</div>

		<div class="row">
			@foreach($podcasts as $podcast)
			<div class="col-md-3 col-sm-6">
				<a href="{{ url('podcasts/'. $podcast->slug) }}">
					<div class="card podcast" style="">
					  <img class="card-img-top" src="{{ asset('images/' . $podcast->image_head) }}" alt="{{ $podcast->image_desc }}">
					  <div class="card-body">
					    <h5 class="card-title">{{ $podcast->title }}</h5>
					    <p class="card-text" style="font-size: 15px; line-height: 20px">{!! substr(strip_tags($podcast->body),0, 50) !!}</p>
					    <p class="card-text"><small class="text-muted">{{ $podcast->created_at }}</small></p>
					  </div>
					</div>
				</a>
			</div>
			@endforeach
		</div>

		<div class="row">
			<div class="col-md-12" style="margin-top: 30px;"><hr>
				<div class="row">
					<div class="col-md-7">
						<h2 style="letter-spacing: 10px;">P<i class="fa fa-podcast" aria-hidden="true"></i>DCASTS PERPUNJAS</h2><hr>
					</div>
					<div class="col">
						{{-- search --}}
					</div>
				</div>
				<div class="row">
					@foreach($podcastperpunjas as $podcastperpu)
					<div class="col-md-3 col-sm-6">
						<a href="{{ url('podcasts/'. $podcastperpu->slug) }}">
							<div class="card podcast" style="">
							  <img class="card-img-top" src="{{ asset('images/' . $podcastperpu->image_head) }}" alt="{{ $podcastperpu->image_desc }}">
							  <div class="card-body">
							    <h5 class="card-title">{{ $podcast->title }}</h5>
							    <p class="card-text" style="font-size: 15px; line-height: 20px">{!! substr(strip_tags($podcastperpu->body),0, 50) !!}</p>
							    <p class="card-text"><small class="text-muted">{{ $podcastperpu->created_at }}</small></p>
							  </div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
