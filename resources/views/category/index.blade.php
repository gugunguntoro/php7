@extends('main')

@section('title', 'Category | '. ucwords($category->name))

@section('stylesheets')
  <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection

@section('content')

<div class="container category">
  <div class="row">
    <div class="col-md-10">
      <div class="row">
        <div class="col-md-12 category-padding">
          @if (count($category->posts))
            
            @foreach ($posts as $post)
            <div class="card category-card">
              <div class="row">
                <div class="col-md-7">
                  <img class="img-fluid category-img" src="{{ asset('images/' . $post->image) }}" alt="" style="">
                </div>
                <div class="col-md-5 category-body">
                  <h4 class="category-h4"><a href="{{ url('blog/' . $post->slug) }}">{{ $post->title }}</a></h4>
                  <p class="category-p">{!! substr(strip_tags($post->body),0,80) !!} {{ strlen($post->body) ? '__' : '' }}</p>
                  <small class="category-small" >{{ ucwords($post->category->name) }}</small>
                </div>
              </div>
            </div>
            @endforeach
            {{ $posts->links() }}
          @else
            <div class="card category-empty">
              <h4 class="text-danger category-empt-h4">Maaf, category "{{ ucwords($category->name) }}" belum tersedia!!!</h4>
            </div>
          @endif
        </div>
      </div>
    </div>
      <div class="col-md-2">
        <div id="sidebar">
        <div id="accordion" role="tablist">
          <div class="card category-list">
            <div class="card-header" role="tab" id="headingThree" style="background-color: white;">
              <h5 class="mb-0" style="font-variant: small-caps;">
                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Category
                </a>
              </h5>
            </div>
            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                @foreach ($categories as $category)
                  <li class="nav-item {{ Request::is('category/' . $category->name) ? 'active' : '' }}" style="list-style: none; font-variant: small-caps; margin-top: -5px">
                    <a href="{{ url('category/'. $category->name) }}" style="font-size: 11.5px; letter-spacing: 3px;">{{ ucwords($category->name) }}</a>
                  </li>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script src="/js/jquery.sticky.js"></script>
  <script type="text/javascript">


  $(document).ready(function(){


    // $('#sidebar').sticky({
    //   topSpacing: 80,
    //   bottomSpacing: 1250
    // });


    //
    // if($(window).width() < 480)
    // {
    //   $('#sidebar').sticky({
    //     topSpacing: 100,
    //     bottomSpacing: 1000
    //   });
    // } else {
    //   $('#sidebar').sticky({
    //     topSpacing: 100,
    //     bottomSpacing: 500
    //   });
    // }



  });



  </script>
@endsection
