@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-uppercase">Update </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active"> Category/Create</li>
                        </ol>
                    </div>
                </div>
                @if (session('message'))
                    <div class="alert alert-success " id="success-alert">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session('errors'))
                    <div class="alert alert-danger" id="error-alert">
                        {{ $errors['message'] }}
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </section>







        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('update-category',$category->id) }}" method="post" class="from">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">
                                            Name :
                                        </label>
                                        <input class="form-control" type="text" name="name" id="name"
                                            value="{{ $category->name }}">
                                        @if (isset(session('errors')['errorBag']['name']))
                                            @foreach ($errors['errorBag']['name'] as $error)
                                                <p> {{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">
                                            Description :
                                        </label>
                                        <input class="form-control" type="text" name="description" id="description"
                                            value="{{ $category->description }}">
                                        @if (isset(session('errors')['errorBag']['description']))
                                            @foreach ($errors['errorBag']['description'] as $error)
                                                <p> {{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>

                                    <button class="btn btn-primary mt-4 float-right" name="submit" type="submit"> Submit
                                    </button>

                                </form>
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
