<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ (Auth::check() ? Auth::user()->name : '') }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-child-indent nav-legacy nav-pills nav-sidebar flex-column" data-widget="treeview"
                role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ (Request::segment(2) == 'dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">User Management</li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ (Request::segment(2) == 'users' && Request::segment(3) == '') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('role.index') }}"
                        class="nav-link {{ (Request::segment(2) == 'role') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Role</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.roles_permission') }}"
                        class="nav-link {{ (Request::segment(2) == 'users' && Request::segment(3) == 'role-permission') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Role & Permission</p>
                    </a>
                </li>
                @endrole
                <li class="nav-header">CMS</li>
                <li class="nav-item">
                    <a href="{{ route('artikel.index') }}"
                        class="nav-link {{ (Request::segment(2) == 'artikel') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Artikel</p>
                    </a>
                </li>
                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('about.index') }}"
                        class="nav-link {{ (Request::segment(2) == 'about') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>About</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}"
                        class="nav-link {{ (Request::segment(2) == 'kategori') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slider.index') }}"
                        class="nav-link {{ (Request::segment(2) == 'slider') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>Slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tag.index') }}"
                        class="nav-link {{ (Request::segment(2) == 'tag') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Tag</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('recent.index') }}"
                        class="nav-link {{ (Request::segment(2) == 'recent') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Recent Work</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.index') }}"
                        class="nav-link {{ (Request::segment(2) == 'contact') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map-o"></i>
                        <p>Contact</p>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>