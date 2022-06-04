@extends('admin.layouts.app')


@section('content')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Categories</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Categories</li>
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
                <h3 class="card-title">Categories Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Handle</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($categories as $index => $category)
                  <tr>
                    <td> {{ $index+1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td> 
                      <div class="d-flex justify-content-around">
                        <a href="{{ route('edit-category', $category->id) }}">
                          <button class="btn btn-primary">Edit</button>
                          
                        </a>
                        <form action="{{ route('destroy-category', $category->id) }}" method="post">
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
                {{ $categories->links('vendor.pagination.bootstrap-4') }}
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