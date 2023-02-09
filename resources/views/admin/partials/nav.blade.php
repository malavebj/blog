<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{route('dashboard')}}" class="nav-link {{ request()->is('home') ? 'active' : ''}}"  >
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger">New</span>
        </p>
      </a>
    </li>
    <li class="nav-item menu-open">
      @can('view',new App\Models\User)
        <a href="#" class="nav-link"  >
          <i class="nav-icon fas fa-user"></i>
          <p>
            Users
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.users.index')}}" class="nav-link">
              <i class="far fa-eye nav-icon"></i>
              <p>View Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.users.create')}}" class="nav-link">
              <i class="fa fa-pen nav-icon"></i>
              <p>Create New User</p>
            </a>
          </li>
        </ul>
      @else
        <a href="{{route('admin.users.show',auth()->user())}}" class="nav-link"  >
          <i class="nav-icon fas fa-user"></i>
          <p>
            Profile
          </p>
        </a>
      @endcan
    </li>
    <li class="nav-item menu-open">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-bars"></i>
        <p>
          Blog
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.posts.index')}}" class="nav-link {{ request()->is('admin/posts') ? 'active' : ''}}">
            <i class="far fa-eye nav-icon"></i>
            <p>View Posts</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" data-toggle="modal" data-target="#createPostModal" class="nav-link">
            <i class="fa fa-pen nav-icon"></i>
            <p>Create New Post</p>
          </a>
        </li>
      </ul>
    </li>
    @can('view',new \Spatie\Permission\Models\Role)
      <li class="nav-item menu-open">
        <a href="#" class="nav-link"  >
          <i class="nav-icon fas fa-user"></i>
          <p>
            Roles
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.roles.index')}}" class="nav-link">
              <i class="far fa-eye nav-icon"></i>
              <p>View Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.roles.create')}}" class="nav-link">
              <i class="fa fa-pen nav-icon"></i>
              <p>Create New Role</p>
            </a>
          </li>
        </ul>
      </li>
    @endcan
    @can('view',new \Spatie\Permission\Models\Permission)
      <li class="nav-item menu-open">
        <a href="#" class="nav-link"  >
          <i class="nav-icon fas fa-user"></i>
          <p>
            Permissions
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.permissions.index')}}" class="nav-link">
              <i class="far fa-eye nav-icon"></i>
              <p>View Permissions</p>
            </a>
          </li>
        </ul>
      </li>
    @endcan
  </ul>
</nav>
<!-- /.sidebar-menu -->
