@extends('main')

@section('title', 'Photo')

@section('stylesheets')
  <link rel="stylesheet" href="/css/lightbox.css">
  <style media="screen">
    body {
      background-image: url('/images/117712.jpg');
      background-attachment: fixed;
      background-size: cover;
    }

    .img-me {
      filter: grayscale(100%);
      opacity: 0.2;
    }
  </style>
@endsection





  {{-- <div class="row">
    <div class="col-md-12">
      <hr><h1 class="text-center" style="font-variant: small-caps">Landscape</h1><hr>
    </div>
  </div> --}}
  <div class="container" style="margin-top: 90px;">



    <div class="row">
    @foreach ($albums as $album)
      <div class="col-md-3" style="padding: 1px 1px 2px 0px; margin-top: 20px;">
        <a href="{{ asset('images/' . $album->image) }}" data-lightbox="example-set" data-title="{{ $album->title }}"  style=";"><img src="{{ asset('images/' . $album->image) }}" class="img-fluid img-me" style="margin-bottom: -22px;"></a>

      </div>
    @endforeach
  </div>
</div><br>



@section('scripts')
  <script src="/js/lightbox-plus-jquery.min.js"></script>
  <script type="text/javascript">
    lightbox.option({
      'resizeDuration': 900,
      'fadeDuration': 600,
      'wrapAround': false,
      "alwaysShowNavOnTouchDevices": false
    });

    $(document).ready(function(){

      $('.img-me').click(function(){
        $('img').css('filter', 'grayscale(0px)');
      });

      $('.img-me').mouseenter(function(){
        $('.img-me').css('opacity', '1');
      });

      $('.img-me').mouseleave(function(){
        $('.img-me').css('opacity', '0.2');
      });

    });
  </script>



@endsection
