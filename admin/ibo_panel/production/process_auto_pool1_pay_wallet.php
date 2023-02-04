<?php
include "config.php";
function id_autopool1_income($d_id)
{
    echo $d_id."<br>";
        global $con, $date, $time;
        $amount=0;
        $dvb=0;
        $fvbhjk=0;
        $ins_sql="INSERT INTO `autopool_check_history` (`ach_id`, `date`, `time`) VALUES (NULL, '$date', '$time');";
    $temp=array();
    $temp1=array();
    $sql1="SELECT * FROM `autopool1` WHERE `s_id`='$d_id';";
    $que1=$con->query($sql1);
    while($cd=mysqli_fetch_assoc($que1))
    {
        $temp[]=$cd[d_id];
    }
    $sccd="SELECT * FROM `auto_pool_wallet` WHERE `d_id`='$d_id' AND `level`='1' AND `autopool_no`='1';";
    $xz=$con->query($sccd);
    if($xz->num_rows == 0)
    {
        if(count($temp)>=5)
        {
            
           $ins_sql .="INSERT INTO `auto_pool_wallet` (`apw_id`, `d_id`, `date`, `time`, `level`, `autopool_no`, `amount`, `status`) VALUES (NULL, '$d_id', '$date', '$time', '1', '1', '50', 'Y');"; 
           $ins_sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$d_id', '$date', '$time', '+', '50', 'Auto Pool 1 Level 1 Income');";
           $amount=50;
           $dvb=1;
           $fvbhjk=1;
           
        }
    }
        
      //////////////////////////////level 2 income check up  
    for($x=0; $x<count($temp); $x++)
    {
        $sql2="SELECT * FROM `autopool1` WHERE `s_id`='$temp[$x]';";
        $que2=$con->query($sql2);
        while($cd2=mysqli_fetch_assoc($que2))
        {
            $temp1[]=$cd2[d_id];
        }
    }
    unset($temp);
    $temp=array();
    $sccd="SELECT * FROM `auto_pool_wallet` WHERE `d_id`='$d_id' AND `level`='2' AND `autopool_no`='1';";
    $xz=$con->query($sccd);
    if($xz->num_rows == 0)
    {
        if(count($temp1)>=25)
        {
           $ins_sql .="INSERT INTO `auto_pool_wallet` (`apw_id`, `d_id`, `date`, `time`, `level`, `autopool_no`, `amount`, `status`) VALUES (NULL, '$d_id', '$date', '$time', '2', '1', '250', 'Y');"; 
           $ins_sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$d_id', '$date', '$time', '+', '250', 'Auto Pool 1 Level 2 Income');";
           $amount=$amount+250;
           $dvb=1;
           $fvbhjk=1;
        }
    }
      //////////////////////////////level 3 income check up  
    for($x=0; $x<count($temp1); $x++)
    {
        $sql2="SELECT * FROM `autopool1` WHERE `s_id`='$temp1[$x]';";
        $que2=$con->query($sql2);
        while($cd2=mysqli_fetch_assoc($que2))
        {
            $temp[]=$cd2[d_id];
        }
    }
    unset($temp1);
    $temp1=array();
    $sccd="SELECT * FROM `auto_pool_wallet` WHERE `d_id`='$d_id' AND `level`='3' AND `autopool_no`='1';";
    $xz=$con->query($sccd);
    if($xz->num_rows == 0)
    {
        if(count($temp)>=125)
        {
           $ins_sql .="INSERT INTO `auto_pool_wallet` (`apw_id`, `d_id`, `date`, `time`, `level`, `autopool_no`, `amount`, `status`) VALUES (NULL, '$d_id', '$date', '$time', '3', '1', '1250', 'N');";
           $fvbhjk=1;
        }
    }
    
      //////////////////////////////level 4 income check up  
    for($x=0; $x<count($temp); $x++)
    {
        $sql2="SELECT * FROM `autopool1` WHERE `s_id`='$temp[$x]';";
        $que2=$con->query($sql2);
        while($cd2=mysqli_fetch_assoc($que2))
        {
            $temp1[]=$cd2[d_id];
        }
    }
    unset($temp);
    $temp=array();
    $sccd="SELECT * FROM `auto_pool_wallet` WHERE `d_id`='$d_id' AND `level`='4' AND `autopool_no`='1';";
    $xz=$con->query($sccd);
    if($xz->num_rows == 0)
    {
        if(count($temp1)>=625)
        {
           $ins_sql .="INSERT INTO `auto_pool_wallet` (`apw_id`, `d_id`, `date`, `time`, `level`, `autopool_no`, `amount`, `status`) VALUES (NULL, '$d_id', '$date', '$time', '4', '1', '3250', 'N');"; 
           $fvbhjk=1;
           
           
        }
    }
    
      //////////////////////////////level 5 income check up  
    for($x=0; $x<count($temp1); $x++)
    {
        $sql2="SELECT * FROM `autopool1` WHERE `s_id`='$temp1[$x]';";
        $que2=$con->query($sql2);
        while($cd2=mysqli_fetch_assoc($que2))
        {
            $temp[]=$cd2[d_id];
        }
    }
    unset($temp1);
    $temp1=array();
    $sccd="SELECT * FROM `auto_pool_wallet` WHERE `d_id`='$d_id' AND `level`='5' AND `autopool_no`='1';";
    $xz=$con->query($sccd);
    if($xz->num_rows == 0)
    {
        if(count($temp)>=3125)
        {
           $ins_sql .="INSERT INTO `auto_pool_wallet` (`apw_id`, `d_id`, `date`, `time`, `level`, `autopool_no`, `amount`, `status`) VALUES (NULL, '$d_id', '$date', '$time', '5', '1', '9325', 'N');"; 
           $fvbhjk=1;
        }
    }
    
    if($fvbhjk==1)
    {
        if($dvb==1)
        {
            $xmj="SELECT * FROM `distributor` WHERE `d_id`='$d_id'";
            $xn=$con->query($xmj);
            $skl=mysqli_fetch_assoc($xn);
            $c_sdv=$skl[withdrawal_wallet]+$amount;
             $ins_sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$c_sdv' WHERE `distributor`.`d_id` = '$d_id';";
        }
        if($con->multi_query($ins_sql) === TRUE)
        {
           echo "<script>alert('Successfully done'); location.href='autopool1.php'</script>";
        }
        else{echo "Failed ".$d_id."<br>";}
    }
}
$sql1="SELECT * FROM `autopool1`";
$que1=$con->query($sql1);
while($ds=mysqli_fetch_assoc($que1))
{
    //echo $ds[d_id];
    
    id_autopool1_income($ds[d_id]);
    
}
echo "<script>alert('Autopool 1 Payment Checkup Done Successfully'); location.href='autopool1.php'</script>";


?>