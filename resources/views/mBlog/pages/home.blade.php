@extends('mBlog.layouts.app')
@section('content')

  @if($featuredPosts)
    <section class="pb-50">
      <div id="one-item" class="one-item project-image">
        @foreach ($featuredPosts as $key => $fpost)
          @isset($fpost->post_data()[0])
            <div class="item" style="background-image:url('{{$fpost->cover}}')">
              <a href="{{ route('post.show',['post_id'=>$fpost->id,'slug'=>$fpost->slug]) }}">
                <h3>{{$fpost->post_data()[0]->title}}</h3>
                <h6>{{$fpost->created_at->diffForHumans()}} | {{($fpost->author) ? $fpost->author->name : ''}}</h6>
                <p>{!! str_limit($fpost->post_data()[0]->text,100) !!}</p>
              </a>
            </div>
          @endisset
        @endforeach
      </div>
    </section>
  @endif

  <div class="text-center pb-50">
    {!! getAds('home_top') !!}
  </div>


  <div class="blog-area white-bg">
    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-4 col-md-3 hide-mobile">
          @include('mBlog.partials.sidebar')
        </div>

        <div class="col-xs-12 col-sm-8 col-md-9 mobi-mb-50">

          <div class="section-title">
            <h2>Last posts</h2>
          </div>

          @if($lastPosts && count($lastPosts))
            <div class="row">
              @foreach ($lastPosts as $key => $post)
                @isset($post->post_data()[0])
                  @include('mBlog.partials.post_grid')
                @endisset
              @endforeach
            </div>
          @else
            <div class="alert alert-info mt-40">
              No Posts
            </div>
          @endif

          <div class="view-all text-center mt-40">
            {{$lastPosts}}
          </div>


          <div class="text-center pb-50">
            {!! getAds('home_bottom') !!}
          </div>

        </div>

      </div>


    </div>
  </div>


@endsection
