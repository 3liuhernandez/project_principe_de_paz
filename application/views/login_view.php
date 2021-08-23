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
    <div class="container d-flex flex-column justify-content-center my-4">
        <form id="loginform" onsubmit="return validate(event);" class="d-flex justify-content-center align-content-center flex-column w-50 mx-auto my-auto">
            <div id="alert" class="mt-4 alert alert-danger hidden" role="alert">
                <strong> E-mail Inválido </strong>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pswd" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </form>
    </div>

    <script src="<?php echo base_url('lib/js/app.js') ?>"></script>
    <script src="<?php echo base_url('lib/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('lib/js/jquery-3.2.1.slim.min.js') ?>"></script>
    <script src="<?php echo base_url(); ?>lib/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>lib/js/bs/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('lib/js/popper.min.js') ?>"></script>

    <script>
    function validate(e) {
        e.preventDefault();
        let email = document.getElementById("email");
        let pwd = document.getElementById("pwd");
        let submit = document.getElementById("submit");
        let base_url = <?php echo json_encode(base_url()); ?>;

        if (!email.checkValidity() || !pwd.checkValidity() ) {
            document.getElementById("alert").innerHTML = inpObj.validationMessage;

        } else {
            const url = base_url + 'User_controller/validate_login';
            
            $.ajax({
                url: url,
                data: {'email': email.value, 'password': pwd.value},
                type: 'POST',
                beforeSend: function(){
                    submit.disabled = true;
                },
                success: function(data){
                    respuesta = JSON.parse(data);
                    if(respuesta.loggin) {
                        console.log('login successfull');
                        //window.location = base_url + "home";
                    }
                    else if(respuesta.email) {
                        console.log(respuesta);
                        $('#alert').toggle('fast');
                        submit.disabled = false;
                        setTimeout(function(){
                            $('#alert').toggle('fast');
                        }, 3000)
                    }else {
                        console.log(respuesta);
                    }
                },
                error: function(){
                    console.log('error filesystem: ' + url);
                    /* window.location = base_url + "login"; */
                }
            })
        }
        return false;
    }
</script>

</body>
</html>