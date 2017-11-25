@extends('main')

@section('title', 'Album Photo')

@section('content')
  <div class="row">
    <div class="col-md-4"><hr>
        <img src="{{ asset('images/'. $album->image) }}" alt="" class="img-fluid"><hr>
    </div>
    <div class="col-md-2"><hr>
      <small>Judul : {{ $album->title }}</small><br>
      <small>Upload : {{ $album->created_at }}</small>
      {!! Form::open(['route' => ['albums.destroy', $album->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!}
      <hr>
    </div>
  </div>
@endsection
