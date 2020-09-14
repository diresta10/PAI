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


    <title>Admin | Update User</title>
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
                        <span>Change Password</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="/adminPanel" >
                        <i class="fa fa-users"></i>
                        <span>Manage Users</span>
                    </a>

                </li>
            </ul>
        </div>
    </aside>

{{content}}
</section>
<script src="http://localhost:8080/assets/js/jquery.js"></script>
<script src="http://localhost:8080/assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="http://localhost:8080/assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="http://localhost:8080/assets/js/jquery.scrollTo.min.js"></script>
<script src="http://localhost:8080/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="http://localhost:8080/assets/js/common-scripts.js"></script>


</body>
</html>
