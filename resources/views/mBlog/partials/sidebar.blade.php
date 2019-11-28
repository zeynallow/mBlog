<div class="sidebar white-bg">
  <div class="widget mb-40">
    <div class="widget-title mb-10">
      <h4 class="mb-5">Categories</h4>
    </div>
    <div class="category">
      @if(getMainCategories())
        <ul>
          @foreach (getMainCategories() as $key => $s_bar_category)
            @isset($s_bar_category->category_data()[0])
              <li><a href="{{route('category.index', $s_bar_category->slug)}}">{{ $s_bar_category->category_data()[0]->title }}</a></li>
            @endisset
          @endforeach
        </ul>
      @endif
    </div>
  </div>
  <div class="widget mb-40">
    <div class="widget-title mb-10">
      <h4 class="mb-5">Popular Posts</h4>
    </div>
    <div class="posts">
      <ul>
        @if(getPopularPosts())
          @foreach (getPopularPosts() as $key => $popular_post)
            @isset($popular_post->post_data()[0])
              <li><a href="{{route('post.show',[$popular_post->id,$popular_post->slug])}}"><i class="zmdi zmdi-chevron-right"></i> {{$popular_post->post_data()[0]->title}}</a></li>
            @endisset
          @endforeach
        @endif
      </ul>
    </div>
  </div>

  <div class="text-center">
    {!! getAds('sidebar') !!}
  </div>

</div>
