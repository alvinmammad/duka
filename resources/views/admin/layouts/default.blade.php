<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	
@include('admin.includes.head')

</head>
<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="loader-wrapper">
			<div class="loader-box">
				<div class="icon">
					<i class="fas fa-utensils"></i>
				</div>
			</div>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->
        
	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">
		
		@include('admin.includes.header')
		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body  ">
			@yield('content')
		</div>
		
		<!--**********************************
            Content body end
        ***********************************-->
		@include('admin.includes.footer')

	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->
	@include('admin.includes.foot')

</body>

</html>