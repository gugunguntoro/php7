@extends('main')

@section('title', 'Edit Blog')

@section('stylesheets')
    {!! Html::style('/css/smoke.css') !!}
    {!! Html::style('/css/select2.min.css') !!}
    {!! Html::script('https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=389wuwao3b4lwvie0bx588y6g0buq94nqrkw2jwx4od9b7b7') !!}

    <script type="text/javascript">
      tinymce.init({
        selector: 'textarea',  // change this value according to your HTML
        // auto_focus: 'element1',
        plugins: "link lists code image textcolor colorpicker",
        toolbar: "forecolor backcolor numlist bullist code image codesample",
        code_dialog_width: 1000,
        height: '480',
        toolbar: 'fontsizeselect forecolor backcolor numlist bullist',
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        file_browser_callback_types: 'file image media'
      });
    </script>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <hr>
      <div class="row">
        <div class="col-md-2">
          <h2 class="text-center">Edit Post</h2><hr>
        </div>
        <div class="col-md-10">
<hr>
        </div>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-md-2">
      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
        <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;<small>{{ date('d-m-Y  h:i A', strtotime($post->created_at)) }}</small><hr>
        <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;&nbsp;<small>{{ date('d-m-Y  h:i A', strtotime($post->updated_at)) }}</small><hr>
      <div class="row">
        <div class="col-md-6">
          {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-dark btn-sm')) !!}
          {{-- <a href="#" class="btn btn-danger btn-sm">Cancel</a> --}}
        </div>
        <div class="col-md-6">
          {{ Form::submit('Save', ['class' => 'btn btn-dark btn-sm']) }}
          {{-- {!! Html::linkRoute('momentums.update', 'Save', array($momentum->id), array('class' => 'btn btn-success btn-sm')) !!} --}}
          {{-- <a href="#" class="btn btn-success btn-sm">save</a> --}}
        </div>
      </div><hr>
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-8" style="margin-top:-27px;">


          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <img src="{{ asset('images/'. $post->image) }}" alt="" class="img-fluid"><hr>
                </div><br>
              </div>
            </div>
            {{ Form::label('image', 'Image : ') }}
            {{ Form::file('featured_image') }}

            {{ Form::label('image', 'Image Head: ') }}
            {{ Form::file('image_head') }}
          </div>

          <div class="md-form">
            {{ Form::label('image_desc', 'Description :') }}
            {{ Form::text('image_desc', null, array('class' => 'form-control', 'id' => 'form1')) }}<hr>
          </div>

          <div class="md-form">
            {{ Form::label('photo_by', 'Photograph By :') }}
            {{ Form::text('photo_by', null, array('class' => 'form-control', 'id' => 'form1')) }}<hr>
          </div>

          <div class="md-form">
            {{ Form::label('form1', 'Title :') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'id' => 'form1')) }}<hr>
          </div>

          <div class="md-form">
            {{ Form::label('form1', 'Slug :') }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'id' => 'form1')) }}<hr>
          </div>

          {{ Form::label('category_id', 'Category :') }}
          {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

          {{ Form::label('tags', 'Tags :') }}
          {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

          <hr>

          <div class="row">
            <div class="col-md-10">
              <div class="Form-group">
            {{ Form::label('form7', 'Body :') }}
            {{ Form::textarea('body', null, array('class' => 'md-textarea', 'id' => 'form7')) }}
          </div><br>
            </div>
          </div>
          


        {{--  --}}

    </div>
    {!! Form::close() !!}
  </div>
@endsection

@section('scripts')
  {!! Html::script('/js/smoke.min.js') !!}
  {!! Html::script('/js/select2.min.js') !!}

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@endsection
