<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAI Invercol | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body  {
        background-image:url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg") !important; 
        background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px !important;
        }

        .login-box, .register-box {
        margin: 3% auto;
        }
    </style>
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?php echo base_url();?>assets/dist/img/logo-invercol.jpg" width="100%" class="img-responsive" alt="" />
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Registre un nuevo usuario</p>
            <div class="text-danger">
                <?php
                $error_msg=$this->session->flashdata('error_msg');
                    if($error_msg){
                        echo $error_msg;
                    }
                ?>
            </div>
            <?php echo form_open('cusers/register_user', 'role="login"'); ?>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Nombre de Usuario" name="user_name" type="text" required>  
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="E-mail" name="user_email" type="email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Nombres y Apellidos" name="user_data" type="text" value="" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Teléfono" name="user_mobile" type="number" value="" required>
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <br>
                    <a href="<?php echo base_url('cusers'); ?>" class="text-center">ya está registrado?</a>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" value="Registrar" name="register" class="btn btn-lg btn-success btn-block">Registrar</button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(function () {
            $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
            });
        });
        </script>
    </body>
</html>