@extends('admin.layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-uppercase">Table : {{ $reponse['tablename'] }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">{{ $reponse['tablename'] }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style </h3>
                <a href="{{ '/admin/'.$reponse['tablename'].'/create' }}" class="btn btn-primary float-right"> Create new {{  $reponse['tablename']  }}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(!!$reponse['data']->data)
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    {{-- {{ $datarow = $reponse['data'][0] }} --}}
                    @foreach ($reponse['data']->data[0] as $key => $value)
                      <th class="text-center"> {{ $key }} </th>
                    @endforeach
                    <th class="text-center"> Handle </th>
                    {{-- <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach ($reponse['data']->data as $data)
                    <tr>
                        @foreach ($data as $key => $val)
                          <td class="text-center"> {{ $val }} </td>
                        @endforeach
                        <td > 
                          <div class="d-flex flex-column align-items-center">

                            <button class="btn "><a href="{{ $reponse['tablename'].'/'.$data->id }}/edit" style="color:green;"><i class="fas fa-pencil-alt"></i> </a></button>
                            
                           <form action="{{ $reponse['tablename'].'/'.$data->id }}" method="post" id="delete-post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"><i class="fas fa-times" style="color:red;"></i></button>
                          </form>
                          </div>
                          
                        </td>
                    </tr>
                    @endforeach
                  </tfoot>
                </table>
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item @if(!$reponse['data']->links[0]->url) disabled @endif"><a class="page-link" href="{{ $reponse['data']->links[0]->url }}">Previous</a></li>
                    @for ($i=1;$i<count($reponse['data']->links)-1;$i++)
                      <li class="page-item @if( (URL()->full()) == ($reponse['data']->links[$i]->url) ) active @endif"><a class="page-link" href="{{ $reponse['data']->links[$i]->url }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item @if(!$reponse['data']->links[count($reponse['data']->links)-1]->url) disabled @endif"><a class="page-link" href="{{ $reponse['data']->links[count($reponse['data']->links)-1]->url }}">Next</a></li>
                  </ul>
                </nav>
                @else
                <h3> No data has found </h3>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection