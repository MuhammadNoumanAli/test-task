
@extends('layouts.master')

@section('content')

    <!-- ======= Start #main ======= -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Roles and Permissions</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Roles and Permissions</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto users-list">
                        @can('add role')
                            <div class="filter add-btn">
                                <a class="btn btn-primary" href="{{ route('roles.create') }}"><i class="bi bi-plus"></i>Create Role</a>
                            </div>
                        @endcan
                        <div class="card-body">
                            <h5 class="card-title">List of Roles and Permissions</h5>

                            @include('frontend-partials._flash_message')
                            <form method="POST" action="{{ route('roles.updateRole') }}">
                                @csrf
                                <table class="permissions-table">
                                    <thead>
                                        <tr>
                                            <th>Roles</th>
                                            <th class="text-center">Permissions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td style="width: 20%">{{ ucfirst($role->name) }}</td>
                                                <td style="width: 80%">
                                                    <div class="permissions-checkboxes">
                                                        @foreach($permissions as $permission)
                                                            <div class="permission-row">
                                                                <label class="permission-label">
                                                                    <input
                                                                        type="checkbox"
                                                                        name="permissions[{{ $role->name }}][]"
                                                                        value="{{ $permission->name }}"
                                                                        {{ in_array($permission->name, $role->permissions->pluck('name')->toArray()) ? 'checked' : '' }}
                                                                        class="permission-checkbox"
                                                                    />
                                                                    <span class="permission-name">{{ ucfirst($permission->name) }}</span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @can('edit permission')
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-3">
                                            Save Permissions
                                        </button>
                                    </div>
                                @endcan
                            </form>
                        </div>

                    </div>
                </div>

            </div>


        </section>

    </main><!-- End #main -->

@endsection
