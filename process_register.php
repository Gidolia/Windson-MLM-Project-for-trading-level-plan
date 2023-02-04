<?php include "database_connect.php"; 
function isNumber($c) {
    return preg_match('/[0-9]/', $c);
}
$string=$_POST[s_id];
$chars = '';
$s_id = '';
for ($index=0;$index<strlen($string);$index++) {
    if(isNumber($string[$index]))
    {
        $s_id .= $string[$index];
    }
    else {
        $chars .= $string[$index];}
    
}

$sqqqws="SELECT * FROM `distributor` WHERE `d_id`='$s_id'";
$dsdws=$con->query($sqqqws);
$fbv=mysqli_fetch_assoc($dsdws);
if($dsdws->num_rows >0)
{

if(isset($_POST[reg_submit]))
{
    
	$sqqq="SELECT pan_card FROM `distributor` WHERE `pan_card`='$_POST[pancard]'";
	$dsd=$con->query($sqqq);
	if($dsd->num_rows==0)
	{
	$sqqq="SELECT mobile FROM `distributor` WHERE `mobile`='$_POST[mobile]'";
	$dsd=$con->query($sqqq);
	if($dsd->num_rows==0)
	{
	$sqqq="SELECT email FROM `distributor` WHERE `email`='$_POST[email]'";
	$dsd=$con->query($sqqq);
	if($dsd->num_rows==0)
	{
    $sqlkj="SELECT MAX(d_id) as max FROM `distributor`";
  		$dfgh=$con->query($sqlkj);
		$fdbv=mysqli_fetch_array($dfgh);
		$d_id=$fdbv[max]+1;
    //echo $d_id;
    
   // $sql="INSERT INTO `distributor` (`d_id`, `s_id`, `name`, `email`, `mobile`, `password`, `city`, `state`, `addreass`, `adhar_card_no`, `pan_card`, `acc_no`, `ifsc_code`, `bank_name`, `activate1`, `activate2`, `id_creation_date`, `id_a1_date`, `id_a2_date`) VALUES ('$d_id', '$_POST[s_id]', '$_POST[name]', '$_POST[email]', '$_POST[mobile]', '$_POST[password]', '', '', '', '', '$_POST[pancard]', '', '', '', 'N', 'N', '$date', '', '');";
    $sql="INSERT INTO `distributor` (`d_id`, `s_id`, `name`, `email`, `mobile`, `password`, `city`, `state`, `addreass`, `adhar_card_no`, `adhar_status`, `pan_card`, `pan_status`, `acc_no`, `acc_status`, `ifsc_code`, `bank_name`, `activate1`, `activate2`, `id_creation_date`, `id_creation_time`, `id_a1_date`, `id_a2_date`, `a1_wallet`, `a2_wallet`, `withdrawal_wallet`, `trading_wallet`, `autopool_enterd_card`, `acc_open1`, `acc_open2`) VALUES ('$d_id', '$s_id', '$_POST[name]', '$_POST[email]', '$_POST[mobile]', '$_POST[password]', '', '', '', '', '', '$_POST[pancard]', '', '', '', '', '', 'N', 'N', '$date', '$time', '', '', '0', '0', '0', '0', '', 'N', 'N');";
    
    //$sql="INSERT INTO `distributor` (`d_id`, `s_id`, `name`, `email`, `mobile`, `password`, `city`, `state`, `addreass`, `adhar_card_no`, `adhar_status`, `pan_card`, `pan_status`, `acc_no`, `acc_status`, `ifsc_code`, `bank_name`, `activate1`, `activate2`, `id_creation_date`, `id_creation_time`, `id_a1_date`, `id_a2_date`, `a1_wallet`, `a2_wallet`, `withdrawal_wallet`, `trading_wallet`, `autopool_enterd_card`, `acc_open1`, `acc_open2`, `acc_1_note`, `acc_2_note`, `id_active`) VALUES ('$d_id', '$s_id', '$_POST[name]', '$_POST[email]', '$_POST[mobile]', '$_POST[password]', '', '', '', '', '', '$_POST[pancard]', '', '', '', '', 'N', 'N', '$date', '$time', '', '', '', '', '', '', '', '', '', '', '', '', '');";
    
  if($con->query($sql) === TRUE)
		{
			// Multiple recipients
$to = $_POST[email]; // note the comma

// Subject
$subject = 'Windson Group Login Detail';

// Message
$message = '
<html>
<head>
  <title>Windson Group</title>
</head>
<body>
  <p>Welcome To Windson Group</p>
  <table>
    <tr>
      <td>Your Login ID</td><th>wg'.$d_id.'</th>
    </tr>
    <tr>
      <td>Your Login Password</td><th>'.$_POST[password].'</th>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';



// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
				echo "<script>alert('You have successfully registered');
		               location.href='success_reg.php?d_id=$d_id&name=$_POST[name]';</script>";
		}
	 	else
		{
		 		echo "<script>alert('Query failed please try again');
		               location.href='index.php';</script>";
	 	}
	}
	else{
		echo "<script>alert('Email ID is already Register');
		               window.history.back();</script>";
	}
	}
	else{
		echo "<script>alert('Mobile No. is already Register');
		               window.history.back();</script>";
	}
	}
	else{
		echo "<script>alert('Pancard is already Register');
		               window.history.back();</script>";
	}
    
}
}else{
    echo "<script>alert('Please Check Sponser ID');
		               location.href='index.php';</script>";
}


?>