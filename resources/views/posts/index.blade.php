@extends('main')

@section('title', 'Blog')

@section('content')
  <div class="row">
    <div class="col-md-12"><hr>
      <div class="row">
        <div class="col-md-10">
            <h4 class="text-center" style="font-variant: small-caps">Posts</h4><hr>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Photo</th>
      <th>Title</th>
      <th>Body</th>
      <th>Category</th>
      <th>Created At</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <td><img src="{{ asset('images/'. $post->image) }}" alt="" class="img-fluid"></td>
      <td>{{ $post->title }}</td>
      <td>{!! substr(strip_tags($post->body),0,100) !!}  {{ strlen($post->body) ? '__' : '' }}</td>
      <td>{{ ucwords($post->category->name) }}</td>
      <td>{{ date('F d, Y', strtotime($post->created_at)) }}</td>
      <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-dark btn-block">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-dark btn-block">Edit</a></td>
    </tr>
@endforeach
  </tbody>
</table>

        </div>

        <div class="col-md-2">
          <a href="{{ route('posts.create') }}" class="btn btn-dark btn-block">New Post</a>
        </div>
          <div class="col-md-1">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
          </div>

      </div>
    </div>

  </div>
@endsection
