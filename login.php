<!doctype html>

<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quiz Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="dashboard/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboard/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="dashboard/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="dashboard/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="dashboard/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">

                <?php

                    if (isset($_GET['message'])) {
                        switch ($_GET['message']) {
                            case "loggedout":
                                echo '
                                    <div class="col-sm-12">
                                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                            <span class="badge badge-pill badge-success">Success</span> You have been logged in!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                ';
                            break;
                            case "created":
                                echo '
                                    <div class="col-sm-12">
                                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                            <span class="badge badge-pill badge-success">Success</span> Your account has been created!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                ';
                            break;                            
                            case "incorrect":
                                echo '
                                    <div class="col-sm-12">
                                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                            <span class="badge badge-pill badge-danger">Oops</span> Your credentials are wrong!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                ';
                            break;                            
                        }
                    }

                ?>

                <div class="login-logo">
                    <a href="index.html">
                        <h4> Quiz Login </h4>
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="driver/UserLoginDriver.php">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="username" class="form-control" placeholder="Username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="register.php"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
