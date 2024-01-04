@extends('layouts.master')

@section('content')

  <!-- ======= Start #main ======= -->
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>User Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Users</a></li>
                <li class="breadcrumb-item active">User Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="{{ url()->previous() }}"><i class="bi bi-arrow-return-left"></i></a>
                    </div>
                    <div class="card-body">

                        <h5 class="card-title">User Details</h5>

                        <section class="section profile">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body pt-3">
                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 label">
                                                            <h5 class="card-title">Profile Picture</h5>
                                                            <img src="{{url('storage/' . $user->avatar) }}" width="100" height="100" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body pt-3">
                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                                                    <h5 class="card-title">User Roles</h5>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 label">
                                                            @if(!empty($user->getRoleNames()))
                                                                @foreach($user->getRoleNames() as $v)
                                                                    @if($v == 'admin')
                                                                        <label class="badge bg-success">{{ $v }}</label>
                                                                    @else
                                                                        <label class="badge bg-primary">{{ $v }}</label>
                                                                    @endif

                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body pt-3">
                                            <!-- Bordered Tabs -->

                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                                                    <h5 class="card-title">About</h5><p class="small fst-italic">{{ $user->about ?? 'N/A' }}</p>

                                                    <h5 class="card-title">Users Details</h5>

                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 label ">Name</div>
                                                        <div class="col-lg-8 col-md-8">{{ $user->name }}</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 label ">Email</div>
                                                        <div class="col-lg-8 col-md-8">{{ $user->email }}</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 label">Contact Number</div>
                                                        <div class="col-lg-8 col-md-8">{{ $user->contact_number }}</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 label">Address</div>
                                                        <div class="col-lg-8 col-md-8">{{ $user->address }}</div>
                                                    </div>
                                                </div>

                                            </div><!-- End Bordered Tabs -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

@endsection
