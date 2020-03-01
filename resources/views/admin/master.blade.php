<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="assets/images/favicon.png" >
		<!--Page title-->
		<title>Durbar School - Admin</title>
        
		<!--bootstrap-->
		<link rel="stylesheet" href="{{asset('admins/css/bootstrap.min.css')}}">
		<!--font awesome-->
		<link rel="stylesheet" href="{{asset('admins/css/all.min.css')}}">
		<!-- metis menu -->
		<link rel="stylesheet" href="{{asset('admins/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('admins/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css')}}">
        <!-- chart -->
        <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
		<!-- donut-chart -->
        <link rel="stylesheet" href="{{asset('admins/plugins/donut-chart/dist/style.css')}}">
		<!--Custom CSS-->
		<link rel="stylesheet" href="{{asset('admins/css/style.css')}}">
	</head>
	<body id="page-top">
		<!-- preloader -->
		<div class="preloader">
		<img src="{{asset('admin/images/preloader.gif')}}" alt="">
	</div>
		<!-- wrapper -->
		<div class="wrapper">
            
            <!-- include top header -->
            @include('admin.include.header_top')

            <!-- include menu  -->
            @include('admin.include.menu')

			
            <!-- content wrpper -->
			<div class="content_wrapper">
				@yield('content')
			</div><!--/ content wrapper -->
			<footer>
				<div class="row">
					<div class="col-md-6">
						<p>Copyright &copy; 2019 Durbar IT. All rights reserved.</p>
					</div>
					<div class="col-md-6">
						<span class="my-0 developby"><span>Develop by:</span><a href="https://www.durbarit.com" target="_blank"> Durbar IT</a></span>
					</div>
				</div>
			</footer>
		</div><!--/ wrapper -->


		
		<!-- jquery -->
		<script src="{{asset('admins/js/jquery.min.js')}}"></script>
		<!-- popper Min Js -->
		<script src="{{asset('admins/js/popper.min.js')}}"></script>
		<!-- Bootstrap Min Js -->
		<script src="{{asset('admins/js/bootstrap.min.js')}}"></script>
		<!-- Fontawesome-->
		<script src="{{asset('admins/js/all.min.js')}}"></script>
        <!-- metis menu -->
        <script src="https://unpkg.com/metismenu"></script>

		<script src="{{asset('admins/plugins/metismenu-3.0.4/assets/js/metismenu.js')}}"></script>
        <script src="{{asset('admins/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js')}}"></script>
		<!-- nice scroll bar -->
		<script src="{{asset('admins/plugins/scrollbar/jquery.nicescroll.min.js')}}"></script>
		<script src="{{asset('admins/plugins/scrollbar/scroll.active.js')}}"></script>
		<!-- counter -->
		<script src="{{asset('admins/plugins/counter/js/counter.js')}}"></script>
		<!-- chart -->
		<script src="{{asset('admins/plugins/chartjs-bar-chart/Chart.min.js')}}"></script>
		<script src="{{asset('admins/plugins/chartjs-bar-chart/chart.js')}}"></script>
		<!-- pie chart -->
        <script src="{{asset('admins/plugins/pie_chart/chart.loader.js')}}"></script>
        
       
        
		<script src="{{asset('admins/plugins/pie_chart/pie.active.js')}}"></script>
		<!-- basic-donut-chart -->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>
  		<script  src="{{asset('admins/plugins/basic-donut-chart/dist/script.js')}}"></script>

		<!-- donut-chart -->
  		<script  src="{{asset('admins/plugins/donut-chart/dist/script.js')}}"></script>






		<!-- Main js -->
		<script src="{{asset('admins/js/main.js')}}"></script>




	</body>
</html>