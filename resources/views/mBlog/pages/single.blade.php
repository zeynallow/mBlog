@extends('mBlog.layouts.app')
@section('content')

  <div class="text-center pb-50">
    {!! getAds('page_top') !!}
  </div>

  <!-- Blog Section Start -->
  <div class="blog-area blog-details white-bg pt-40 pb-120 clearfix">
    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-4 col-md-3 hide-mobile">
          @include('mBlog.partials.sidebar')
        </div>
        <!-- Sidebar End -->

        <div class="col-xs-12 col-sm-8 col-md-9 mobi-mb-50">

          <div class="row">
            <div class="col-xs-12">
              <div class="breadcrumbs-menu">
                <h2>{{$page->page_data()[0]->title}}</h2>
              </div>
            </div>
          </div>

          <div class="blog-post clearfix pt-40">

            <div class="blog-text mb-70">

              {!!$page->page_data()[0]->text!!}

            </div>

          </div>
          <!-- Single Post End -->
          <div class="text-center pb-50">
            {!! getAds('page_bottom') !!}
          </div>
        </div>
        <!-- Sidebar End -->
      </div>
    </div>
  </div>
@endsection
