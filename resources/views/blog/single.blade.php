@extends('main')

@section('title', $post->title)

@section('stylesheets')
  <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection

@section('content')

  <div class="container single">
    <div class="row">
      <div class="card card-single">
      <div class="col-md-12" style="padding-top: 8px;">
        <div class="row">
          <div class="col-md-12">
            <p class="letter-spacing" style=""><a href="{{ url('category/' . $post->category->name) }}" style="padding: 0px;">{{ ucwords($post->category->name) }}</a></p>

            <h2 class="title-h2-blog" >{{ $post->title }}</h2>
            <div class="row">
              <div class="col-md-12 medsos">
                <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Hello%20world"><img class="twitter" src="/images/twitter.png"></a>
                <div data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"><img class="facebook" src="/images/facebook-letter-logo.png"></a>
                </div>

              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-8">
            <img src="{{ asset('images/' . $post->image) }}" alt="" class="img-fluid">
            <p class="paragraf-photo"><small>{{ $post->image_desc }}</small></p>
            <p class="paragraf-photo-by"><small>Photograph By {{ $post->photo_by }}</small></p>
            <div class="row justify-content-md-center">
              <div class="col-md-10 body-single-col">
              <p class="paragraf-body">{!! $post->body !!}</p>
              <div class="tags">
                @foreach ($post->tags as $tag)
                  <h6 class="tags-h6" style=""><span class="badge badge-dark">{{ $tag->name}}</span></h6>
                @endforeach
                
              </div>
              </div>
            </div>

          </div>
          <div class="col-md-4">
            <div class="card" style="border-radius: 0px; margin-bottom: 20px;">
             <div class="card-body">
               <h3>Judul</h3><hr>
               <div class="row">
                 @foreach($lol as $lo)
                 <div class="col-md-6 col-sm-6" style="padding: 6px;">
                   <img src="{{ asset('images/'. $lo->image_head) }}" alt="..."  class="img-fluid" style="border: 0px solid white;">
                   <a href="{{ url('blog/'. $lo->slug) }}"><p class="paragraf-sidebar">{{ $lo->title }}</p></a>
                   <p class="card-text" style="margin: -5px 0 5px 5px;"><small class="text-muted">{{ $lo->created_at->diffForHumans() }}</small></p>
                 </div>
                @endforeach
               </div>

             </div>
           </div>
          </div>
        </div>

      </div>

      </div>
{{-- <div class="list-color"></div> --}}
    </div><br>
  </div>

  <div class="container sidepost">
    <div class="row">
@foreach($humans as $human)
    <div class="card card-singel-one">
      <div class="col-md-12">
        <div class="row">


          <div class="col-md-6" style="padding: 0px;">
            <img src="{{ asset('images/'. $human->image) }}" alt="" class="img-fluid card-single-img">

          </div>
          <div class="col-md-6 col-card-human">
            <h3 class="paragraf-h3-human"><a href="{{ url('blog', $human->slug) }}" style="color: white;">{{ $human->title }}</a></h3>
            <div class="row">
              {{-- @foreach($films as $film) --}}
              <div class="col-md-6" style="padding: 25px 15px 10px 15px;">
                <p class="small-human"><strong>{!! substr(strip_tags($human->body), 0, 110) !!} {{ strlen($human->body) ? '__' : '' }}</strong></p>
              </div>
              <div class="col-md-6" style="padding: 10px 15px 10px 15px;">
                <small class="date-small" style=""><strong>{{ $human->created_at->toDayDateTimeString() }}</strong></small>
              </div>
            {{-- @endforeach --}}
            </div>
          </div>
        </div>

        </div>
      </div>
      @endforeach
    </div>
  </div>





@endsection

@section('scripts')
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11&appId=173332599896480';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>



@endsection
