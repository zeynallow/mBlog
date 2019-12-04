@extends('mBlog.layouts.app')
@section('content')

  <div class="text-center pt-30 pb-30">
    {!! getAds('page_top') !!}
  </div>

  <!-- Blog Section Start -->
  <div class="blog-area blog-details pt-40 pb-120 clearfix">
    <div class="container">
      <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12 mobi-mb-50">

          <div class="i-blog-post mt-40">
            <div class="row">
              <div class="col-xs-12">
                <div class="breadcrumbs-menu">
                  <h2>{{$page->page_data()[0]->title}}</h2>
                </div>
              </div>
            </div>

            <div class="blog-text">
              {!!$page->page_data()[0]->text!!}
            </div>
          </div>
        </div>
      </div>



      <div class="text-center mt-50">
        {!! getAds('page_bottom') !!}
      </div>

    </div>
  </div>
@endsection
