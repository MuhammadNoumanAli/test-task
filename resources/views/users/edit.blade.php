@extends('layouts.master')

@section('content')

  <!-- ======= Start #main ======= -->
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Update Users</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="{{ route('users.index') }}"><i class="bi bi-arrow-return-left"></i></a>
                    </div>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <h5 class="card-title">Update User Form</h5>

                        <!-- Add Users Form -->
                        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="user_role" class="form-label">Select Role</label>
                                    <select id="user_role" class="form-control" name="user_role">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}" @if(in_array($role->id, $user_roles)) selected @endif> {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Enter Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required  placeholder="Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="" > Select </option>
                                        <option value="active" @if($user->status == 'active') selected @endif> Active </option>
                                        <option value="inactive" @if($user->status == 'inactive') selected @endif> Inactive </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required placeholder="Address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ $user->contact_number }}" required placeholder="Contact Number">

                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3 custom-file-input-back">
                                    <label for="avatar" class="form-label">Profile Image</label><img src="{{ url(asset('storage/'.$user->avatar)) }}" height="30px">
                                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">

                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-3 custom-file-input-back">
                                    <label for="about" class="form-label">About</label>
                                    <textarea id="about" name="about" type="text" class="form-control @error('about') is-invalid @enderror"> {{ $user->about }} </textarea>

                                    @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

@endsection
