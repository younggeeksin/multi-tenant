<!--
	/**
	 * Name: Subodh Kumar
	 * Purpose : Login Authentication view.
	 */
-->

<!doctype html>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="<?= base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <!--<img class="align-content" src="<?= base_url();?>assets/images/logo.png" alt="">-->
						<h2>Admin Login</h2>
                    </a>
                </div>
                <div class="login-form">
                    <form action="<?= base_url('login/auth')?>" method="POST">
					<center><h3 style="color:green"><?php echo $this->session->flashdata('msg')?></h3></center>
					<center><h3 style="color:red"><?php echo $this->session->flashdata('error')?></h3></center>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email or Username" required>
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                  </div>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>Powered By: <a href="https://younggeeks.in" style="color:green"> Younggeeks Technologies</a></p>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/main.js"></script>


</body>

</html>
