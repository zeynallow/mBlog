@extends('mBlog.layouts.app')
@section('content')

  <div class="text-center pt-30 pb-30">
    {!! getAds('category_top') !!}
  </div>

  <!-- Blog Section Start -->
  <div class="blog-area pt-40 pb-120 clearfix">
    <div class="container">
      <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12 mobi-mb-50">

          <div class="row">
            <div class="col-xs-12">
              <div class="breadcrumbs-menu">
                <h2>
                  @isset($category->category_data()[0])
                    {{$category->category_data()[0]->title}}
                  @endisset
                </h2>
                <ul class="clearfix">
                  <li><a href="index.html">@lang('site.home')</a><span>|</span> </li>
                  <li>{{($category->category_data()) ? $category->category_data()[0]->title : ''}}</li>
                </ul>
              </div>
            </div>
          </div>

          @if($posts && count($posts) > 0)
            <div class="row">
              @foreach ($posts as $key => $post)
                @isset($post->post_data()[0])
                  <div class="col-md-3">
                    @include('mBlog.partials.post_grid')
                  </div>
                @endisset
              @endforeach
            </div>
          @else
            <div class="alert alert-info mt-40">
              @lang('site.no_posts')
            </div>
          @endif

          <div class="view-all text-center mt-40">
            {{$posts}}
          </div>


          <div class="text-center pb-50">
            {!! getAds('category_bottom') !!}
          </div>

        </div>
        <!-- Single Post End -->
      </div>
      <!-- Sidebar End -->
    </div>
  </div>
</div>
<!-- Blog Section End -->


@endsection
