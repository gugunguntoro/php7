@extends('main')

@section('title', 'Carousel')

@section('content')
  <div class="row">
    <div class="col-md-7"><hr>
        <img src="{{ asset('images/'. $carousel->image) }}" alt="" class="img-fluid"><hr>
    </div>
    <div class="col-md-2"><hr>
      <small>Judul : {{ $carousel->title }}</small><br>
      <small>Upload : {{ $carousel->created_at }}</small>
      {!! Form::open(['route' => ['carousels.destroy', $carousel->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!}
      <hr>
    </div>
  </div>
@endsection
