@extends('admin.layouts.app')


@section('content')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Posts</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Posts</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      </div>
      <div class="content">
        <div class="container-fluid">
          @if (session('success'))
                <div class="alert alert-success" id="success-alert">
                   {{ session('success') }}
                 </div>
                 
                @endif
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Posts Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="post-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Handle</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($posts as $index => $post)
                  <tr>
                    <td> {{ $index+1 }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->image_path }}</td>
                    <td> 
                      <div class="d-flex justify-content-around">
                        <a href="{{ route('edit-post', $post->id) }}">
                          <button class="btn btn-primary">Edit</button>
                          
                        </a>
                        <form action="{{ route('destroy-post', $post->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>

                       
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  
                  </tfoot>
                </table>
                {{-- {{ $posts->links('vendor.pagination.bootstrap-4') }} --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  

@endsection