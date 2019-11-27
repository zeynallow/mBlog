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
          @isset($nav_category->category_data()[0])
            <li {!!($nav_category->subcategories) ? 'class="dropdown"' : ''!!}>
              <a href="{{route('category.index', $nav_category->slug)}}">{{ $nav_category->category_data()[0]->title }}
                @if($nav_category->subcategories && count($nav_category->subcategories) > 0)
                  <span class="caret"></span>
                @endif
              </a>
              @if($nav_category->subcategories && count($nav_category->subcategories) > 0)
                <ul>
                  @foreach ($nav_category->subcategories as $key => $nav_subcategory)
                    @isset($nav_subcategory->category_data()[0])
                      <li>
                        <a href="{{route('subcategory.index', ['category_slug'=>$nav_category->slug,'subcategory_slug'=>$nav_subcategory->slug])}}">
                          {{ $nav_subcategory->category_data()[0]->title }}</a>
                        </li>
                      @endisset
                    @endforeach
                  </ul>
                @endif
              </li>
            @endisset
          @endforeach
        @endif
        <li><a href="javascript:void(0)">Contact Us</a></li>

        @if(getSetting('multilingual_system'))
          <li class="dropdown">
            <a href="javascript:void(0);">
              {{mb_strtoupper(\App::getLocale())}} <span class="caret"></span>
            </a>
            @if(getLocalesWithout(\App::getLocale()))
              <ul>
                @foreach (getLocalesWithout(\App::getLocale()) as $key => $locale)
                  <li><a href="{{route('change.lang',$locale->code)}}">{{$locale->name}}</a></li>
                @endforeach
              </ul>
            </li>
          @endif
        @endif

        @if(auth()->user())
          <li class="dropdown">
            <a href="javascript:void(0);">
              <i class="zmdi zmdi-account"></i> {{auth()->user()->name}} <span class="caret"></span>
            </a>
            <ul>
              <li><a target="_blank" href="{{route('mAdmin.index')}}">Admin panel</a></li>
              <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>
          </li>
        @endif

      </ul>

    </div>
  </nav>
