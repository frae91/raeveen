<?php
session_start();
include '../API/EventHandler.php';

$api = new EventHandler();

if (!isset($_SESSION['username'])) {
    echo "No access!";
    exit();
}

$username = $_SESSION['username'];

?>

<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><h4> <font color="yellow">Qu</font><font color="red">iz</font> </h4></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title">Other</h3><!-- /.menu-title -->

                    <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="float-right">
                        <h4>Welcome, <?php echo $username; ?>!</h4>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <?php

                if (isset($_GET['message'])) {
                    switch ($_GET['message']) {
                        case "joined":
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
                    }
                }

            ?>




            <?php

                $line = explode(", ", $api->returnCourseHandler()->returnPreviousCompletedCourse($username));


                if (in_array("C1", $line)) {
                    echo "
                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-header'>
                                    <strong class='card-title'>Course 1 <small><span class='badge badge-success float-right mt-1'>Success</span></small></strong>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>You finished this course!</p>
                                </div>
                            </div>
                        </div>

                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-header'>
                                    <strong class='card-title'>Course 2 <small><span class='badge badge-danger float-right mt-1'>Oops</span></small></strong>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>You have not completed this course!</p>
                                </div>
                            </div>
                        </div>
                    ";
                } else if (in_array("C2", $line)) {
                    echo "
                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-header'>
                                    <strong class='card-title'>Course 1 <small><span class='badge badge-success float-right mt-1'>Success</span></small></strong>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>You finished this course!</p>
                                </div>
                            </div>
                        </div>

                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-header'>
                                    <strong class='card-title'>Course 2 <small><span class='badge badge-success float-right mt-1'>Success</span></small></strong>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>You have completed this course!</p>
                                </div>
                            </div>
                        </div>

                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-header'>
                                    <strong class='card-title'>Course 3 <small><span class='badge badge-danger float-right mt-1'>Oops</span></small></strong>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>You have not completed this course!</p>
                                </div>
                            </div>
                        </div>

                    ";
                } else if (in_array("C3", $line)) {
                    echo "
                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-header'>
                                    <strong class='card-title'>Course 1 <small><span class='badge badge-success float-right mt-1'>Success</span></small></strong>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>You have not completed this course!</p>
                                </div>
                            </div>
                        </div>

                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-header'>
                                    <strong class='card-title'>Course 2 <small><span class='badge badge-success float-right mt-1'>Success</span></small></strong>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>You have completed this course!</p>
                                </div>
                            </div>
                        </div>

                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-header'>
                                    <strong class='card-title'>Course 3 <small><span class='badge badge-success float-right mt-1'>Success</span></small></strong>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>You have completed this course!</p>
                                </div>
                            </div>
                        </div>

                    ";                    
                } else {
                    echo "
                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-header'>
                                    <strong class='card-title'>Course 1 <small><span class='badge badge-danger float-right mt-1'>Oops</span></small></strong>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>You have not completed this course!</p>
                                </div>
                            </div>
                        </div>
                    ";                    
                }
            ?>

        </div> <!-- .content -->

        <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Course Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Benefits: Learn how to be a professional Programmer
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Enroll</button>
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Not Interested</button>
                    </div>
                </div>
            </div>
        </div>











        


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
