@extends('admin.layouts.app')


@section('content')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Crawl histories</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Crawl histories</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Crawl histories table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Time</th>
                    <th>Total in old database</th>
                    <th>Total record crawled</th>
                    <th>Total old record remove</th>
                    <th>Total new record update</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($histories as $index => $history)
                  <tr>
                    <td> {{ $index+1 }}
                    <td>{{ $history->time_format }}</td>
                    <td>{{ $history->total_old_record }}</td>
                    <td>{{ $history->total_record_crawled}}</td>
                    <td>{{ $history->total_record_removed  }}</td>
                    <td>{{ $history->total_new_record_crawled }}</td>
                    @if (!empty($history->fail))
                    <td><a href="{{ route('show-error',[$history->_id]) }}" style='color:red'>Có lỗi</a></td>
                    @else
                    <td style='color:green'>Thành công</td>
                    @endif
                      
                  </tr>
                  @endforeach
                  
                  </tfoot>
                </table>
                {{ $histories->links('vendor.pagination.bootstrap-4') }}
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