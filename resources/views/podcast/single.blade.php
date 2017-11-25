@extends('main')

@section('title')

@section('stylesheets')
<link href='https://cdn.knightlab.com/libs/soundcite/latest/css/player.css' rel='stylesheet' type='text/css'>

<style type="text/css">
	.vabar {
		visibility: collapse;
	}
</style>
@endsection

@section('content')
	<div class="container"  style="margin-top: 30px;">
		<div class="row">
			<div class="col-md-6 offset-md-1">
			<div class="card" style="border-radius: 0px; filter: drop-shadow(2px 2px 5px grey); border: 0px solid white;">
				<img src="{{ asset('images/'. $podcast->image) }}" class="img-fluid">
				<div style="padding: 10px;">
					<small class="text-muted">Photograph By {{ $podcast->photo_by }}</small>
					<h4>{{ $podcast->title }}</h4>
					<p>{!! $podcast->body !!}</p>
					<small class="text-muted"><i class="fa fa-user-o" aria-hidden="true"></i> {{ ucwords($podcast->image_desc) }}</small>
			   </div>
			</div>
			</div>
			<div class="col-md-5">
				<h2 style="letter-spacing: 10px;">P<i class="fa fa-podcast" aria-hidden="true"></i>DCASTS</h2><small class="text-muted">Baru</small>
				<ul style="margin-left: 12px; margin-top: -32px;">
					@foreach($podcastsall as $podcasts)
					<a href=""><li>{{ $podcasts->title }}</li></a>
					@endforeach
				</ul>
			</div>
		</div>	
	</div>
@endsection

@section('scripts')
<script type='text/javascript' src='https://cdn.knightlab.com/libs/soundcite/latest/js/soundcite.min.js'></script>
@endsection