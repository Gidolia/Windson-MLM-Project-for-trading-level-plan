<?php
 include "../../../database_connect.php";
 $d_id=$_GET[d_id];
 //////////////////level 0
 $lsql="SELECT d_id,s_id,activate2 FROM `distributor` WHERE `d_id`='$d_id'";
 $que=$con->query($lsql);
 $fet=mysqli_fetch_assoc($que);
 
 if($fet[activate2]=="N")
 {
 
    $sql="UPDATE `distributor` SET `activate2` = 'Y' WHERE `distributor`.`d_id` = '$d_id';";
    $sql .="UPDATE `distributor` SET `id_a2_date` = '$date' WHERE `distributor`.`d_id` = '$d_id';";
 
 
///////////////////////////level 1
 
 $lsql1="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet[s_id]'";
 $que1=$con->query($lsql1);
 $fet1=mysqli_fetch_assoc($que1);
 
    $a2_wallet=$fet1[a2_wallet]+200;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '200', '+', '$a2_wallet', '$d_id', '1', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
    
    
 
 ///////////////////////////level 2
 
 $lsql2="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet1[s_id]'";
 $que2=$con->query($lsql2);
 $fet2=mysqli_fetch_assoc($que2);
 
 
    $a2_wallet=$fet2[a2_wallet]+20;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet2[d_id]', '$date', '$time', '20', '+', '$a2_wallet', '$d_id', '2', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
    
 
 ///////////////////////////level 3
 
 $lsql3="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet2[s_id]'";
 $que3=$con->query($lsql3);
 $fet3=mysqli_fetch_assoc($que3);
 
 
     $a2_wallet=$fet3[a2_wallet]+15;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet3[d_id]', '$date', '$time', '15', '+', '$a2_wallet', '$d_id', '3', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
    
    
 
 
 ///////////////////////////level 4
 
 $lsql4="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
 $que4=$con->query($lsql4);
 $fet4=mysqli_fetch_assoc($que4);
 
     $a2_wallet=$fet4[a2_wallet]+15;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet4[d_id]', '$date', '$time', '15', '+', '$a2_wallet', '$d_id', '4', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
    
   
 
 
 ///////////////////////////level 5
 
 $lsql5="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet4[s_id]'";
 $que5=$con->query($lsql5);
 $fet5=mysqli_fetch_assoc($que5);
 
 
     $a2_wallet=$fet5[a2_wallet]+10;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet5[d_id]', '$date', '$time', '10', '+', '$a2_wallet', '$d_id', '5', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
    
   
 
 ///////////////////////////level 6
 
 $lsql6="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet5[s_id]'";
 $que6=$con->query($lsql6);
 $fet6=mysqli_fetch_assoc($que6);
 
 
     $a2_wallet=$fet6[a2_wallet]+5;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet6[d_id]', '$date', '$time', '5', '+', '$a2_wallet', '$d_id', '6', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet6[d_id]';";
    
    
 
 
 ///////////////////////////level 7
 
 $lsql7="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet6[s_id]'";
 $que7=$con->query($lsql7);
 $fet7=mysqli_fetch_assoc($que7);
 
 
     $a2_wallet=$fet7[a2_wallet]+5;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet7[d_id]', '$date', '$time', '5', '+', '$a2_wallet', '$d_id', '7', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet7[d_id]';";
    
    
 
 
 ///////////////////////////level 8
 
 $lsql8="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet7[s_id]'";
 $que8=$con->query($lsql8);
 $fet8=mysqli_fetch_assoc($que8);
 
 
     $a2_wallet=$fet8[a2_wallet]+3;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet8[d_id]', '$date', '$time', '3', '+', '$a2_wallet', '$d_id', '8', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet8[d_id]';";
   
 
 
 ///////////////////////////level 9
 
 $lsql9="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet8[s_id]'";
 $que9=$con->query($lsql9);
 $fet9=mysqli_fetch_assoc($que9);
 
 
     $a2_wallet=$fet9[a2_wallet]+3;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet9[d_id]', '$date', '$time', '3', '+', '$a2_wallet', '$d_id', '9', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet9[d_id]';";
    
   
 
 
 ///////////////////////////level 10
 
 $lsql10="SELECT d_id,s_id,a2_wallet FROM `distributor` WHERE `d_id`='$fet9[s_id]'";
 $que10=$con->query($lsql10);
 $fet10=mysqli_fetch_assoc($que10);
 
 
     $a2_wallet=$fet10[a2_wallet]+2;
    $sql .="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$fet10[d_id]', '$date', '$time', '2', '+', '$a2_wallet', '$d_id', '10', '2');";
    $sql .="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$fet10[d_id]';";
    
    
    
    if ($con->multi_query($sql) === TRUE) {
        echo "<script>location.href='d_detail.php?d_id=$_GET[d_id]';</script>";
    } else {
      echo "failed";
    }
 
 }
 else{echo "this id is already activated";}

 
 
 
 ?>