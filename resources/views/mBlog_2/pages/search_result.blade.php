@extends('mBlog.layouts.app')
@section('content')

  <div class="text-center pb-50">
    {!! getAds('category_top') !!}
  </div>

  <!-- Blog Section Start -->
  <div class="blog-area  pt-40 pb-120 clearfix">
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
                <h2>
                  @lang('site.search_result'): {{$search_query}}
                </h2>
              </div>
            </div>
          </div>

          @if($result && count($result) > 0)
            <div class="row">
              @foreach ($result as $key => $post)
                @isset($post->post_data()[0])
                  <div class="col-md-3">
                    @include('mBlog.partials.post_grid')
                  </div>
                @endisset
              @endforeach
            </div>
          @else
            <div class="alert alert-info mt-40">
              @lang('site.no_result')
            </div>
          @endif

          <div class="view-all text-center mt-40">
            {{$result}}
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
