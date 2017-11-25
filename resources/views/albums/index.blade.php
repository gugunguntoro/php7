@extends('main')

@section('title', 'Photo')

@section('content')
  <div class="row">
    <div class="col"><hr>
      <h4 class="text-right"><a href="{{ route('albums.create') }}" class="btn btn-dark">Upload Photo</h4></a>
    </div>
  </div>
  <div class="row">
    @foreach ($albums as $album)
    <div class="col-md-3"><hr>
      <a href="{{ route('albums.show', $album->id) }}" style="margin-left: -5px;"><img src="{{ asset('images/' . $album->image) }}" alt="" class="img-fluid"></a><hr>
    </div>
    @endforeach
  </div>
@endsection
