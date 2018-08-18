<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>InvisibleX</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url();?>resource/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url();?>resource/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url();?>resource/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url();?>resource/css/style.css" rel="stylesheet">

		<style>
		.login-page {
		    background-color: #F44336;
		    padding-left: 0;
		    max-width: 360px;
		    margin: 5% auto;
		    overflow-x: hidden;
		}
		</style>

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Invisible<b>X</b></a>
            <small></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?=base_url();?>Login/checklogin">
                    <div class="msg">เข้าสู่ระบบ</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus id="username">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required id="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">

														<select class="form-control" name="userrole" id="userrole">
															<option>User</option>
															<option>Agent</option>
                              <option>Administrator</option>
														</select>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-indigo waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>

                    <?php
                    if (isset($_GET["error"])) {
                    ?>
                    <div class="row">
                        <center>
                          <h4 style="color:red;">ไม่สามารถเข้าสู่ระบบได้ !!</h4>
                        </center>
                    </div>
                    <?php
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?=base_url();?>resource/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url();?>resource/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url();?>resource/js/admin.js"></script>
    <script src="<?=base_url();?>resource/js/pages/examples/sign-in.js"></script>
</body>

</html>
