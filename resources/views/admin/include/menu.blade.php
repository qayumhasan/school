<!-- sidebar area -->
<aside class="sidebar-wrapper ">
    <nav class="sidebar-nav">
        <ul class="metismenu" id="menu1">
            <li class="single-nav-wrapper">
                <a href="{{ route('admin.home') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Home</span>
                </a>
            </li>
               <li class="single-nav-wrapper {{ Request::is('admin/academic*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Student</span>
                </a>
                <ul class="dashboard-menu">
                    <li>
                        <a href="{{ route('student.create') }}"> Student Admission</a>
                    </li>
                 
                </ul>
            </li>
            <li class="single-nav-wrapper">
                <a href="{{ route('category.index') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Categories</span>
                </a>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/academic*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Academic</span>
                </a>
                <ul class="dashboard-menu">
                    <li>
                        <a href="{{ route('admin.class.index') }}"> Class</a>
                        <a href=""> Asign teacher to class</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.academic.assign.all.assigned.subject') }}"> Subject </a>
                        <a href="{{ route('admin.academic.assign.all.assigned.subject') }}"> Asign subject to class</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.academic.section.index') }}"> Section </a>
                    </li>
                </ul>
            </li>


            <li class="single-nav-wrapper {{ Request::is('admin/transport*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-table"></i></span>
                    <span class="menu-text">Transport</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{ route('admin.route.index') }}">Routes</a></li>
                    <li><a href="{{ route('admin.vehicle.index') }}">Vehicles</a></li>
                    <li><a href="{{ route('admin.assign.vehicle.index') }}">Assign Vehicle</a></li>
                    <li><a href="">Student transport report (pending)</a></li>
                </ul>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/expanses*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-table"></i></span>
                    <span class="menu-text">Expanses</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{ route('admin.expanse.index') }}">expanse</a></li>
                    <li><a href="{{ route('admin.expanse.search') }}">Search expanse</a></li>
                    <li><a href="{{ route('admin.expanse.header.all') }}">expanse header</a></li>
                </ul>
            </li>

            <!-- Menus Area start from here -->

            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Setting</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('admin.menu.setting')}}">Menus</a></li>
                </ul>
            </li>
            <!-- Menus area end from here -->


            <!-- Hostel area start -->

            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Hostel</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('hostel.addroom')}}">Hostel Room</a></li>
                    <li><a href="{{route('room.type')}}">Room Type</a></li>
                    <li><a href="{{route('admin.hostel')}}">Hostel</a></li>
                    <li><a href="chart-float.html">Student Hostel Report</a></li>
                </ul>
            </li>

            <!-- Hostel area end -->





        </ul>
    </nav>
</aside><!-- /sidebar Area-->
