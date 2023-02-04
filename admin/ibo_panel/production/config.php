<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../../../database_connect.php";
session_start();
    if ($_SESSION['adminr'] != "123")
		  {
			  
			    echo "<script>location.href='/';</script>";
		  }
		  else
    
   
?>