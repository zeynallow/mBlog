<!-- Header Section Start -->
<header class="header-style-1">
  <div class="header-top active-sticky">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-3">
          <div class="left">
            <div class="logo">
              <a href="index.html">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="mazzBlog" />
              </a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-9">
          <div class="right">
            <div class="search-box pull-right">
              <i class="zmdi zmdi-search"></i>
              <form action="#">
                <input type="text" name="search" placeholder="Search..." />
                <button id="close" type="submit"><i class="zmdi zmdi-search"></i></button>
              </form>
            </div>
            @include('mBlog.partials.nav')
          </div>
        </div>
      </div>
    </div>
  </div>
</header>