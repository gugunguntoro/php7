@extends('main')

@section('title', 'Blog')

@section('stylesheets')
  <link rel="stylesheet" href="/css/parallax.css">
  <link href='https://cdn.knightlab.com/libs/soundcite/latest/css/player.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
  <link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>
  <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-8" style=" margin-left: -15px; margin-right: -90px; margin-top: 12px; margin-bottom: -17px;">
      <div class="row">
        <div class="col-md-6">
          <div class="search-dua" style="border: 1px solid #CED4DA;">
        <form class="form-inline" method="get" action="{{ url('post') }}">
        <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search" style="border-radius: 0px; float: left; background-color: transparent; border: 0px solid white;">
        <button type="submit"  class="form-control-search btn btn-default" aria-label="Left Align" style="background-color: transparent; border-radius: 0px; border: 0px solid #CED4DA;">
   <i class="fa fa-search" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submited

</button>
  {{-- <button class="btn my-2 my-sm-0" type="submit">Search</button> --}}
      </form>
  </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
  <div class="container search">
    <div class="row">
      <div class="col-md-8 col-search">

        <div class="row">
        @if (count($posts))
        <small style="margin-bottom: 10px;">Hasil pencarian dari "{{ $search }}" berdasarkan judul.</small>
          @foreach ($posts as $post)
            <div class="card card-search">
            <div class="col-md-12">

              <div class="row">

                <div class="col-md-7 img-search">
                  <img class="img-fluid" src="{{ asset('images/' . $post->image) }}" alt="Card image cap">
                </div>
                <div class="col-md-5 img-body">
                  <p class="letter-spacing search-paragraf-p"><a href="{{ url('category/' . $post->category->name) }}" style="font-variant: small-caps;"><small>{{ ucwords($post->category->name) }}</small></a></p>
                  <h5 class="search-h5"><a href="{{ url('blog/' . $post->slug) }}">{{ $post->title }}</a></h5>
                  <small style="color:#9e9393; font-style: oblique;" class="text-left">{{ date('F d, Y', strtotime($post->created_at)) }}</small>
                </div>
              </div>
            </div>
            </div>
          @endforeach
          {{ $posts->links() }}
        @else
            <div class="card search-emtpy-body">
              {{-- <div class="card-body"> --}}
                <h1 class="text-danger empty-search">MAAF, "{{ $search }}" TIDAK ADA DISINI!!!</h1><hr class="hr-empty">
                <h4 class="empty-search-2">Mungkin "{{ $search }}" sedang naik gunung</h4>
              {{-- </div> --}}
            </div>
        @endif
        </div>
        </div>
    </div>
  </div><br>

@endsection

@section('scripts')
  <script type="text/javascript" src="/js/slick.min.js"></script>
  <script type="text/javascript">
  $('.regular').slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 900,
    fade: true,
    cssEase: 'linear'
    });
  </script>
  <script src="/js/parallax.js"></script>
  <script src="/js/jquery.sticky.js"></script>
  <script type='text/javascript' src='https://cdn.knightlab.com/libs/soundcite/latest/js/soundcite.min.js'></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.8.0/slick.min.js"></script>
@endsection
