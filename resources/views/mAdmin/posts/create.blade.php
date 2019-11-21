@extends('mAdmin.layouts.app')
@section('content')

  <div class="main-panel">
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
                  <select class="form-control" id="category">
                    <option value="">Select...</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="subcategory">Sub-Category</label>
                  <select class="form-control" id="subcategory">
                    <option value="">Select...</option>
                  </select>
                </div>

                <ul class="nav nav-tabs" id="selectLang">
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#en-content">English</a></li>
                </ul>

                <ul class="nav pull-right">
                  <li class="nav-item"><a style="margin: 5px;" onclick="addLang(this,'tr','Turkish')" class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="mdi mdi-plus menu-icon"></i> Add Turkish</a></li>
                  <li class="nav-item"><a style="margin: 5px;" onclick="addLang(this,'az','Azeri')" class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="mdi mdi-plus menu-icon"></i> Add Azerbaijani</a></li>
                </ul>

                <div class="tab-content" style="padding:20px;" id="selectLangContent">
                  <div id="en-content" class="tab-pane fade in active show">
                    <div class="form-group">
                      <label for="title_en">Title</label>
                      <input value="{{ old('title.en') }}" type="text" class="form-control" name="title[en]" id="title_en" placeholder="Title">
                    </div>

                    <div class="form-group">
                      <label for="text_en">Content</label>
                      <textarea class="form-control" name="text[en]" id="text_en">{{ old('text.en') }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="keywords_en">Keywords</label>
                      <input type="text" class="form-control" name="keywords[en]" value="{{ old('keywords.en') }}" id="keywords_en" placeholder="With comma">
                    </div>
                  </div>
                  
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
                    <input type="checkbox" name="publish" class="form-check-input" {{(old('featured')) ? 'checked' : ''}}>
                    Publish
                    <i class="input-helper"></i>
                  </label>
                </div>


                <button type="submit" class="btn btn-primary mr-2">Create</button>
                <button class="btn btn-light">Cancel</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script type="text/javascript">

  function slugify(string) {
    const a = 'àáâäæãåāăąəçćčđďèéêëēėęěğǵḧîïíīįìıłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
    const b = 'aaaaaaaaaaecccddeeeeeeeegghiiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------'
    const p = new RegExp(a.split('').join('|'), 'g')

    return string.toString().toLowerCase()
    .replace(/\s+/g, '-') // Replace spaces with -
    .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
    .replace(/&/g, '-and-') // Replace & with 'and'
    .replace(/[^\w\-]+/g, '') // Remove all non-word characters
    .replace(/\-\-+/g, '-') // Replace multiple - with single -
    .replace(/^-+/, '') // Trim - from start of text
    .replace(/-+$/, '') // Trim - from end of text
  }

  $("#title_en").keyup(function(){
    var slug = slugify($(this).val());
    $("#slug").val(slug);
  });

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
    <textarea class="form-control" name="text['+ lang +']" id="text_'+ lang +'"></textarea>\
    </div>\
    <div class="form-group">\
    <label for="keywords_tr">Keywords</label>\
    <input type="text" class="form-control" name="keywords['+ lang +']" id="keywords_'+ lang +'" placeholder="With comma">\
    </div>\
    </div>');
  }

  </script>
@endpush
