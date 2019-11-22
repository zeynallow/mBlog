@extends('mBlog.layouts.app')
@section('content')

  <section class="pb-50">
    <div id="one-item" class="one-item project-image">
      <div class="item" style="background-image:url('assets/img/portfolio/details/l1.jpg')">
        <a class="" href="blog-details.html">
          <h3>Aperiam I Will Give you a Must</h3>
          <h6>March 15, 2018 By Admin</h6>
          <p>I will give you a complete ofe system expound ttual teachi struth...</p>
        </a>
      </div>
      <div class="item" style="background-image:url('assets/img/portfolio/details/l1.jpg')">
        <a class="" href="blog-details.html">
          <h3>Aperiam I Will Give you a Must</h3>
          <h6>March 15, 2018 By Admin</h6>
          <p>I will give you a complete ofe system expound ttual teachi struth...</p>
        </a>
      </div>
      <div class="item" style="background-image:url('assets/img/portfolio/details/l2.jpg')">
        <a class="" href="blog-details.html">
          <h3>Aperiam I Will Give you a Must</h3>
          <h6>March 15, 2018 By Admin</h6>
          <p>I will give you a complete ofe system expound ttual teachi struth...</p>
        </a>
      </div>
      <div class="item" style="background-image:url('assets/img/portfolio/details/l3.jpg')">
        <a class="" href="blog-details.html">
          <h3>Aperiam I Will Give you a Must</h3>
          <h6>March 15, 2018 By Admin</h6>
          <p>I will give you a complete ofe system expound ttual teachi struth...</p>
        </a>
      </div>
    </div>
  </section>

  <div class="blog-area white-bg">
    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-4 col-md-3 hide-mobile">
          @include('mBlog.partials.sidebar')
        </div>
        <!-- Sidebar End -->

        <div class="col-xs-12 col-sm-8 col-md-9 mobi-mb-50">

          <div class="section-title">
            <h2>Last posts</h2>
          </div>

          @if($lastPosts)
            <div class="row">
              @foreach ($lastPosts as $key => $post)
                @isset($post->post_data[0])
                  <!--post-->
                  <div class="col-md-4">
                    <div class="blog-post mt-25">
                      <div class="thumb">
                        <a href="{{ route('post.show',['post_id'=>$post->id,'slug'=>$post->slug]) }}"><img src="{{ $post->cover }}" alt="{{$post->post_data[0]->title}}" /></a>
                      </div>
                      <div class="blog-text pt-25">
                        <a href="{{ route('post.show',['post_id'=>$post->id,'slug'=>$post->slug]) }}"><h3>{{$post->post_data[0]->title}}</h3></a>
                        <h6>{{$post->created_at->diffForHumans()}} By Admin</h6>
                        <p>{!! str_limit($post->post_data[0]->text,100) !!}</p>
                        <a class="read-more mt-25" href="{{ route('post.show',['post_id'=>$post->id,'slug'=>$post->slug]) }}">read more</a>
                      </div>
                    </div>
                  </div>
                  <!--post end-->
                @endisset
              @endforeach
            </div>
          @else
            <div class="alert alert-info">
              No Posts
            </div>
          @endif



          <div class="view-all text-center">
            <a class="btn theme-btn mt-80" id="load-more-btn" href="javascript:void(0)">Load More</a>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
