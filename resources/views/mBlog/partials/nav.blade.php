<nav class="mainmenu menu-hover-1 pull-right">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="navbar-collapse collapse ">
    <ul class="navigation">
      <li><a href="{{ route('home') }}">Home</a></li>
      @if(getNavCategories())
        @foreach (getNavCategories() as $key => $nav_category)
          @isset($nav_category->category_data[0])
            <li {!!($nav_category->subcategories) ? 'class="dropdown"' : ''!!}>
              <a href="{{route('category.index', $nav_category->slug)}}">{{ $nav_category->category_data[0]->title }}</a>
              @if($nav_category->subcategories)
                <ul>
                  @foreach ($nav_category->subcategories as $key => $nav_subcategory)
                    @isset($nav_subcategory->category_data[0])
                      <li>
                        <a href="{{route('subcategory.index', ['category_slug'=>$nav_category->slug,'subcategory_slug'=>$nav_subcategory->slug])}}">
                          {{ $nav_subcategory->category_data[0]->title }}</a>
                        </li>
                      @endisset
                    @endforeach
                  </ul>
                @endif
              </li>
            @endisset
          @endforeach
        @endif
        <!-- BLOG END -->
        <li><a href="javascript:void(0)">Contact Us</a></li>
        <!-- CONTACT END -->
      </ul>
    </div>
  </nav>
