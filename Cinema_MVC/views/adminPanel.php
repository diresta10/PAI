<?php
use app\core\Application;


$statement=Application::$app->userviewClass::prepare("Select * FROM userview");
$statement->execute();

$cnt=0;
$data=$statement->fetchAll();
foreach($data as $row)
{?>

    <tr>
        <td><?php echo $cnt;?></td>
        <td><?php echo $row['firstname'];?></td>
        <td><?php echo $row['lastname'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['created_at'];?></td>
        <td><?php echo $row['postal_code'];?></td>
        <td><?php echo $row['street'];?></td>
        <td><?php echo $row['locality'];?></td>
        <td><?php echo $row['country'];?></td>
        <td>

            <a href="/updateUser?email=<?php echo $row['email'];?>">
                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"> Edit</i></button></a>
            <a href="/deleteUser?email=<?php echo $row['email'];?>">
                <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "> Delete</i></button></a>
        </td>
    </tr>
    <?php $cnt=$cnt+1; }?>