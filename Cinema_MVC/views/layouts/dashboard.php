
<?php

use app\core\Application;
use app\core\db\DbModel;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">


    <link href="http://localhost:8080/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost:8080/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost:8080/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="http://localhost:8080/assets/css/style-responsive.css" rel="stylesheet">


    <title>Admin | Manage Users</title>
</head>

<body>

<section id="container" >
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips"></div>
        </div>
        <a href="#" class="logo"><b>Admin Dashboard</b></a>

        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="/adminLogout">Logout</a></li>
            </ul>
        </div>
    </header>
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="#"><img src="http://localhost:8080/assets/img/logo-small.svg" width="60"></a></p>
                <h5 class="centered"><?php echo Application::$app->admin->getDisplayName(); ?></h5>

                <li class="mt">
                    <a href="#">
                        <i class="fa fa-file"></i>
                        <span>Manage Reservations</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="#" >
                        <i class="fa fa-users"></i>
                        <span>Manage Users</span>
                    </a>

                </li>
            </ul>
        </div>
    </aside>

    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Manage Users</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> All User Details </h4>
                            <hr>
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th class="hidden-phone">First Name</th>
                                <th>Last Name</th>
                                <th>Email </th>
                                <th>Registration Date</th>
                                <th>Postal Code</th>
                                <th>Address</th>
                                <th>Locality</th>
                                <th>Country</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{content}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section
</section>
<script src="http://localhost:8080/assets/js/jquery.js"></script>
<script src="http://localhost:8080/assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="http://localhost:8080/assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="http://localhost:8080/assets/js/jquery.scrollTo.min.js"></script>
<script src="http://localhost:8080/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="http://localhost:8080/assets/js/common-scripts.js"></script>

</body>
</html>
