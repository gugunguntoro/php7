@extends('main')

@section('title', 'Contact')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center">Contact Me</h1>
      <hr>
      <form class="">
        <div class="form-group">
          <label name="email">Email</label>
          <input type="text" name="email" value="" class="form-control" id="email">
        </div>
        <div class="form-group">
          <label name="email">Email</label>
          <input type="text" name="email" value="" class="form-control" id="email">
        </div>

        <input type="submit" name="" value="Send Message" class="btn btn-primary">
      </form>
    </div>
  </div>
@endsection
