@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

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
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle img-upload"
                                        src="{{ $user->cover_image?Storage::disk('s3')->url($user->cover_image):asset('assets/dashboard/images/no-avatar.jpg')}}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">{{ $user->Role->name }}</p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        {{-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div> --}}
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link {{ session('password_error')|| isset(session('errors')['errorBag'])?'':'active' }}" href="#settings"
                                            data-toggle="tab">Settings</a></li>
                                    <li class="nav-item"><a class="nav-link  {{ session('password_error')|| isset(session('errors')['errorBag'])?'active':'' }}" href="#change_password" data-toggle="tab">Change Password</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="{{ session('password_error')|| isset(session('errors')['errorBag'])?'':'active' }} tab-pane" id="settings">
                                        <form id="profile-update" action="{{ route('update-profile', $user->id) }}"
                                            method="post" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="name" class="form-control" name="name" id="name"
                                                        placeholder="Name" value="{{ $user->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="image" class="col-sm-2 col-form-label">Avatar</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                      <div class="custom-file">

                                                            <input type="file" class="custom-file-input" name="image"
                                                                id="image" placeholder="Upload your image">
                                                            <label class="custom-file-label" for="image">Choose
                                                                file</label>
                                                         </div>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text">Upload</span>
                                                      </div>   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ !session('error') ? 'd-none' : '' }} ">

                                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10 ">
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" placeholder="password">
                                                    <p> {{ session('error') ? session('error') : 'Vui lòng nhập mật khẩu' }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button id="profile-submit" type="submit"
                                                        class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class=" {{ session('password_error')|| isset(session('errors')['errorBag'])?'active':'' }}tab-pane" id="change_password">
                                      <form id="password-update" action="{{ route('change-password', $user->id) }}"
                                          method="post" enctype="multipart/form-data" class="form-horizontal">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-group row">
                                              <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                              <div class="col-sm-10">
                                                  <input type="password" class="form-control" name="password" id="password"
                                                      placeholder="New Password">
                                                      @if (isset(session('errors')['errorBag']['password']))
                                                      @foreach ($errors['errorBag']['password'] as $error)
                                                          <p> {{ $error }}</p>
                                                      @endforeach
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="password_confirmation" class="col-sm-2 col-form-label">New Password Confirmation</label>
                                              <div class="col-sm-10">
                                                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                                      placeholder="New Password Confirmation">
                                                      @if (isset(session('errors')['errorBag']['password_confirmation']))
                                                      @foreach ($errors['errorBag']['password_confirmation'] as $error)
                                                          <p> {{ $error }}</p>
                                                      @endforeach
                                                  @endif
                                              </div>
                                          </div>
                                          
                                          <div class="form-group row  ">

                                              <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                                              <div class="col-sm-10 ">
                                                  <input type="password" class="form-control" name="old_password"
                                                      id="old_password" placeholder="Old Password">
                                                  <p> {{ session('password_error') ? session('password_error') : '' }}
                                                    @if (isset(session('errors')['errorBag']['old_password']))
                                                    @foreach ($errors['errorBag']['old_password'] as $error)
                                                        <p> {{ $error }}</p>
                                                    @endforeach
                                                @endif
                                                  </p>
                                              </div>
                                          </div>

                                          <div class="form-group row">
                                              <div class="offset-sm-2 col-sm-10">
                                                  <button id="profile-submit" type="submit"
                                                      class="btn btn-danger">Submit</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
