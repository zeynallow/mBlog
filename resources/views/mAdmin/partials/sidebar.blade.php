<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item">
      <a class="nav-link" href="{{route('mAdmin.index')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">@lang('admin.dashboard')</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">@lang('admin.posts')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="posts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.posts.create') }}">@lang('admin.create_post')</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.posts.index') }}">@lang('admin.all_posts')</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">@lang('admin.categories')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="categories">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.categories.create') }}">@lang('admin.create_category')</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.categories.index') }}">@lang('admin.all_categories')</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#pages" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">@lang('admin.pages')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.pages.create') }}">@lang('admin.create_page')</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.pages.index') }}">@lang('admin.all_pages')</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('mAdmin.ads.index') }}">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">@lang('admin.ads')</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('mAdmin.comments.index') }}">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">@lang('admin.comments')</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">@lang('admin.users')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="users">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.users.create') }}">@lang('admin.create_user')</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.users.index') }}">@lang('admin.all_users')</a></li>
        </ul>
      </div>
    </li>
    @if(auth()->user()->role_id == 1)
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">@lang('admin.settings')</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="settings">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.general') }}">@lang('admin.general')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.visual') }}">@lang('admin.visual')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.social') }}">@lang('admin.social')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.other') }}">@lang('admin.other')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.email') }}">@lang('admin.email')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.seo') }}">@lang('admin.seo')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('languages.index') }}">@lang('admin.languages')</a></li>
          </ul>
        </div>
      </li>
    @endif

  </ul>
</nav>
