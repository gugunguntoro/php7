
@extends('main')

@section('title', 'Carousel')

@section('content')
  <div class="row">
    <div class="col"><hr>
      <h4 class="text-right"><a href="{{ route('albums.create') }}" class="btn btn-dark">Upload Carousel</h4></a>
    </div>
  </div>
  <div class="row">
    @foreach ($carousels as $carousel)
    <div class="col-md-3"><hr>
      <a href="{{ route('carousels.show', $carousel->id) }}" style="margin-left: -5px;"><img src="{{ asset('images/' . $carousel->image) }}" alt="" class="img-fluid"></a><hr>
    </div>
    @endforeach
  </div>
@endsection
