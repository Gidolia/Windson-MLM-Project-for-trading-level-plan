<?php
 include "../../../database_connect.php";
 $d_id=$_GET[d_id];
 $brokerage=$_GET[brokerage];
 //////////////////level 0
 $lsql="SELECT d_id,s_id FROM `distributor` WHERE `d_id`='$d_id'";
 $que=$con->query($lsql);
 $fet=mysqli_fetch_assoc($que);

 $sql=" INSERT INTO `brokerage` (`b_id`, `d_id`, `date`, `time`, `brokerage`) VALUES (NULL, '$d_id', '$date', '$time', '$brokerage');";
 
 
///////////////////////////level 1
 
 $lsql1="SELECT * FROM `distributor` WHERE `d_id`='$fet[s_id]'";
 $que1=$con->query($lsql1);
 if($que1->num_rows>0)
 {
 $fet1=mysqli_fetch_assoc($que1);
    
    $amount=0.1*$brokerage;
    $withdrawal_wallet=$fet1[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 1 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
    
 } 
 
 ///////////////////////////level 2
 
 $lsql2="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet1[s_id]'";
 $que2=$con->query($lsql2);
 $fet2=mysqli_fetch_assoc($que2);
 if($que2->num_rows>0)
 {   
    $amount=0.05*$brokerage;
    $withdrawal_wallet=$fet2[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet2[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 2 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
 }
 
 ///////////////////////////level 3
 
 $lsql3="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet2[s_id]'";
 $que3=$con->query($lsql3);
 $fet3=mysqli_fetch_assoc($que3);
  if($que3->num_rows>0)
 {  
    $amount=0.03*$brokerage;
    $withdrawal_wallet=$fet3[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet3[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 3 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
    
 }   
 
 
 ///////////////////////////level 4
 
 $lsql4="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
 $que4=$con->query($lsql4);
 $fet4=mysqli_fetch_assoc($que4);
   if($que4->num_rows>0)
 { 
    $amount=0.02*$brokerage;
    $withdrawal_wallet=$fet4[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet4[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 4 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
    
 }
 
 
 ///////////////////////////level 5
 
 $lsql5="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet4[s_id]'";
 $que5=$con->query($lsql5);
 $fet5=mysqli_fetch_assoc($que5);
   if($que5->num_rows>0)
 { 
    $amount=0.02*$brokerage;
    $withdrawal_wallet=$fet5[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet5[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 5 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
    
 }
 
 ///////////////////////////level 6
 
 $lsql6="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet5[s_id]'";
 $que6=$con->query($lsql6);
 $fet6=mysqli_fetch_assoc($que6);
  if($que6->num_rows>0)
 {  
    $amount=0.02*$brokerage;
    $withdrawal_wallet=$fet6[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet6[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 6 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet6[d_id]';";
    
 } 
 
 
 ///////////////////////////level 7
 
 $lsql7="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
 $que7=$con->query($lsql7);
 $fet7=mysqli_fetch_assoc($que7);
   if($que7->num_rows>0)
 { 
    $amount=0.02*$brokerage;
    $withdrawal_wallet=$fet7[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet7[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 7 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet7[d_id]';";
    
    
 }
 
 ///////////////////////////level 8
 
 $lsql8="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet7[s_id]'";
 $que8=$con->query($lsql8);
 $fet8=mysqli_fetch_assoc($que8);
  if($que8->num_rows>0)
 {  
    $amount=0.02*$brokerage;
    $withdrawal_wallet=$fet8[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet8[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 8 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet8[d_id]';";
   
 }
 
 ///////////////////////////level 9
 
 $lsql9="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet8[s_id]'";
 $que9=$con->query($lsql9);
 $fet9=mysqli_fetch_assoc($que9);
  if($que9->num_rows>0)
 {  
    $amount=0.01*$brokerage;
    $withdrawal_wallet=$fet9[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet9[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 9 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet9[d_id]';";
    
 }
 
 
 ///////////////////////////level 10
 
 $lsql10="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet9[s_id]'";
 $que10=$con->query($lsql10);
 $fet10=mysqli_fetch_assoc($que10);
  if($que10->num_rows>0)
 {  
    $amount=0.01*$brokerage;
    $withdrawal_wallet=$fet10[withdrawal_wallet]+$amount;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$fet10[d_id]', '$date', '$time', '+', '$amount', 'Brokerage Level 10 Income');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet10[d_id]';";
 } 
    
    
    if ($con->multi_query($sql) === TRUE) {
        echo "<script>alert('successfully entered');location.href='d_detail.php?d_id=$_GET[d_id]';</script>";
    } else {
      echo "failed";
    }
 

 ?>
 
 
 
