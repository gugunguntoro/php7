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



  <div class="container blog-index">
    <div class="row">
      <div class="col-md-8" class="blog-index-dua" style="margin-top: 20px;">
        <div class="row">



        @foreach ($posts as $post)
          <div class="card card-blog">
          <div class="col-md-12">
            <div class="row">

              <div class="col-md-7" style="padding: 0px;">
                <img class="img-fluid" src="{{ asset('images/' . $post->image) }}" alt="Card image cap">
              </div>
              <div class="col-md-5" style="padding-bottom: 10px;">
                <p class="letter-spacing" style="font-size: 15px; margin-bottom: 30px;"><a href="{{ url('category/' . $post->category->name) }}" style="font-variant: small-caps;"><small>{{ ucwords($post->category->name) }}</small></a></p>
                <a href="{{ url('blog/' . $post->slug) }}"><h5 class="title-blog-h5">{{ $post->title }}</h5></a>
                <small style="color:#9e9393; font-style: oblique;" class="text-left">{{ date('F d, Y', strtotime($post->created_at)) }}</small>
              </div>
            </div>
          </div>
          </div>
        @endforeach
        {{ $posts->links() }}
        </div>
        </div>
          <div class="col-md-4" style="margin-top: 20px;">
          <div id="accordion" role="tablist">

            <div class="card card-category">

              <div class="card-header" role="tab" id="headingThree" style="background-color: white;">
                <h5 class="mb-0" style="font-variant: small-caps;">
                  <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Category
                  </a>
                </h5>
              </div>

              <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body" style="margin-top: -10px;">
                    @foreach ($categories as $category)
                  <a href="{{ url('category/'. $category->name) }}" style="font-variant: small-caps; font-size: 13px;">{{ ucwords($category->name) }}</a>
                  @endforeach
                </div>
              </div>
            </div>
          </div><br>
        </div>
    </div>
  </div>

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
