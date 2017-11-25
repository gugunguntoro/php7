@extends('main')

@section('title', 'Login')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3"><br>
        <div class="card" style="border-radius: 0px; padding: 20px;">
          {{-- <div class="card-body mx-4"> --}}
            {!! Form::open() !!}

            <div class="form-group">
              {{ Form::label('email', 'Email') }}
              {{ Form::email('email', null, ['class' => 'form-control', 'style' => 'border-radius: 0px;']) }}
            </div>

            <div class="form-group">
              {{ Form::label('password', 'Password') }}
              {{ Form::password('password', ['class' => 'form-control', 'style' => 'border-radius: 0px;']) }}
            </div>

            <div class="form-group">
              {{ Form::checkbox('remember') }}
              <small>Remember Me</small>
            </div>

            <hr>  {{ Form::submit('Login', ['class' => 'btn btn-dark btn-block', 'style' => 'border-radius: 0px;']) }}
            {!! Form::close() !!}
          </div>

        {{-- </div> --}}

      </div>
    </div>
  </div>

@endsection
