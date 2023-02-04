<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../../database_connect.php";
session_start();
    $que="SELECT * FROM `distributor` WHERE `d_id`='$_SESSION[d_id]' AND `password`='$_SESSION[d_password]'";
    $res=$con->query($que);
		  if ($res->num_rows != 1)
		  {
			  
			    echo "<script>location.href='/';</script>";
		  }
		  else
			 
			  include("class.php");
			$d_detail=mysqli_fetch_assoc($res);
			
			if($d_detail[activate1]=='N' && $d_detail[activate2]=='N')
			{
			    
			    $date1=date_create($d_detail[id_creation_date]);
                $date2=date_create($date);
                $diff=date_diff($date1,$date2);
                $fd=$diff->format("%R%a");
                if($fd>=30)
                {
                    session_destroy();
                    echo "<script>alert('Your ID is Blocked'); location.href='login.php'</script>";
                }
			    
			    
			}
    
?>