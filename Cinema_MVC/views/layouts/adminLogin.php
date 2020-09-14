<?php
/**
 * @var $model app\models\Admin
 */

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Login</title>
    <link href="http://localhost:8080/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost:8080/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="http://localhost:8080/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost:8080/assets/css/style-responsive.css" rel="stylesheet">
</head>

<body>
<div id="login-page">

    <nav class="navbar navbar-expand-md sticky-top">
        <a class="navbar-brand" href="#"><img src="http://localhost:8080/assets/img/logo.svg"></a>
    </nav>

    <div class="container">
        <h1>Admin Panel</h1>
        <form class="form-login" action="" method="post">
            <h2 class="form-login-heading">Sign in</h2>
            <p style="color:#F00; padding-top:20px;" align="center">
            <div class="login-wrap">
                <input type="text" name="email" class="form-control" placeholder="Admin email" autofocus>
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password"><br >
                <input  name="login" class="btn btn-theme btn-block" type="submit" value="Submit">

            </div>
        </form>

    </div>
</div>
<script src="http://localhost:8080/assets/js/jquery.js"></script>
<script src="http://localhost:8080/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://localhost:8080/assets/js/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("http://localhost:8080/assets/img/fotele.jpg", {speed: 500});
</script>


</body>
</html>
