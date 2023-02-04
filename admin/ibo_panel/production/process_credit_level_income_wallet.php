<?php
include "config.php";
if(isset($_GET[a1_submit]))
{
    $grand_total=0;
    $dis_sel="SELECT * FROM `distributor`";
    $cd=$con->query($dis_sel);
    while($sd=mysqli_fetch_assoc($cd))
    {
   if($sd[activate1]=='Y' && $sd[id_active]!='N')
    {
    $start_date=$_GET[start_date];
    $end_date=$_GET[end_date];
    
    $t_amount=0;
    while(strtotime($start_date)<=strtotime($end_date))
    {
        
        echo $start_date."<br>";
        
        $sql="SELECT * FROM `activate1_wallet_history` WHERE `d_id`='$sd[d_id]' AND `date`='$start_date' AND `activate_for`='1'";
        $que=$con->query($sql);
        while($ad=$que->fetch_assoc())
        {
            $t_amount=$t_amount+$ad['amount'];
        }
        $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
    }
    $det_amt=0;
    $df="SELECT * FROM `advenced_withdrawal` WHERE `d_id`='$sd[d_id]' AND `acc`='1' AND `status`='N'";
    $sxsx=$con->query($df);
    while($scxn=$sxsx->fetch_assoc()){
        $det_amt=$det_amt+$scxn[amount];
        $dcf="UPDATE `advenced_withdrawal` SET `status` = 'Y' WHERE `advenced_withdrawal`.`aw_id` = '$scxn[aw_id]';";
        if($con->query($dcf)===TRUE){ }
    }
    $t_amount=$t_amount-$det_amt;
    $grand_total=$grand_total+$t_amount;
    $a1_wallet=$sd[a1_wallet]-$t_amount;
    $withdrawal_wallet=$t_amount+$sd[withdrawal_wallet];
    
    $ins="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = $sd[d_id];";
    $ins1="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$sd[d_id]', '$date', '$time', '+', '$t_amount', 'level commission for activation 1');";
    $ins2="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$sd[d_id]', '$date', '$time', '$t_amount', '-', '$a1_wallet', '', '', '');";
    $ins3="UPDATE `distributor` SET `a1_wallet` = '$a1_wallet' WHERE `distributor`.`d_id` = '$sd[d_id]';";
    if($con->query($ins)===TRUE && $con->query($ins2)===TRUE && $con->query($ins3)===TRUE && $con->query($ins1)===TRUE ){
        echo "done";
       
    }
    else{
        echo "failed";
    }
    
    }  
    else{
       $ins2="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$sd[d_id]', '$date', '$time', '$sd[a1_wallet]', '-', '0', '', '', '');";
       $ins3="UPDATE `distributor` SET `a1_wallet` = '0' WHERE `distributor`.`d_id` = '$sd[d_id]';"; 
       if($con->query($ins2)===TRUE && $con->query($ins3)===TRUE){
        echo "done";
        }
        else{
            echo "failed";
        }
    }
    echo $sd[d_id]."<br>";
    }
    $sql="INSERT INTO `level_payment_wallet_record` (`lpwr_id`, `date`, `time`, `from_date`, `to_date`, `acc`, `amount_given`) VALUES (NULL, '$date', '$time', '$_GET[start_date]', '$end_date', '1', '$grand_total');";
    if($con->query($sql)=== TRUE)
    {
        echo "<script>alert('Successfully done'); location.href='autopool_income_wallet.php'</script>";
    }
}



///////////////////////////////////////////////////////for activate2 wallet
if(isset($_GET[a2_submit]))
{
    $grand_total=0;
    $d_id=$_GET[d_id];
    $dis_sel="SELECT * FROM `distributor`";
    $cd=$con->query($dis_sel);
    while($sd=$cd->fetch_assoc())
    {
    if($sd[activate2]=='Y' && $sd[id_active]!='N')
    {
    $start_date=$_GET[start_date];
    $end_date=$_GET[end_date];
    
    $t_amount=0;
    while(strtotime($start_date)<=strtotime($end_date))
    {
        
        echo $start_date."<br>";
        
        $sql="SELECT * FROM `activate1_wallet_history` WHERE `d_id`='$sd[d_id]' AND `date`='$start_date' AND `activate_for`='2'";
        $que=$con->query($sql);
        while($ad=$que->fetch_assoc())
        {
            $t_amount=$t_amount+$ad['amount'];
        }
        $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
    }
    $det_amt=0;
    $df="SELECT * FROM `advenced_withdrawal` WHERE `d_id`='$sd[d_id]' AND `acc`='2' AND `status`='N'";
    $sxsx=$con->query($df);
    while($scxn=$sxsx->fetch_assoc()){
        $det_amt=$det_amt+$scxn[amount];
        $dcf="UPDATE `advenced_withdrawal` SET `status` = 'Y' WHERE `advenced_withdrawal`.`aw_id` = '$scxn[aw_id]';";
        if($con->query($dcf)===TRUE){ }
    }
    $t_amount=$t_amount-$det_amt;
    $grand_total=$grand_total+$t_amount;
    $a2_wallet=$sd[a2_wallet]-$t_amount;
    $withdrawal_wallet=$t_amount+$sd[withdrawal_wallet];
    $ins="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = $sd[d_id];";
    $ins1="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$sd[d_id]', '$date', '$time', '+', '$t_amount', 'level commission for activation 2');";
    $ins2="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$sd[d_id]', '$date', '$time', '$t_amount', '-', '$a2_wallet', '', '', '');";
    $ins3="UPDATE `distributor` SET `a2_wallet` = '$a2_wallet' WHERE `distributor`.`d_id` = '$sd[d_id]';";
    if($con->query($ins)===TRUE && $con->query($ins2)===TRUE && $con->query($ins3)===TRUE && $con->query($ins1)===TRUE ){
        echo "done";
    }
    else{
        echo "failed";
    }
    
    }
     else{
       $ins2="INSERT INTO `activate1_wallet_history` (`a1wh_id`, `d_id`, `date`, `time`, `amount`, `type`, `a_bal`, `activated_d_id_commission`, `level`, `activate_for`) VALUES (NULL, '$sd[d_id]', '$date', '$time', '$sd[a2_wallet]', '-', '0', '', '', '');";
       $ins3="UPDATE `distributor` SET `a2_wallet` = '0' WHERE `distributor`.`d_id` = '$sd[d_id]';"; 
       if($con->query($ins2)===TRUE && $con->query($ins3)===TRUE){
        echo "done";
        }
        else{
            echo "failed";
        }
    }
    }
    $sql="INSERT INTO `level_payment_wallet_record` (`lpwr_id`, `date`, `time`, `from_date`, `to_date`, `acc`, `amount_given`) VALUES (NULL, '$date', '$time', '$_GET[start_date]', '$end_date', '2', '$grand_total');";
    if($con->query($sql)=== TRUE)
    {
        echo "<script>alert('Successfully done'); location.href='autopool_income_wallet.php'</script>";
    }
    
}
