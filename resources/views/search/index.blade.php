<!DOCTYPE html>
<html>
<head>
	
	@include('partials._head')
	@section('title', 'Search')
	@section('stylesheets')
		<style type="text/css">
			
		</style>
	@endsection
</head>
<body>
	{{-- @include('partials._nav') --}}
	<div class="container" style="margin-top: 70px;">
		<div class="row">

			<div class="col-sm-4">
				<a href="{{ url('/') }}"><h5 style="color: #7F7B72;">PERPUNJAS.ORG</h5></a>
				<div style="border: 1px solid #CED4DA;">
				<form class="form-inline" method="get" action="{{ url('post') }}">
        <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search" style="border-radius: 0px; float: left; background-color: transparent; border: 0px solid white;">
        <button type="submit"  class="form-control-search btn btn-default" aria-label="Left Align" style="background-color: transparent; border-radius: 0px; border: 0px solid #CED4DA;">
   <i class="fa fa-search" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submited

</button>
  {{-- <button class="btn my-2 my-sm-0" type="submit">Search</button> --}}
      </form>
  </div>
			</div>
		</div>
	</div>


	@include('partials._javascripts')
</body>
</html>

