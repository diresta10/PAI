<?php
use app\core\Application;

$email = $_GET['email'];

$statement=Application::$app->userviewClass::prepare("Select * FROM userview where email='$email'");
$statement->execute();

while($row=$statement->fetch())

{?>

<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> <?php echo $row['firstname'];?>'s Information</h3>

        <div class="row">

            <div class="col-md-12">
                <div class="content-panel">
                    <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname'];?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'];?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Registration Date </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="created_at" value="<?php echo $row['created_at'];?>" readonly >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Postal Code </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="postal_code" value="<?php echo $row['postal_code'];?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Address </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="street" value="<?php echo $row['street'];?>"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Locality </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="locality" value="<?php echo $row['locality'];?>"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Country </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="country" value="<?php echo $row['country'];?>" >
                            </div>
                        </div>
                        <div style="margin-left:100px;">
                            <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</section>