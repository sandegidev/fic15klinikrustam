<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Klinik Rustam</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
                <li class="nav-item dropdown ">
                    <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                     <ul class="dropdown-menu">
                         <li class='{{ Request::is('dashboard') ? 'active' : '' }}'>

                            <a class="nav-link"
                            href="{{ url('home') }}">General Dashboard</a>

                        </li>
                    </ul>
                    <ul class="dropdown-menu">
                        <a class="nav-link"
                            href="{{ route('users.index') }}">Users</a>

                    </ul>
                    <ul class="dropdown-menu">
                        <a class="nav-link"
                            href="{{ route('doctors.index') }}">Doctors</a>

                    </ul>
                </li>
        </li>

    </aside>
</div>
