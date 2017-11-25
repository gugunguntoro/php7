@extends('main')

@section('title', 'Create')

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
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt'
      });
    </script>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <hr>
      <div class="row">
        <div class="col-md-2">
          <h2 class="text-left" style="font-variant: small-caps;">New Post</h2><hr>
        </div>
        <div class="col-md-8">
<hr>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-md-center">
    <div class="col-md-8">

        {!! Form::open(array('route' => 'posts.store', 'files' => true)) !!}

          <div class="form-group">
            {{ Form::label('image', 'Image : ') }}
            {{ Form::file('featured_image') }}
          </div>

          <div class="form-group">
            {{ Form::label('image', 'Image Head : ') }}
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

          {{ Form::label('category_id', 'Category : ') }}
          <select class="form-control" name="category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
           @endforeach
          </select><hr>

         {{ Form::label('tags', 'Tags : ') }}
         <select class="form-control select2-multi" name="tags[]" multiple="multiple">
           @foreach($tags as $tag)
           <option value="{{ $tag->id }}">{{ ucwords($tag->name) }}</option>
          @endforeach
         </select><hr>

         <div class="row">
           <div class="col-md-12">
             <div class="Form-group">
            {{ Form::label('form7', 'Body :') }}
            {{ Form::textarea('body', null, array('class' => 'md-textarea', 'id' => 'form7')) }}
          </div>
           </div>
         </div>

          

          <div class="text-left">
            {{ Form::submit('Create Post', array('class' => 'btn btn-indigo')) }}
          </div>

        {!! Form::close() !!}

    </div>
  </div>
@endsection

@section('scripts')
  {!! Html::script('/js/smoke.min.js') !!}
  {!! Html::script('/js/select2.min.js') !!}

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@endsection
