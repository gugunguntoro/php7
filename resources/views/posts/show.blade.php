@extends('main')

@section('title', 'Post | '. $post->title)

@section('content')
    <div class="row">
      <div class="col-md-12"><hr>
        <div class="row">
          <div class="col-md-6">
            <p class="letter-spacing" style="font-variant: small-caps;"><a href="{{ url('category/' . $post->category->name) }}" style="padding: 0px;">{{ ucwords($post->category->name) }}</a></p>
            <h2  style="margin-top: -10px; line-height: 40px; font-weight: bold;">{{ $post->title }}</h2>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-8">
            <img src="{{ asset('images/' . $post->image) }}" alt="" class="img-fluid">
            <p style="font-style: oblique; margin-top: -5px; margin-bottom: 20px;"><small>{{ $post->image_desc }}</small></p>
            <p style="color:#9e9393; margin-top: -30px; font-size: 15px;"><small>Photograph By {{ $post->photo_by }}</small></p>
            <p>{!! $post->body !!}</p>
            <div class="tags">
              @foreach ($post->tags as $tag)
                <h6 style="display: inline-block"><span class="badge badge-dark">{{ $tag->name}}</span></h6>
              @endforeach
            </div>

            <hr>
          </div>
          <div class="col-md-4">
            <div class="well">
              <dl class="dl-horizontal">
                <dt>Url</dt>
                <dd><a href="{{ url('blog/'. $post->slug) }}">{{ url($post->slug) }}</a></dd>
              </dl>
              <dl class="dl-horizontal">
                <dt>Created At</dt>
                <dd>{{ date('F d, Y - h:i A', strtotime($post->created_at)) }}</dd>
              </dl>
              <dl class="dl-horizontal">
                <dt>Updated At</dt>
                <dd>{{ date('F d, Y - h:i A', strtotime($post->updated_at)) }}</dd>
              </dl>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-dark btn-block')) !!}
                  {{-- <a href="#" class="btn btn-primary btn-block">Edit</a> --}}
                </div>
                <div class="col-md-6">
                  {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                  {!! Form::submit('Deleted!!!!!!!!!!!!!', array('class' => 'btn btn-danger btn-block')) !!}
                  {!! Form::close() !!}

                  {{-- <form class="" action="" method="post">
                    <input type="submit" name="submit" value="Delete" class="btn btn-dark btn-block" style="width: 100%;">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                  </form> --}}

                </div>
              </div>
            </div>
            <a href="{{ route('posts.index') }}" class="btn btn-dark btn-block" style="margin-top: 10px;">View All</a>
          </div>
        </div>
      </div>
    </div>
@endsection
