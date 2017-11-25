@extends('main')

@section('title', 'Perpunjas')

@section('stylesheets')
  <link rel="stylesheet" href="/css/parallax.css">
  <link href='https://cdn.knightlab.com/libs/soundcite/latest/css/player.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
  <link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>
  <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection

@section('content')

  {{-- <div class="row justify-content-md-center">
    <div class="col-md-10"><br>
      <div class="regular">
        @foreach ($carousels as $carousel)
          <img class="img-fluid" src="{{ asset('images/'. $carousel->image) }}" alt="...">
        @endforeach
      </div>
    </div>
  </div> --}}





<div class="container home"><br>
    <div class="row">
      <div class="col-md-7">
        <div class="card head-home">
      @foreach ($perpunjas as $perpu)
        <img src="{{ asset('images/'. $perpu->image) }}" class="img-fluid image-head" alt="Responsive image">
        <p><small style="font-variant: small-caps; margin-left: 15px; letter-spacing: 3px"><a href="{{ url('category/'. $perpu->category->name) }}">{{ ucwords($perpu->category->name) }}</a></small><p>
        <h3 class="title-h" style=""><a href="{{ url('blog/'.$perpu->slug) }}">{{ $perpu->title }}</a></h3>
        <p class="paragraf-p">{!! substr(strip_tags($perpu->body), 0, 100) !!} {{ strlen($perpu->body) ? '__' : '' }}</p><hr class="hr" style="margin: 0 10px 0 10px;">
      @endforeach
        <div class="row">
          @foreach ($lol as $lo)
            <div class="col-md-6">
              <h5 class="title-h5"><a href="{{ url('blog/'.$lo->slug) }}">{{ $lo->title }}</a></h5>
              <p class="paragraf-card" style=""><small>{!! substr(strip_tags($lo->body), 0, 100) !!} {{ strlen($lo->body) ? '__' : '' }}</small></p>
            </div>
          @endforeach
          </div>

          <div class="row">
            <div class="col-md-12 postlama">
              <hr style="margin: 3px 15px 8px 15px;"><h4 style="margin-left: 15px;">#Post Lama</h4><hr style="margin: 0 15px 8px 15px;">
              <div class="row">
                <div class="col-md-6">
                  <ul class="ul-title-dua">
                    @foreach ($duaharis as $duahari)
                      <li><a href="{{ url('blog/'. $duahari->slug) }}">{{ $duahari->title }}</a></li>
                      <small class="text-small">{{ $duahari->created_at->diffForHumans() }}</small>
                    @endforeach
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="ul-title">
                    @foreach ($tigaharis as $tigahari)
                      <li style=""><a href="{{ url('blog/'. $tigahari->slug) }}">{{ $tigahari->title }}</a></li>
                      <small style="margin-left: 5px;">{{ $tigahari->created_at->diffForHumans() }}</small>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

          </div>


        </div><br>
      </div>
      <div class="col-md-5" >
        @foreach ($posts as $post)
          <div class="card head-new-post">
            <img class="card-img-top" src="{{ asset('images/' . $post->image) }}" alt="Card image cap" style="border-radius: 0px;">
            <p class="new-category-p"><a href="{{ url('category/' . $post->category->name) }}" style="font-variant: small-caps;"><small>{{ ucwords($post->category->name) }}</small></a></p>
            <div class="card-body">
              <a href="{{ url('blog/' . $post->slug) }}"><h4 class="title-h4">{{ $post->title }}</h4></a>
              <p class="card-text" style="">{!! substr(strip_tags($post->body),0,100) !!} {{ strlen($post->id) ? '__' : '' }}</p>
              <small style="color:#9e9393; font-style: oblique;" class="text-left">{{ date('F d, Y', strtotime($post->created_at)) }}</small><hr>
            </div>
          </div>
        @endforeach
      </div>
</div>
</div>

<div class="container bottom-footer">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        @foreach ($postlamas as $postlama)
        <div class="col-md-3 col-sm-6 col-card-dua">
          <div class="card card-dua">
            <img class="card-img-bottom img-fluid" src="{{ asset('images/' . $postlama->image_head) }}" alt="Card image cap">
            <p class="p-card-dua"><a href="{{ url('category/' . $postlama->category->name) }}" style="font-variant: small-caps;"><small>{{ ucwords($postlama->category->name) }}</small></a></p>
            <div class="card-body">
              <h6 class="card-title" style=""><a href="{{ url('blog/' . $postlama->slug) }}">{{ $postlama->title }}</a></h6>
              {{-- <p class="card-text" style="line-height: 25px;">{!! substr(strip_tags($postlama->body),0,100) !!} {{ strlen($postlama->id) ? '__' : '' }}</p> --}}
              {{-- <small style="color:#9e9393; font-style: oblique;" class="text-left">{{ date('F d, Y', strtotime($postlama->created_at)) }}</small> --}}
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
    </div>
  </div>
{{-- </div> --}}

{{-- <div class="container">
  <div class="row">
    <div class="col-md-9 podcast-col">
      <div class="card card-podcast">
            <div class="card-body">
              <p style="font-variant: small-caps">Podcast</p><hr>
              <div class="row">
                @foreach($cerpens as $cerpen)
                <div class="col-md-4">
                  <h6 class="title-h6-podcast" style=""><a href="{{ url('podcasts/'. $cerpen->slug) }}">{{ $cerpen->title }}</a></h6>
                  <p class="paragraf-podcast" style="">{{ substr(strip_tags($cerpen->body),0,50) }}</p>

                </div>
                @endforeach
              </div>
            </div>
          </div>
    </div>
  </div>
</div> --}}




@endsection



@section('scripts')
  <script type="text/javascript" src="/js/slick.min.js"></script>
  <script type="text/javascript">
  $('.regular').slick({
    dots: false,
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
