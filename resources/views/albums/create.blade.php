@extends('main')

@section('title', 'Create')

@section('content')
  <div class="row">
    <div class="col-md-5">
      <div class="row justify-content-md-center">
        <div class="col-md-5"><hr>
          <h2 class="text-center" style="font-variant: small-caps;">Upload Photo</h2><hr>
        </div>
      </div><hr>

        {!! Form::open(array('route' => 'albums.store', 'files' => true)) !!}

          <div class="form-group">
            {{ Form::file('album_image') }}
          </div>

          <div class="md-form">
            {{ Form::label('form1', 'Description :') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'id' => 'form1')) }}<hr>
          </div>

          <div class="text-left">
            {{ Form::submit('Create Post', array('class' => 'btn btn-indigo')) }}
          </div><br>

        {!! Form::close() !!}

    </div>
    <div class="col-md-2"></div>
    <div class="col-md-5">
      <div class="row justify-content-md-center">
        <div class="col-md-5"><hr>
          <h2 class="text-center" style="font-variant: small-caps;">Carousel</h2><hr>
        </div>
      </div><hr>

        {!! Form::open(array('route' => 'carousels.store', 'files' => true)) !!}

          <div class="form-group">
            {{ Form::file('carousel') }}
          </div>

          <div class="md-form">
            {{ Form::label('form1', 'Description :') }}
            {{ Form::text('title_caro', null, array('class' => 'form-control', 'id' => 'form1')) }}<hr>
          </div>

          <div class="text-left">
            {{ Form::submit('Create Post', array('class' => 'btn btn-indigo')) }}
          </div>

        {!! Form::close() !!}

    </div><br>
  </div>
@endsection
