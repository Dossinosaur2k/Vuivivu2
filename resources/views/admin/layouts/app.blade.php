@include('admin.layouts.head')
<div class="wrapper">
    
@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

@yield('content')

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

</div>
@include('admin.layouts.footer')
