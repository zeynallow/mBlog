@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create post</h4>
            <hr/>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form class="forms-sample" method="post" action="{{ route('mAdmin.posts.store') }}">
              @csrf

              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category_id" id="category">
                  <option value="">Select...</option>
                  @if($categories)
                    @foreach ($categories as $key => $value)
                      <option value="{{$value->id}}">{{($value->category_data()[0]) ? $value->category_data()[0]->title : ''}}</option>
                    @endforeach
                  @endif
                </select>
              </div>

              <div class="form-group">
                <label for="subcategory">Sub-Category</label>
                <select class="form-control" name="subcategory_id" id="subcategory">
                  <option value="">Select...</option>
                </select>
              </div>

              <ul class="nav nav-tabs" id="selectLang">
                @if(getDefaultLocale())
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#en-content">{{getDefaultLocale()->name}}</a></li>
                @endif
              </ul>

              @if(getOtherLocales())
                <ul class="nav pull-right">
                  @foreach (getOtherLocales() as $key => $locale)
                    <li class="nav-item"><a style="margin: 5px;" onclick="addLang(this,'{{$locale->code}}','{{$locale->name}}')" class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="mdi mdi-plus menu-icon"></i> Add {{$locale->name}}</a></li>
                  @endforeach
                </ul>
              @endif

              <div class="tab-content" style="padding:20px;" id="selectLangContent">
                @if(getDefaultLocale())
                  <div id="{{getDefaultLocale()->code}}-content" class="tab-pane fade in active show">
                    <div class="form-group">
                      <label for="title_{{getDefaultLocale()->code}}">Title</label>
                      <input value="{{ old('title.'.getDefaultLocale()->code) }}" type="text" class="form-control" name="title[{{getDefaultLocale()->code}}]" id="title_{{getDefaultLocale()->code}}" placeholder="Title">
                    </div>

                    <div class="form-group">
                      <label for="text_{{getDefaultLocale()->code}}">Content</label>
                      <textarea name="text[{{getDefaultLocale()->code}}]" class="form-control my-editor">{!! old('text.en'.getDefaultLocale()->code) !!}</textarea>
                    </div>

                  </div>
                @endif

              </div>

              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" placeholder="">
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" name="featured" class="form-check-input" {{(old('featured')) ? 'checked' : ''}}>
                  Featured
                  <i class="input-helper"></i>
                </label>
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" name="publish" class="form-check-input" {{(old('publish')) ? 'checked' : ''}}>
                  Publish
                  <i class="input-helper"></i>
                </label>
              </div>

              <div class="row" style="padding-bottom:20px;">
                <div class="col-md-8">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Cover image
                      </button>
                    </span>
                    <input id="thumbnail" style="display:none;" name="cover" class="form-control" type="text">
                  </div>
                </div>
                <div class="col-md-4">
                  <img id="holder" style="margin-top:15px;max-height:100px;">
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">Create Post</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
  <script src="{{ asset('/mAdmin/vendors/ckeditor/ckeditor.js')}}"></script>
  <script src="{{ asset('/mAdmin/vendors/ckeditor/adapters/jquery.js')}}"></script>
  <script>
  /* File Manager */
  $('#lfm').filemanager('image');

  /* CK Editor */
  var options = {
    filebrowserImageBrowseUrl: '/mAdmin/filemanager?type=Images',
    filebrowserImageUploadUrl: '/mAdmin/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/mAdmin/filemanager?type=Files',
    filebrowserUploadUrl: '/mAdmin/filemanager/upload?type=Files&_token='
  };
  $('textarea.my-editor').ckeditor(options);


  /* Slug Generate */
  $("#title_en").keyup(function(){
    var slug = slugify($(this).val());
    $("#slug").val(slug);
  });

  /* Add Language */
  function addLang(obj,lang,lang_name){
    $(obj).remove();
    $("#selectLang").append('<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#'+ lang +'-content">'+ lang_name +'</a></li>');
    $("#selectLangContent").append('<div id="'+ lang +'-content" class="tab-pane fade">\
    <div class="form-group">\
    <label for="title_'+ lang +'">Title</label>\
    <input type="text" class="form-control" name="title['+ lang +']" id="title_'+ lang +'" placeholder="Title">\
    </div>\
    <div class="form-group">\
    <label for="text_tr">Content</label>\
    <textarea class="form-control my-editor" name="text['+ lang +']" id="text_'+ lang +'"></textarea>\
    </div>\
    </div>');
    $('textarea.my-editor').ckeditor(options);
  }

  /* Category Select */
  $('#category').change(function(){
    var category_id = $(this).val();
    $("#subcategory").empty().html('<option value="">Select...</option>');

    $.ajax({
      url:"{{ route('mAdmin.categories.getSubCategoryForSelect',['category_id'=>'']) }}/"+ category_id,
      success:function(data){
        $.each(data, function( index, value ) {
          $("#subcategory").append('<option value="'+ value.category_id +'">'+ value.title +'</option>');
        });
      },
      error:function(data){
        console.log("error",data);
      }
    })
  });

</script>
@endpush
