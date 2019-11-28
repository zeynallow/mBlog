<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item">
      <a class="nav-link" href="{{route('mAdmin.index')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Posts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="posts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.posts.create') }}">Create Post</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.posts.index') }}">All Posts</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Categories</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="categories">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.categories.create') }}">Create Category</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.categories.index') }}">All Categories</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#pages" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.pages.create') }}">Create Page</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.pages.index') }}">All Pages</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Settings</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="settings">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.general') }}">General</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.visual') }}">Visual</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.social') }}">Social</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.other') }}">Other</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.settings.email') }}">E-mail</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('languages.index') }}">{{ __('translation::translation.languages') }}</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('languages.translations.index', config('app.locale')) }}">{{ __('translation::translation.translations') }}</a></li>
        </ul>
      </div>
    </li>

  </ul>
</nav>
