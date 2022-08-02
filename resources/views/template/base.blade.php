<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>..::Mainumby - @yield('title')::..</title>

        <!-- Bootstrap -->
		{!!Html::style('css/bootstrap/bootstrap.min.css') !!}

        <!-- Custom fonts for this template -->
		{!!Html::style('vendor/fontawesome-free/css/all.min.css') !!}
        {!!Html::style('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') !!}

		<!-- Custom styles for this template -->
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

		<!-- Scroll to Top Button -->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

        <!-- JQuery -->
        {!!Html::script('vendor/jquery/jquery.min.js')!!}
        <!-- Bootstrap -->
        {!!Html::script('js/bootstrap/bootstrap.min.js')!!}
        <!-- Bootstrap core JavaScript -->
        {!!Html::script('vendor/bootstrap/js/bootstrap.bundle.min.js')!!}

        <!-- Core plugin JavaScript-->
		{!!Html::script('vendor/jquery-easing/jquery.easing.min.js')!!}

		<!-- Custom scripts for all pages-->
		{!!Html::script('js/sb-admin-2.min.js')!!}

		<!-- Page level plugins -->
		{!!Html::script('vendor/chart.js/Chart.min.js')!!}

        <!-- dataTables -->
		{!!Html::script('vendor/datatables/jquery.dataTables.min.js')!!}
        {!!Html::script('vendor/datatables/dataTables.bootstrap4.min.js')!!}

        <!-- include Page scripts -->
		{{--
        {!!Html::script('js/demo/chart-area-demo.js')!!}
        {!!Html::script('js/demo/chart-pie-demo.js')!!}

        {!!Html::script('js/demo/datatables-demo.js')!!}
        --}}

        {!!Html::script('js/demo/fnts.js')!!}
        {{--
        @stack('scriptsPersona')
        @stack('scriptsPersonaEdit')
        --}}



        <!-- Blade permite empujar a secciones con nombre que se pueden representar
         en otro lugar, o en otra vista o diseño. Esto puede ser particularmente
         útil para especificar las bibliotecas de JavaScript requeridas por
         las vistas. -->

        @stack('pais.list')
        @stack('pais.edit')

        @stack('region.list')
        @stack('region.edit')

        @stack('departamento.create')
        @stack('departamento.list')
        @stack('departamento.edit')

        @stack('ciudad.create')
        @stack('ciudad.list')
        @stack('ciudad.edit')

        @stack('barrio.create')
        @stack('barrio.list')
        @stack('barrio.edit')

        @stack('tipoDireccion.list')
        @stack('tipoDireccion.edit')

        @stack('tipoContacto.list')
        @stack('tipoContacto.edit')

        @stack('tipoDocumento.list')
        @stack('tipoDocumento.edit')

        @stack('tipoEmail.list')
        @stack('tipoEmail.edit')

        @stack('nacionalidad.list')
        @stack('nacionalidad.edit')

        @stack('usuario.list')
        @stack('usuario.edit')

        @stack('rol.list')
        @stack('rol.edit')

        @stack('moneda.list')
        @stack('moneda.edit')

        @stack('periodoFiscal.list')
        @stack('periodoFiscal.edit')

        @stack('persona.create')
        @stack('persona.list')
        @stack('persona.edit')
	</body>
</html>
