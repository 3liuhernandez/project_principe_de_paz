<!DOCTYPE html>
<html lang="es" prefix="og: https://ogp.me/ns#">
<head prefix="home: <?php echo base_url()?>home">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Primary Meta Tags -->
    <title>Proyecto - Principe de paz</title>
    <meta name="title" content="Proyecto - Principe de paz">
    <meta name="description" content="Proyecto - Principe de paz">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/bs/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/login_2.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/loader_css.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/animate.css')?>" />
    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/fontawesome/css/fontawesome.min.css') ?>">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Inicio de Sesión </h3>
				<div class="d-flex justify-content-end social_icon">
					<img class="logo" src="<?php echo base_url('lib/img/logoccaa.png') ?>">
				</div>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="usuario">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="contraseña">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Recordarme inicio de sesión
					</div>
					<div class="form-group">
						<input type="submit" value="Entrar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				
				<div class="d-flex justify-content-center">
					<a href="#">'¿Olvidó la contraseña'?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
