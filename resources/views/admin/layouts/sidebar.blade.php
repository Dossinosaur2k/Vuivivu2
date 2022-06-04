<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ Auth::user()->cover_image?Storage::disk('s3')->url(Auth::user()->cover_image):'' }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('profile', Auth::user()->id) }}" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item {{Request::is('dashboard/user/*')?'menu-open':''}}">
          <a href="#" class="nav-link {{Request::is('dashboard/user/*')?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('profile',Auth()->user()->id) }}" class="nav-link {{Request::is('dashboard/user/profile/*')?'active':''}}">
                
                <p>User Profile</p>
              </a>
            </li>
            @if (Auth()->user()->Role->name === 'Super admin')
            <li class="nav-item">
              <a href="{{ route('list-all-user') }}" class="nav-link {{Request::is('dashboard/user/index')?'active':''}}">
                
                <p>List all user</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('create-user') }}" class="nav-link {{Request::is('dashboard/user/create')?'active':''}}">
                <p>Add a new user</p>
              </a>
            </li>
            @endif
          </ul>
        </li>

        @if (Auth()->user()->Role->name === 'Super admin')
        <li class="nav-item">
          <a href="{{ route('list-all-history') }}" class="nav-link {{Request::is('dashboard/crawl-history/*')?'active':''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Crawl history
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        @endif
        
        <li class="nav-item {{Request::is('dashboard/category/*')?'menu-open':''}}">
          <a href="#" class="nav-link {{Request::is('dashboard/category/*')?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Category
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('list-all-category')}}" class="nav-link {{Request::is('dashboard/category/index')?'active':''}}">
                
                <p>List all category</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{ route('show-create-category') }}" class="nav-link {{Request::is('dashboard/category/create')?'active':''}}">
                
                <p>Create a new category</p>
              </a>
            </li>
           
          </ul>
        </li>

        <li class="nav-item {{Request::is('dashboard/banner/*')?'menu-open':''}}">
          <a href="#" class="nav-link {{Request::is('dashboard/banner/*')?'active':''}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Banners
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="{{ route('list-all-banner') }}" class="nav-link {{Request::is('dashboard/banner/index')?'active':''}}">
                <p>List all banner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('show-create-banner') }}" class="nav-link {{Request::is('dashboard/banner/create')?'active':''}}"> 
               
                <p>Create a new banner</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{Request::is('dashboard/ads/*')?'menu-open':''}}">
          <a href="#" class="nav-link {{Request::is('dashboard/ads/*')?'active':''}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Ads
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="{{ route('list-all-ad') }}" class="nav-link {{Request::is('dashboard/ads/index')?'active':''}}">
                <p>List all ads</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('show-create-ad') }}" class="nav-link {{Request::is('dashboard/ads/create')?'active':''}}"> 
               
                <p>Create a new ads</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{Request::is('dashboard/post/*')?'menu-open':''}}">
          <a href="#" class="nav-link {{Request::is('dashboard/post/*')?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Posts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('list-all-post') }}" class="nav-link {{Request::is('dashboard/post/index')?'active':''}}">
                
                <p>List all post</p>
              </a>
            </li>
    
            <li class="nav-item">
              <a href="{{ route('show-create-post') }}" class="nav-link {{Request::is('dashboard/post/create')?'active':''}}">
                
                <p>Create new post</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>