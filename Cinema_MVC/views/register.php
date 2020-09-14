<?php
/**
 * @var $model app\models\User
 * @var $model_add app\models\Address
 */
use app\models\User;
use app\models\Address;

?>

    <div class="container">
        <h1>Register</h1>
<?php $form = \app\core\form\Form::begin('',"post")?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model, 'firstname')?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'lastname')?>
    </div>
</div>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password') -> passwordField()?>
<?php echo $form->field($model, 'confirmPassword') -> passwordField()?>
<h5>Address</h5>
<?php echo $form->field($model_add, 'postal_code') ?>
<?php echo $form->field($model_add, 'street')?>
<?php echo $form->field($model_add, 'locality')?>
<?php echo $form->field($model_add, 'country')?>


<button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end();?>
    </div>
