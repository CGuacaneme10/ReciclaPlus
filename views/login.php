<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Iniciar Sesión</title>

	<!-- Font Icon -->
	<link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Estilo.css">
</head>

<body>

	<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
						<figure><img src="assets/images/about.png" alt="sing up image"></figure>
					</div>
					<div class="signin-form">
					<?php
					if (isset($error['errorMessage'])) {
					?>
						<div class="alert alert-danger alert-dismissable alert-width" role="alert">
							<button class="close" data-dismiss="alert">&times;</button>
							<p class="text-dark"><?php echo $error['errorMessage']; ?></p>
						</div>
					<?php
					}
					?>
						<h2 class="form-title">Iniciar Sesión</h2>
						<form method="POST" action="?controller=login&method=login" class="register-form" id="login-form">
							<div class="form-group">
								<label><i class="zmdi zmdi-email material-icons-name"></i></label>
								<input type="email" name="email" placeholder="Correo electronico" />
							</div>
							<div class="form-group">
								<label><i class="zmdi zmdi-lock material-icons-name"></i></label>
								<input  type="password" name="password" id="password" placeholder="Contraseña" /> <i class="fa fa-eye" id="show">=</i> 
							</div>
							

							<div class="form-group form-button">
								<input type="submit" name="signin" id="signin" class="form-submit" value="Ingresar" />
							</div>
							<a href="?controller=login&method=olvidaste">Olvidaste tu contraseña?</a>
						</form>

					</div>

				</div>

			</div>
		</section>
	</div>

	<!-- JS -->
	<script src="https://kit.fontawesome.com/01c3147347.js" crossorigin="anonymous"></script>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugin/chartist/chartist.min.js"></script>
    <script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/js/demo.js"></script>
	<script src="assets/js/login.js"></script>
	
</body>