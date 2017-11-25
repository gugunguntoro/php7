@extends('main')

@section('title')

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
        @foreach ($categories as $category)
          <tr>
            <th scope="row">{{ $category->id }}</th>
            <td colspan="2">{{ ucwords($category->name) }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-3"><hr>
      <h4>New Category :</h4><hr>
      <div class="well">
        {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

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
