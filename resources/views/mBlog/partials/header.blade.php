<!-- Header Section Start -->
<header class="header-style-1">
  <div class="header-top active-sticky">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-2">
          <div class="left">
            <div class="logo">
              <a href="/">
                @if(getSetting('site_logo'))
                  <img src="{{getSetting('site_logo')}}" alt="{{getSetting('site_name')}}" />
                @else
                  {{getSetting('site_name')}}
                @endif
              </a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-10">
          <div class="right">
            <div class="search-box pull-right">
              <i class="zmdi zmdi-search"></i>
              <form action="{{route('search')}}" method="get">
                <input type="text" name="q" placeholder="Search..." />
                <button id="close" type="submit"><i class="zmdi zmdi-search"></i></button>
              </form>
            </div>

            <div class="login-box pull-right">
              @if(!auth()->user())
                <button data-toggle="modal" data-target="#loginModal"><i class="zmdi zmdi-account"></i></button>
              @endif
            </div>
            @include('mBlog.partials.nav')
          </div>

        </div>
      </div>
    </div>
  </div>
</header>
