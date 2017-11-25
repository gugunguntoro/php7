<!DOCTYPE html>
<html>
  <head>
    @include('partials._head')
  </head>
  <body>

    @include('partials._nav')

    <div class="container-fluid">
      @include('partials._messages')
      {{-- {{ Auth::check() ? 'Logged In' : 'Logged Out' }} --}}
      @yield('content')
    </div>

    @yield('carousel')

    @include('partials._footer')

    @include('partials._javascripts')

    @yield('scripts')

  </body>
</html>
