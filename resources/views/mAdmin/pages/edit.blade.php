@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit page - ID: {{$page->id}}</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.pages.update',$page->id) }}">
              @csrf

              <ul class="nav nav-tabs" id="selectLang">
                @if($page->page_data_all)
                  @foreach ($page->page_data_all as $key => $page_data)
                    <li class="nav-item"><a class="nav-link {{($key == 0) ? 'active' : ''}}" data-toggle="tab" href="#{{$page_data->locale}}-content">{{getLocaleName($page_data->locale)}}</a></li>
                  @endforeach
                @endif
              </ul>


              @if(getOtherLocales())
                <ul class="nav pull-right">
                  @foreach (getOtherLocales() as $key => $locale)
                    @if(!$page->page_check_locale($locale->code))
                      <li class="nav-item"><a style="margin: 5px;" onclick="addLang(this,'{{$locale->code}}','{{$locale->name}}')" class="btn btn-primary btn-sm" href="javascript:void(0)">
                        <i class="mdi mdi-plus menu-icon"></i> Add {{$locale->name}}</a>
                      </li>
                    @endif
                  @endforeach
                </ul>
              @endif


              <div class="tab-content" style="padding:20px;" id="selectLangContent">
                @if($page->page_data_all)
                  @foreach ($page->page_data_all as $key => $page_data)
                    <div id="{{$page_data->locale}}-content" class="tab-pane fade {{($key == 0) ? 'in active show' : ''}} ">

                      <div class="form-group">
                        <label for="title_{{$page_data->locale}}">Title</label>
                        <input value="{{$page_data->title}}" type="text" class="form-control" name="title[{{$page_data->locale}}]" id="title_{{$page_data->locale}}" placeholder="Title">
                      </div>

                      <input value="{{$page_data->id}}" type="hidden" name="page_data_id[{{$page_data->locale}}]">
                      <div class="form-group">
                        <label for="text_{{$page_data->locale}}">Content</label>
                        <textarea name="text[{{$page_data->locale}}]" class="form-control my-editor">{!! $page_data->text !!}</textarea>
                      </div>

                    </div>
                  @endforeach
                @endif

              </div>

              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ $page->slug }}" placeholder="">
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" name="publish" class="form-check-input" {{($page->publish) ? 'checked' : ''}}>
                  Publish
                  <i class="input-helper"></i>
                </label>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">Update Page</button>
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
    <input type="text" class="form-control" name="n_title['+ lang +']" id="title_'+ lang +'" placeholder="Title">\
    </div>\
    <div class="form-group">\
    <label for="text_'+ lang +'">Content</label>\
    <textarea class="form-control my-editor" name="n_text['+ lang +']" id="text_'+ lang +'"></textarea>\
    </div>\
    </div>');
    $('textarea.my-editor').ckeditor(options);
  }

</script>
@endpush
