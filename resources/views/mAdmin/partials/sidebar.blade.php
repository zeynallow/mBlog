<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item">
      <a class="nav-link" href="/">
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
          <li class="nav-item"> <a class="nav-link" href="{{ route('mAdmin.posts.index') }}">All posts</a></li>
        </ul>
      </div>
    </li>

  </ul>
</nav>
