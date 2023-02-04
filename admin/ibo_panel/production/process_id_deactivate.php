<?php
 include "config.php";

 //////////////////////////////////////////////for _deactivaate
     $d_id=$_GET[d_id];
    
   
     if($_GET[status]=="deactivate")
     {
        
        $instq="UPDATE `distributor` SET `id_active` = 'N' WHERE `distributor`.`d_id` = '$d_id';";
     }elseif($_GET[status]=="activate")
     {
        
         $instq="UPDATE `distributor` SET `id_active` = 'Y' WHERE `distributor`.`d_id` = '$d_id';";
     }


  if($con->query($instq) === TRUE)
		{
			echo "<script>alert('ID successfully deactivated');location.href='d_detail.php?d_id=".$d_id."';</script>";
		}
	 	else
		{
		 	echo "<script>alert('Query failed to change status please try again');location.href='d_detail.php?d_id=".$d_id."';
		 	</script> ";
	 	}
     
 ?>