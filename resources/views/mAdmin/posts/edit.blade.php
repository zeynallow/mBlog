@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('admin.edit_post') - ID: {{$post->id}}</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.posts.update',$post->id) }}">
              @csrf
              <div class="form-group">
                <label for="category">@lang('admin.category')</label>
                <select class="form-control" name="category_id" id="category">
                  <option value="">@lang('admin.select')</option>
                  @if($categories)
                    @foreach ($categories as $key => $value)
                      <option value="{{$value->id}}" {{($post->category_id == $value->id) ? 'selected' : ''}}>{{($value->category_data()[0]) ? $value->category_data()[0]->title : ''}}</option>
                    @endforeach
                  @endif
                </select>
              </div>

              <div class="form-group">
                <label for="subcategory">@lang('admin.sub_category')</label>
                <select class="form-control" name="subcategory_id" id="subcategory">
                  <option value="">@lang('admin.select')</option>
                </select>
              </div>


              <ul class="nav nav-tabs" id="selectLang">
                @if($post->post_data_all)
                  @foreach ($post->post_data_all as $key => $post_data)
                    <li class="nav-item"><a class="nav-link {{($key == 0) ? 'active' : ''}}" data-toggle="tab" href="#{{$post_data->locale}}-content">{{getLocaleName($post_data->locale)}}</a></li>
                  @endforeach
                @endif
              </ul>


              @if(getOtherLocales())
                <ul class="nav pull-right">
                  @foreach (getOtherLocales() as $key => $locale)
                    @if(!$post->post_check_locale($locale->code))
                      <li class="nav-item"><a style="margin: 5px;" onclick="addLang(this,'{{$locale->code}}','{{$locale->name}}')" class="btn btn-primary btn-sm" href="javascript:void(0)">
                        <i class="mdi mdi-plus menu-icon"></i> @lang('admin.add') {{$locale->name}}</a>
                      </li>
                    @endif
                  @endforeach
                </ul>
              @endif


              <div class="tab-content" style="padding:20px;" id="selectLangContent">
                @if($post->post_data_all)
                  @foreach ($post->post_data_all as $key => $post_data)
                    <div id="{{$post_data->locale}}-content" class="tab-pane fade {{($key == 0) ? 'in active show' : ''}} ">

                      <div class="form-group">
                        <label for="title_{{$post_data->locale}}">@lang('admin.title')</label>
                        <input value="{{$post_data->title}}" type="text" class="form-control" name="title[{{$post_data->locale}}]" id="title_{{$post_data->locale}}" placeholder="@lang('admin.title')">
                      </div>

                      <input value="{{$post_data->id}}" type="hidden" name="post_data_id[{{$post_data->locale}}]">
                      <div class="form-group">
                        <label for="text_{{$post_data->locale}}">@lang('admin.content')</label>
                        <textarea name="text[{{$post_data->locale}}]" class="form-control my-editor">{!! $post_data->text !!}</textarea>
                      </div>

                    </div>
                  @endforeach
                @endif

              </div>

              <div class="form-group">
                <label for="slug">@lang('admin.slug')</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ $post->slug }}" placeholder="">
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" name="featured" class="form-check-input" {{($post->featured) ? 'checked' : ''}}>
                  @lang('admin.featured')
                  <i class="input-helper"></i>
                </label>
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" name="publish" class="form-check-input" {{($post->publish) ? 'checked' : ''}}>
                  @lang('admin.publish')
                  <i class="input-helper"></i>
                </label>
              </div>

              <div class="row" style="padding-bottom:20px;">
                <div class="col-md-8">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> @lang('admin.cover_image')
                      </button>
                    </span>
                    <input id="thumbnail" style="display:none;" value="{{($post->cover) ? $post->cover : '' }}" name="cover" class="form-control" type="text">
                  </div>
                </div>
                <div class="col-md-4">
                  <img id="holder" {{($post->cover) ? 'src='.$post->cover.'' : '' }} style="margin-top:15px;max-height:100px;">
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">@lang('admin.update')</button>
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
  <script src="{{ asset('/mAdmin_assets/vendors/ckeditor/ckeditor.js')}}"></script>
  <script src="{{ asset('/mAdmin_assets/vendors/ckeditor/adapters/jquery.js')}}"></script>
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
    <label for="title_'+ lang +'">@lang('admin.title')</label>\
    <input type="text" class="form-control" name="n_title['+ lang +']" id="title_'+ lang +'" placeholder="@lang('admin.title')">\
    </div>\
    <div class="form-group">\
    <label for="text_'+ lang +'">@lang('admin.content')</label>\
    <textarea class="form-control my-editor" name="n_text['+ lang +']" id="text_'+ lang +'"></textarea>\
    </div>\
    </div>');
    $('textarea.my-editor').ckeditor(options);
  }

  /* Category Select */
  $('#category').change(function(){
    var category_id = $(this).val();
    $("#subcategory").empty().html('<option value="">@lang('admin.select')</option>');
    loadSubCategory(category_id,0);
  });


  function loadSubCategory(category_id,subcategory_id){
    $.ajax({
      url:"{{ route('mAdmin.categories.getSubCategoryForSelect',['category_id'=>'']) }}/"+ category_id,
      success:function(data){
        $.each(data, function( index, value ) {
          if(value.category_id == subcategory_id){
            var check = 'selected';
          }else{
            var check = null;
          }
          $("#subcategory").append('<option '+ check +' value="'+ value.category_id +'">'+ value.title +'</option>');
        });
      },
      error:function(data){
        console.log("error",data);
      }
    });
  }

  loadSubCategory({{$post->category_id}},{{$post->subcategory_id}});

</script>
@endpush
