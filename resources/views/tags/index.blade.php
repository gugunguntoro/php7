@extends('main')

@section('title', 'All Tags')

@section('content')
  <div class="row">
    <div class="col-md-5"><hr>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($tags as $tag)
          <tr>
            <th scope="row">{{ $tag->id }}</th>
            <td colspan="2"><a href="{{ route('tags.show', $tag->id) }}">{{ ucwords($tag->name) }}</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-3"><hr>
      <h4>New Tag :</h4><hr>
      <div class="well">
        {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

          <div class="md-form">
            {{ Form::label('name', 'Name :') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {{ Form::submit('Create', ['class' => 'btn btn-dark']) }}
          </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
