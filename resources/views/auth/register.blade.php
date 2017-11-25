@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            {!! Form::open() !!}

            <div class="md-form">
              {{ Form::text('name', null, ['class' => 'form-control']) }}
              {{ Form::label('name', 'Name') }}
            </div>

            <div class="md-form">
              {{ Form::email('email', null, ['class' => 'form-control']) }}
              {{ Form::label('email', 'Email') }}
            </div>

            <div class="md-form">
              {{ Form::password('password', null, ['class' => 'form-control']) }}
              {{ Form::label('password', 'Password') }}
            </div>

            <div class="md-form">
              {{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
              {{ Form::label('password_confirmation', 'Confirm Password') }}
            </div>

              {{ Form::submit('Register', ['class' => 'btn btn-default']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
