@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Category - ID: {{$category->id}}</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.categories.update',$category->id) }}">
              @csrf

              <div class="form-group">
                <label for="parent_id">Category</label>
                <select class="form-control" name="parent_id" id="parent_id">
                  <option value="0">Main category</option>

                  @if($categories)
                    @foreach ($categories as $key => $value)
                      <option value="{{$value->id}}" {{($category->parent_id == $value->id) ? 'selected' : ''}}>{{($value->category_data[0]) ? $value->category_data[0]->title : ''}}</option>
                    @endforeach
                  @endif
                </select>
              </div>

              <ul class="nav nav-tabs" id="selectLang">
                @if($category->category_data_all)
                  @foreach ($category->category_data_all as $key => $category_data)
                    <li class="nav-item"><a class="nav-link {{($key == 0) ? 'active' : ''}}" data-toggle="tab" href="#{{$category_data->locale}}-content">{{getLocaleName($category_data->locale)}}</a></li>
                  @endforeach
                @endif
              </ul>

              @if(getOtherLocales())
                <ul class="nav pull-right">
                  @foreach (getOtherLocales() as $key => $locale)
                    @if(!$category->category_check_locale($locale->code))
                      <li class="nav-item"><a style="margin: 5px;" onclick="addLang(this,'{{$locale->code}}','{{$locale->name}}')" class="btn btn-primary btn-sm" href="javascript:void(0)">
                        <i class="mdi mdi-plus menu-icon"></i> Add {{$locale->name}}</a>
                      </li>
                    @endif
                  @endforeach
                </ul>
              @endif

              <div class="tab-content" style="padding:20px;" id="selectLangContent">
                @if($category->category_data_all)
                  @foreach ($category->category_data_all as $key => $category_data)
                    <div id="{{$category_data->locale}}-content" class="tab-pane fade {{($key == 0) ? 'in active show' : ''}} ">
                      <div class="form-group">
                        <label for="title_{{$category_data->locale}}">Category Name</label>
                        <input value="{{$category_data->title}}" type="text" class="form-control" name="title[{{$category_data->locale}}]" id="title_{{$category_data->locale}}" placeholder="Title">
                      </div>

                      <div class="form-group">
                        <label for="meta_description_{{$category_data->locale}}">Meta Description</label>
                        <input value="{{$category_data->meta_description}}" type="text" class="form-control" name="meta_description[{{$category_data->locale}}]" id="meta_description_{{$category_data->locale}}" placeholder="Meta Description">
                      </div>

                      <div class="form-group">
                        <label for="meta_keywords_{{$category_data->locale}}">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords[{{$category_data->locale}}]" value="{{$category_data->meta_keywords}}" id="meta_keywords_{{$category_data->locale}}" placeholder="With comma">
                      </div>
                    </div>
                  @endforeach
                @endif

              </div>

              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}" placeholder="">
              </div>

              <div class="form-group">
                <label for="menu_position">Menu Position</label>
                <input type="text" class="form-control" name="menu_position" id="menu_position" value="{{ $category->menu_position }}" placeholder="">
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" name="show_on_menu" class="form-check-input" {{($category->show_on_menu) ? 'checked' : ''}}>
                  Show on menu
                  <i class="input-helper"></i>
                </label>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">Update Category</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
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
    <label for="title_'+ lang +'">Category Name</label>\
    <input type="text" class="form-control" name="title['+ lang +']" id="title_'+ lang +'" placeholder="Title">\
    </div>\
    <div class="form-group">\
    <label for="meta_description_'+ lang +'">Meta Description</label>\
    <input type="text" class="form-control" name="meta_description['+ lang +']" id="meta_description_'+ lang +'" placeholder="Meta Description">\
    </div>\
    <div class="form-group">\
    <label for="meta_keywords_'+ lang +'">Meta Keywords</label>\
    <input type="text" class="form-control" name="meta_keywords['+ lang +']" id="meta_keywords_'+ lang +'" placeholder="With comma">\
    </div>\
    </div>');

  }
</script>
@endpush
