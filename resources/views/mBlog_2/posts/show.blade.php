@extends('mBlog.layouts.app')
@section('content')

  <div class="text-center pb-50">
    {!! getAds('post_top') !!}
  </div>

  <!-- Blog Section Start -->
  <div class="blog-area blog-details  pt-40 pb-120 clearfix">
    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-4 col-md-3 hide-mobile">
          @include('mBlog.partials.sidebar')
        </div>

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
              <div class="mb-60">
                <img src="{{$post->cover}}" alt="{{$post->post_data()[0]->title}}" />
              </div>
            @endif

            <div class="blog-text mb-70">

              {!!$post->post_data()[0]->text!!}

              <div class="row mt-50">
                <div class="col-md-12 text-right">
                  <ul class="share-social">
                    <li><span class="social-share"><i class="zmdi zmdi-share"></i></span></li>
                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="social-button"><i class="zmdi zmdi-facebook"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/intent/tweet?text=my share text&amp;url={{url()->current()}}" class="social-button"><span class="zmdi zmdi-twitter"></span></a></li>
                    <li><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}" class="social-button"><span class="zmdi zmdi-linkedin"></span></a></li>
                    <li><a target="_blank" href="https://wa.me/?text={{url()->current()}}" class="social-button"><span class="zmdi zmdi-whatsapp"></span></a></li>
                  </ul>
                </div>
              </div>


            </div>

            @if(getSetting('comment_system'))
              <div class="comment-box">

                @if($post->comments && count($post->comments))
                  <h3 class="mb-30">@lang('site.comments')</h3>
                  @include('mBlog.posts._comments', ['comments' => $post->comments, 'post_id' => $post->id])
                @endif


                <h3 class="mb-30 mt-30">@lang('site.leave_a_comment')</h3>

                @if(auth()->check())
                  <form class="custom-input" action="{{ route('post.commentStore') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    <textarea name="body" id="comment" rows="2" placeholder="@lang('site.your_comment')"></textarea>
                    <button class="btn theme-btn mt-20" type="submit" name="submit">@lang('site.post_a_comment')</button>
                  </form>
                @else

                  <div class="alert alert-info">
                    <div class="row">
                      <div class="col-md-8">
                        <strong class="alert-with-btn">@lang('site.please_login_website')</strong>
                      </div>
                      <div class="col-md-4">
                        <a data-toggle="modal" data-target="#loginModal" class="btn theme-btn"><i class="zmdi zmdi-account"></i> @lang('site.sign_in')</a>
                      </div>
                    </div>
                  </div>

                @endif

              </div>
            @endif

          </div>
          <!-- Single Post End -->

        </div>
        <!-- Sidebar End -->
      </div>
    </div>

    <div class="text-center pt-40">
      {!! getAds('post_bottom') !!}
    </div>
  </div>
  <!-- Blog Section End -->


@endsection
