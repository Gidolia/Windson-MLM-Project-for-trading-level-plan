<?php 
include "config.php";
$d_id=$_SESSION[d_id];
$card=$_GET[card];
$insert="INSERT INTO `autopool_entry_request` (`aer_id`, `d_id`, `date`, `time`, `card`, `status`) VALUES (NULL, '$d_id', '$date', '$time', '$card', 'N');";
if($con->query($insert) === TRUE)
{
    echo "<script>alert('successfully applied for autopool'); location.href='autopool_entry.php';</script>";
    
}
else{echo "<script>alert('Failed please try again'); location.href='autopool_entry.php';</script>";}