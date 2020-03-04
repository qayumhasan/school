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
             	 	<li class="single-nav-wrapper">
                      <a href="{{ route('category.index') }}" class="menu-item">
	                        <span class="left-icon"><i class="fas fa-home"></i></span>
	                        <span class="menu-text">Categories</span>
	                    </a>
	                </li>
	                <li class="single-nav-wrapper">
                        <a class="menu-item" href="{{ route('admin.class.index') }}" aria-expanded="false">
                        <span class="left-icon"><i class="far fa-edit"></i></span>
                            <span class="menu-text">Classes</span>
                        </a>
	                </li>

	                  <li class="single-nav-wrapper">
	                      <a class="has-arrow menu-item" href="#" aria-expanded="false">
	                        <span class="left-icon"><i class="fas fa-table"></i></span>
	                          <span class="menu-text">Transport</span>
	                      </a>
	                        <ul class="dashboard-menu">
	                          <li><a href="{{ route('admin.route.index') }}">Routes</a></li>
	                          <li><a href="{{ route('admin.vehicle.index') }}">Vehicles</a></li>
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
	                          <li><a href="chart-float.html">Hostel Room</a></li>
	                          <li><a href="{{route('room.type')}}">Room Type</a></li>
	                          <li><a href="chart-float.html">Hostel</a></li>
	                          <li><a href="chart-float.html">Student Hostel Report</a></li>
	                       </ul>
					  </li>

					  <!-- Hostel area end -->
					  
	                  <li class="single-nav-wrapper">
	                      <a class="has-arrow menu-item" href="#" aria-expanded="false">
	                        <span class="left-icon"><i class="fas fa-chart-line"></i></span>
	                        <span class="menu-text">Charts</span>
	                      </a>
	                        <ul class="dashboard-menu">
	                          <li><a href="chart-float.html">Float Chart</a></li>
		                      <li><a href="chart-float.html">Float Chart</a></li>
		                      <li><a href="chart-float.html">Float Chart</a></li>
	                       </ul>
					  </li>
					  
					
	                 
	                </ul>
              </nav>
            </aside><!-- /sidebar Area-->
