
@extends('layouts.master')

@section('content')

    <!-- ======= Start #main ======= -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Role</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles & Permission</a></li>
                    <li class="breadcrumb-item active">Create Role</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="{{ route('roles.index') }}"><i class="bi bi-arrow-return-left"></i></a>
                        </div>
                        <div class="card-body">

                            @include('frontend-partials._flash_message')

                            <h5 class="card-title">Create Role Form</h5>

                            <!-- Add Payroll Form -->
                            <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class=" col-md-4">
                                        <label for="role_name" class="form-label">Role Name</label>
                                        <input type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" value="{{ old('role_name') }}" required>

                                        @error('role_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create') }}
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
