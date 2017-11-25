@if (Session::has('success'))

      <div class="row">
        <div class="col-md-12">
          <div class="alert-me">
            <p>{{ Session::get('success') }}</p>
          </div>

        </div>
      </div>

@endif

@if (count($errors) > 0)
  <div class="row">
    <div class="col-md-6">
      <div class="alert-peringatan">
        <h3 class="text-center" style="padding-top: 10px;">Warning!!!</h3>
        <ul style="list-style-type: circle;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endif
