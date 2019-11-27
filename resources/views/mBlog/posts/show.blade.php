@extends('mBlog.layouts.app')
@section('content')

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
                <h2>{{$post->post_data()[0]->title}}</h2>
                <ul class="clearfix pull-left">
                  @if($post->category)
                    <li><a href="{{route('category.index', $post->category->slug)}}"><i class="zmdi zmdi-apps"></i> {{$post->category->category_data()[0]->title}}</a></li>
                  @endif
                  @if($post->subcategory)
                    <li><a href="{{route('subcategory.index', [$post->category->slug,$post->subcategory->slug])}}"><span class="zmdi zmdi-chevron-right"></span>{{$post->subcategory->category_data()[0]->title}}</a></li>
                  @endif
                </ul>
                <ul class="pull-right">
                  <li><i class="zmdi zmdi-calendar"></i> {{$post->created_at->diffForHumans()}}<span>|</span></li>
                  <li><i class="zmdi zmdi-account"></i> {{($post->author) ? $post->author->name  : '' }} <span>|</span></li>
                  <li><i class="zmdi zmdi-eye"></i> {{$post->views}}</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="blog-post clearfix pt-40">

            @if($post->cover)
              <div class="thumb mb-60">
                <img src="{{$post->cover}}" alt="{{$post->post_data()[0]->title}}" />
              </div>
            @endif

            <div class="blog-text mb-70">

              {!!$post->post_data()[0]->text!!}

              <div class="tag mt-50">
                <strong>Tags:</strong> <a href="#">Corporate,</a> <a href="#">HTML,</a><a href="#">WordPress,</a><a href="#">Design</a>
              </div>
            </div>


            <div class="comment-box plr-50">
              <h3 class="mb-30">Leave a Comment</h3>
              <form class="custom-input" action="#">
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    <input type="text" name="name" placeholder="Your Name" />
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <input type="email" name="email" placeholder="Your Email" />
                  </div>
                </div>
                <textarea name="message" id="comment" rows="2" placeholder="Your Massage"></textarea>
                <button class="btn theme-btn mt-20" type="submit" name="submit">Post a Comment</button>
              </form>
            </div>
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
