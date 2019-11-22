@extends('mBlog.layouts.app')
@section('content')
  <!-- Blog Section Start -->
  <div class="blog-area white-bg pt-40 pb-120 clearfix">
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
                  @isset($category->category_data[0])
                    {{$category->category_data[0]->title}}
                  @endisset
                </h2>
                <ul class="clearfix">
                  <li><a href="index.html">Home</a><span>|</span> </li>
                  <li>{{($category->category_data) ? $category->category_data[0]->title : ''}}</li>
                </ul>
              </div>
            </div>
          </div>

          @if($posts && count($posts) > 0)
            <div class="row">
              @foreach ($posts as $key => $post)
                @isset($post->post_data[0])
                  @include('mBlog.partials.post_grid')
                @endisset
              @endforeach
            </div>
          @else
            <div class="alert alert-info mt-40">
              No Posts
            </div>
          @endif

        </div>
        <!-- Single Post End -->
      </div>
      <!-- Sidebar End -->
    </div>
  </div>
</div>
<!-- Blog Section End -->

<!-- Call To Action Section Start -->
<div class="cta-one black-bg ptb-75">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="cta-content clearfix">
          <div class="pull-left">
            <h1>We'd love to hear about your project</h1>
          </div>
          <div class="pull-right mr-100">
            <a href="contact.html" class="btn">Start project</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Call To Action Section End -->

@endsection
