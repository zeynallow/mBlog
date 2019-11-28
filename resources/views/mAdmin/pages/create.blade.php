@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create page</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.pages.store') }}">
              @csrf


              <ul class="nav nav-tabs" id="selectLang">
                @if(getDefaultLocale())
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#{{getDefaultLocale()->code}}-content">{{getDefaultLocale()->name}}</a></li>
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
                  <input type="checkbox" name="publish" class="form-check-input" {{(old('publish')) ? 'checked' : ''}}>
                  Publish
                  <i class="input-helper"></i>
                </label>
              </div>


              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">Create Page</button>
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
  $("#title_{{getDefaultLocale()->code}}").keyup(function(){
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
    <label for="text_'+ lang +'">Content</label>\
    <textarea class="form-control my-editor" name="text['+ lang +']" id="text_'+ lang +'"></textarea>\
    </div>\
    </div>');
    $('textarea.my-editor').ckeditor(options);
  }

</script>
@endpush
