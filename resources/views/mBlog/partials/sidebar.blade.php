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
      <h4 class="mb-5">Recent Post</h4>
    </div>
    <div class="posts">
      <ul>
        <li><a href="#"><i class="zmdi zmdi-chevron-right"></i> will give you a must</a></li>
        <li><a href="#"><i class="zmdi zmdi-chevron-right"></i> when an unknown printer took</a></li>
        <li><a href="#"><i class="zmdi zmdi-chevron-right"></i> as opposed to using</a></li>
        <li><a href="#"><i class="zmdi zmdi-chevron-right"></i> simply dummy text of the prin</a></li>
      </ul>
    </div>
  </div>
  <div class="widget">
    <div class="widget-title mb-10">
      <h4 class="mb-5">tags</h4>
    </div>
    <div class="tags ">
      <a href="javascript:void(0)">Design</a>
      <a href="javascript:void(0)">Development</a>
      <a href="javascript:void(0)">HTML</a>
      <a href="javascript:void(0)">WordPress</a>
      <a href="javascript:void(0)">Minimal</a>
      <a href="javascript:void(0)">Corporate</a>
      <a href="javascript:void(0)">Business</a>
      <a href="javascript:void(0)">Bloger</a>
      <a href="javascript:void(0)">New</a>
    </div>
  </div>
</div>
