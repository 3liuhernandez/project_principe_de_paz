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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/login.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/loader_css.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/animate.css')?>" />
    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/fontawesome/css/fontawesome.min.css') ?>">
</head>
<body>
    <div class="container d-flex flex-column">
        <form action="/action_page.php" class="d-flex flex-column align-items-center">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pswd" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div id="modal_spinner" class="container-fluid bg-dark">
        <strong class="text-white mt-2 w3-center">
            <b class="fa fa-spinner fa-spin"></b>
        </strong>
        <p class="text-white mt-4">
            [Si la pantalla persiste por más de 3 minutos: recargue la página]
        </p>
    </div>


    <script src="<?php echo base_url('lib/js/app.js') ?>"></script>
    <script src="<?php echo base_url('lib/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('lib/js/jquery-3.2.1.slim.min.js') ?>"></script>
    <script src="<?php echo base_url('lib/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('lib/js/jquery-validate.min.js') ?>"></script>

    <script>
		$(document).ready(() => {
            showSpiner();
            setTimeout(() => {
                hideSpiner();
            }, 5000);
			$("#form_register").validate();

			$("#submit_form").click((e) => {
				e.preventDefault();
				let validado = $("#form_register").valid();
				if(validado){
					guardarDatos();
				}
				return false;
			});
		});
	</script>

</body>
</html>