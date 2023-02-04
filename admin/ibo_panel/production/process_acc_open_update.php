<?php
include "config.php";

if($_GET[acc]==1)
{
    $sql="UPDATE `distributor` SET `acc_open1` = 'Y' WHERE `distributor`.`d_id` = '$_GET[d_id]';";
}
if($_GET[acc]==2)
{
    $sql="UPDATE `distributor` SET `acc_open2` = 'Y' WHERE `distributor`.`d_id` = '$_GET[d_id]';";
}
if($con->query($sql) === TRUE)
{
 echo "<script>location.href='d_detail.php?d_id=$_GET[d_id]';</script>";
}
else{echo "query failed please try again";}



?>