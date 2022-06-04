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
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('errors'))
                    <div class="alert alert-danger" id="error-alert">
                        {{ $errors['message'] }}


                    </div>
                @endif
                <div class="row">

                    <!-- /.col-md-6 -->
                    <div class="col-lg-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Edit ads</h3>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-sm btn-tool">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-tool">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                            <form action="{{ route('update-ad',$ad->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="name"  value="{{ $ad->name }}">
                                                @if (isset(session('errors')['errorBag']['name']))
                                                    @foreach ($errors['errorBag']['name'] as $error)
                                                        <p> {{ $error }}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="url">url</label>
                                                <input type="url" class="form-control" id='url' name="url"
                                                    placeholder="enter page url" value="{{ $ad->url }}">
                                                @if (isset(session('errors')['errorBag']['url']))
                                                    @foreach ($errors['errorBag']['url'] as $error)
                                                        <p> {{ $error }}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" name="status" id="status" >
                                                
                                                    <option value="1" {{ 1 == $ad->status?'selected':'' }}>Active</option>
                                                    <option value="0" {{ 0 == $ad->status?'selected':'' }}>Un Active</option>


                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            {{-- <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control" name="role" id="role">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                           
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" 
                                                            name="image" id="image" >
                                                        <label class="custom-file-label" for="image">
                                                            {{ $ad->image_path?$ad->image_path:'Choose file' }}
                                                            </label>
                                                       
                                                    
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    @if (isset(session('errors')['errorBag']['image']))
                                                    @foreach ($errors['errorBag']['image'] as $error)
                                                        <p> {{ $error }}</p>
                                                    @endforeach
                                                @endif
                                                    <img class="img-thumbnail img-upload"src="{{ Storage::disk('s3')->url($ad->image_path) }}" alt="">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ Request::fullUrl() }}" class="">
                                        <button type="button" class="btn btn-warning"> Reset </button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    @endsection
