@extends('layouts.master')

@section('content')

    <!-- ======= Start #main ======= -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Users Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto users-list">
                        @can('add users')
                            <div class="filter add-btn">
                                <a class="btn btn-primary" href="{{ route('users.create') }}"><i class="bi bi-plus"></i>Add Users</a>
                            </div>
                        @endcan
                        <div class="card-body">
                            <h5 class="card-title">List of Users</h5>

                            @include('frontend-partials._flash_message')

                            <table id="user-table" class="table table-hover datatable" style="font-size: 12px !important;">
                                <thead>
                                <tr>
                                    <th scope="col">Sr. #</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $row)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->contact_number}}</td>
                                        <td>{{$row->status}}</td>
                                        <td>
                                            @if(!empty($row->getRoleNames()))
                                                @foreach($row->getRoleNames() as $v)
                                                    @if($v == 'admin')
                                                        <label class="badge bg-success">{{ $v }}</label>
                                                    @else
                                                        <label class="badge bg-primary">{{ $v }}</label>
                                                    @endif

                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('view user')
                                                <a style="text-decoration: none !important;margin-top: -4px!important;font-size: 12px!important;padding-left: 0 !important;" class="btn btn-link pe-1" href="{{ route('users.show', $row->id) }}"><i class="ri-eye-fill" aria-hidden="true"></i> </a>
                                            @endcan
                                            @can('edit users')
                                                <a class="pe-1" href="{{ route('users.edit', $row->id) }}"><i class="ri-edit-2-fill"></i> </a>
                                            @endcan
                                            @can('delete users')
                                                    <a class="pe-1" href="{{ route('users.destroy', $row->id) }}"
                                                       onclick="event.preventDefault();
                                                        document.getElementById('delete-user-{{$row->id}}').submit();">
                                                        <i class="ri-delete-bin-3-fill"></i>
                                                    </a>
                                                    <form id="delete-user-{{$row->id}}" action="{{ route('users.destroy', $row->id) }}" method="POST" class="d-none">
                                                        @csrf @method('DELETE')
                                                    </form>
                                            @endcan
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>


        </section>

    </main><!-- End #main -->

@endsection
