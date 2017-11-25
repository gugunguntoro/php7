@extends('main')

@section('title', 'Tag | '. $tag->name)

@section('content')
  <div class="row">
    <div class="col-md-8">
      <hr><h1>{{ $tag->name }} Tag <small>{{ $tag->posts->count()  }} Posts</small></h1><hr>
    </div>
    <div class="col-md-2">
      <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-dark pull-right" style="margin-top: 32px;">Edit</a>
    </div>
    <div class="col-md-2">
      {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-dark', 'style' => 'margin-top: 32px;']) }}
      {{ Form::close() }}
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Tags</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tag->posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>
              @foreach($post->tags as $tag)
                <h6><span class="badge badge-dark">{{ $tag->name}}</span></h6>
              @endforeach
            </td>
            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-dark">View</a></td>
          </tr>
      @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
