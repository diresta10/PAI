<link href="http://localhost:8080/assets/css/style_home.css" rel="stylesheet">

<!DOCTYPE html>
<html>
<head>
    <title>Ticket</title>

    <style type="text/css">
        .boxStyle{width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-style: normal;
            font-variant-ligatures: normal;
            font-variant-caps: normal;
            font-variant-numeric: normal;
            font-weight: 400;
            font-stretch: normal;
            font-size: 12px;
            line-height: 16px;
            font-family: Roboto, Helvetica, Arial, sans-serif;

        }
    </style>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        <?php
                        $id_movie=$_GET['id_movie'];

                        use app\core\Application;

                        $statement=Application::$app->movieClass::prepare("Select * FROM movie where id_movie=$id_movie;");
                        $statement->execute();
                        $row=$statement->fetchObject();

                        echo "".$row->name;?>
                    </h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 " align="center">
                            <img alt="User Pic" src="http://localhost:8080/assets/img/uploadimages/<?php echo "$row->image";?>" class=" img-responsive">
                        </div>
                        <div class=" col-md-8 col-lg-8 ">
                            <table class="table table-user-information">
                                <tbody>
                                <?php if (Application::isGuest()): ?>
                                <tr>
                                    <td><strong>Movie Name </strong></td>
                                    <td><?php echo "".$row->name;?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Genre</strong></td>
                                    <td> <?php echo "".$row->genre;?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Director</strong></td>
                                    <td><?php echo "".$row->director;?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td><?php echo "".$row->description;?> </td>
                                </tr>
                                <?php else: ?>
                                <tr>
                                    <td><strong>Movie Name </strong></td>
                                    <td><?php echo "".$row->name;?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Genre</strong></td>
                                    <td> <?php echo "".$row->genre;?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Director</strong></td>
                                    <td><?php echo "".$row->director;?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td><?php echo "".$row->description;?> </td>
                                </tr>

                                <form action="" method="post" >

                                    <tr>
                                        <td><strong>Date</strong></td>
                                        <td>
                                            <select name="datetime" class="boxStyle">
                                                <?php
                                                $statement=Application::$app->movieClass::prepare("SELECT * FROM datetime;");
                                                $statement->execute();

                                                while ($date=$statement->fetchObject()) {?>

                                                    <option value='<?php echo $date->datetime;?>'><?php echo $date->datetime;?></option>

                                                <?php }; ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" width="60%">
                                            <input class="btn btn-primary btn-xs btn-block" type="submit" name="submit" value="Request For Ticket">
                                        </td>
                                    </tr>

                                </form>
                                <?php endif; ?>



                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
</body>

</html>