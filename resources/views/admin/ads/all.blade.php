@extends('admin.layouts.app')


@section('content')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Ads</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Ads</li>
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
                <h3 class="card-title">Ads Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="banner-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Handle</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($ads as $index => $ad)
                  <tr>
                    <td> {{ $index+1 }}</td>
                    <td>{{ $ad->name }}</td>
                    <td>{{ $ad->image_path }}</td>
                    <td>{{ $ad->status==1?'Active':'Un Active' }}</td>
                    <td> 
                      <div class="d-flex justify-content-around">
                        <a href="{{ route('edit-ad', $ad->id) }}">
                          <button class="btn btn-primary">Edit</button>
                          
                        </a>
                        <form action="{{ route('destroy-ad', $ad->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                        <form action="{{ route('handle-ad', $ad->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn {{ $ad->status == 1?'btn btn-light':'btn btn-warning' }}">{{ $ad->status == 1?'Hide':'Show'  }}</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                 
                  </tfoot>
                </table>
                {{ $ads->links('vendor.pagination.bootstrap-4') }}
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