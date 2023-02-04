<?php include "database_connect.php"; 


if(isset($_POST[contact_submit]))
{
    
    $sqlkj="SELECT MAX(c_id) as max FROM `contactus`";
  		$dfgh=$con->query($sqlkj);
		$fdbv=mysqli_fetch_array($dfgh);
		$c_id=$fdbv[max]+1;
    //echo $d_id;
    
    $sql="INSERT INTO `contactus` (`c_id`, `name`, `mobile`, `email`, `message`, `date`, `time`) VALUES ($c_id, '$_POST[name]', '$_POST[mobile]', '$_POST[email]', '$_POST[message]', '$date', '$time');";
    
  if($con->query($sql) === TRUE)
		{
			
				echo "<script>alert('Your Message has been submitted');
		               location.href='contact.php';</script>";
		}
	 	else
		{
		 		echo "<script>alert('Query failed please try again');
		               location.href='contact.php';</script>";
	 	}
    
}


?>