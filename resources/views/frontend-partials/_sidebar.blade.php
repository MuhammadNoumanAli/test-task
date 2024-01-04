<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <!-- Start Users Nav -->
        @can('list users')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="products-nav" class="nav-content collapse {{ in_array(Route::currentRouteName(), ['users.index', 'users.create']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('users.index') }}" class="{{ Route::currentRouteName() === 'users.index' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>User Lists</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        <!-- End Users Nav -->
        <!-- Start Permission Nav -->
        @can('list permission')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="setting-nav" class="nav-content collapse {{ in_array(Route::currentRouteName(), ['roles.index', 'roles.create']) ? 'show' : '' }}" data-bs-parent="#setting-nav">
                    <li>
                        <a href="{{ route('roles.index') }}" class="{{ Route::currentRouteName() === 'roles.index' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Permissions</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        <!-- End Permission Nav -->

    </ul>

</aside>
