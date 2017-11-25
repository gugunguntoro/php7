@extends('main')

@section('title', 'Edit Tag')

@section('content')
  <div class="row">
    <div class="col-md-12"><hr style="margin-bottom: 30px;">


    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}

        <div class="md-form">
          {{ Form::label('name', 'Title :') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>


          {{ Form::submit('Save Changes') }}
        {{ Form::close() }} <br>
      </div>
    </div>
  </div>

@endsection
