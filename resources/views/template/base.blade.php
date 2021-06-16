<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>..::Mainumby - @yield('title')::..</title>

		<!-- Custom fonts for this template-->
		{!!Html::style('vendor/fontawesome-free/css/all.min.css') !!}
        {!!Html::style('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') !!}

		<!-- Custom styles for this template-->
		{!!Html::style('css/sb-admin-2.min.css')!!}

		<!-- Custom styles for this page -->
        {!!Html::style('vendor/datatables/dataTables.bootstrap4.min.css')!!}
	</head>

	<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

			@include('inc.sidebar')

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					@include('inc.topbar')

					<!-- Begin Page Content -->
					<div class="container-fluid">

						<!-- Page Heading welcome
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
							<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
						</div>

						<!-- Page Heading list
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Listado Principal - Tipos Legales</h1>
							<a href="{!!URL::to('/tiposlegales/create')!!}" class="btn btn-primary btn-icon-split" title="Nuevo Registro">
								<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
								<span class="text">Nuevo Registro</span>
							</a>
						</div>

						<!-- Page Heading create
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Nuevo Registro - Tipos Legales</h1>
						</div>

						<!-- Page Heading edit
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Actualizar Registro - Tipos Legales</h1>
						</div>

						<!-- Page Heading show
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Detalles del Registro - Tipos Legales</h1>
						</div>

						<!-- Page Heading prueba
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">@yield('heading')</h1>
						</div>
						-->

						@yield('content')

					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->

				@include('inc.footer')

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="login.html">Logout</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		{!!Html::script('vendor/jquery/jquery.min.js')!!}
        {!!Html::script('vendor/bootstrap/js/bootstrap.bundle.min.js')!!}

		<!-- Core plugin JavaScript-->
		{!!Html::script('vendor/jquery-easing/jquery.easing.min.js')!!}

		<!-- Custom scripts for all pages-->
		{!!Html::script('js/sb-admin-2.min.js')!!}

		<!-- Page level plugins -->
		{!!Html::script('vendor/chart.js/Chart.min.js')!!}

		{!!Html::script('vendor/datatables/jquery.dataTables.min.js')!!}
        {!!Html::script('vendor/datatables/dataTables.bootstrap4.min.js')!!}

		<!-- Page level custom scripts -->
		{{-- {!!Html::script('js/demo/chart-area-demo.js')!!}
        {!!Html::script('js/demo/chart-pie-demo.js')!!} --}}

		{!!Html::script('js/demo/datatables-demo.js')!!}

		{!!Html::script('js/demo/fnts.js')!!}
	</body>

</html>
