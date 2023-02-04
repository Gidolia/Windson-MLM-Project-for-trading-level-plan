<?php include "../database_connect.php"; 


if(isset($_POST[reg_submit]))
{
    
    $sqlkj="SELECT MAX(d_id) as max FROM `distributor`";
  		$dfgh=$con->query($sqlkj);
		$fdbv=mysqli_fetch_array($dfgh);
		$d_id=$fdbv[max]+1;
    //echo $d_id;
    
    $sql="INSERT INTO `distributor` (`d_id`, `s_id`, `name`, `email`, `mobile`, `password`, `city`, `state`, `addreass`, `adhar_card_no`, `pan_card`, `acc_no`, `ifsc_code`, `bank_name`, `activate1`, `activate2`, `id_creation_date`, `id_a1_date`, `id_a2_date`) VALUES ('$d_id', '$_POST[s_id]', '$_POST[name]', '$_POST[email]', '$_POST[mobile]', '$_POST[password]', '', '', '', '', '', '', '', '', 'N', 'N', '$date', '', '');";
    
  if($con->query($sql) === TRUE)
		{
			
				echo "<script>
				location.href='success_reg.php?d_id=$d_id&name=$_POST[name]';</script>";
		}
	 	else
		{
		 		echo "<script>alert('Query failed please try again');
		               location.href='index.php';</script>";
	 	}
    
}



?>