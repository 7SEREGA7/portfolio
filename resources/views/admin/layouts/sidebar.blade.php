<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('home') }}" class="brand-link" target="_blank">
    <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">To Website</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a class="d-block">Serhii Tysiak</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="{{ route('admin') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Pages
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pages.create') }}" class="nav-link">
                <i class="fas fa-edit"></i>
                <p>Create new page</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pages.index') }}" class="nav-link">
                <i class="far fa-eye nav-icon"></i>
                <p>List of pages</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Blog
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('posts.create') }}" class="nav-link">
                <i class="fas fa-edit"></i>
                <p>Create new post</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('posts.index') }}" class="nav-link">
                <i class="far fa-eye nav-icon"></i>
                <p>List of posts</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tag"></i>
            <p>
              Tags
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('tags.create') }}" class="nav-link">
                <i class="fas fa-edit"></i>
                <p>Create new tag</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tags.index') }}" class="nav-link">
                <i class="far fa-eye nav-icon"></i>
                <p>List of tags</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>
              Works
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('works.create') }}" class="nav-link">
                <i class="fas fa-edit"></i>
                <p>Create new work</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('works.index') }}" class="nav-link">
                <i class="far fa-eye nav-icon"></i>
                <p>List of works</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tag"></i>
            <p>
              Work Types
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('work-types.create') }}" class="nav-link">
                <i class="fas fa-edit"></i>
                <p>Create new type</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('work-types.index') }}" class="nav-link">
                <i class="far fa-eye nav-icon"></i>
                <p>List of types</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>