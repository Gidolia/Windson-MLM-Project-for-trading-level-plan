<?php
include "database_connect.php";
function isNumber($c) {
    return preg_match('/[0-9]/', $c);
}
if(isset($_POST[f_d_submit]))
{
    $string=$_POST[d_id];
   
$chars = '';
$d_id = '';
for ($index=0;$index<strlen($string);$index++) {
    if(isNumber($string[$index]))
    {
        $d_id .= $string[$index];
    }
    else {
        $chars .= $string[$index];}
    
}
    $sel="SELECT * FROM `distributor` WHERE `d_id`='$d_id'";
		  $res=$con->query($sel);
		  if ($res->num_rows > 0)
		  {
		      $sxs=mysqli_fetch_assoc($res);
		      $to = $sxs[email]; // note the comma

// Subject
$subject = 'Windson Group Login Detail';

// Message
$message = '
<html>
<head>
  <title>Windson Group</title>
</head>
<body>
  <p>Password Recovery</p>
  <table>
    <tr>
      <td>Your Login ID</td><th>wg'.$sxs[d_id].'</th>
    </tr>
    <tr>
      <td>Your Login Password</td><th>'.$sxs[password].'</th>
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
		               echo "<script>alert('Your Password Has Been sended to your Register mail ID');
    			location.href='index.php';</script>";
		  }
		  else{
		      echo "<script>alert('ID Does Not exist');
    			location.href='index.php';</script>";
		  }
}
if(isset($_POST[sub_login]))
{
    session_start();
  
    $string=$_POST[id];
   
$chars = '';
$d_id = '';
for ($index=0;$index<strlen($string);$index++) {
    if(isNumber($string[$index]))
    {
        $d_id .= $string[$index];
    }
    else {
        $chars .= $string[$index];}
    
}
if($chars=="wg" || $chars=="WG")
{
//echo $_POST['password'];
    $sel="SELECT * FROM `distributor` WHERE `d_id`='$d_id' AND `password`='$_POST[password]'";
		  $res=$con->query($sel);
		  if ($res->num_rows > 0)
		  {
		      $dddd=mysqli_fetch_assoc($res);
		      if($dddd[id_active]=='N')
		      {
		          echo "<script>alert('Your ID is Blocked Please Contact Admin');
    			location.href='index.php';</script>";
		      }
		      else{
			    //echo $d_id; 
               $_SESSION[d_id]=$d_id; 
			  $_SESSION['d_password']=$_POST['password'];
		      }
			  echo "<script>location.href='ibo_panel/production/index.php';</script>";
			 
		  }
		  else{
			  	echo "<script>alert('Invalid user name or Password');
    			location.href='index.php';</script>";
		  }
}else{
			  	echo "<script>alert('Invalid user name or Password');
    			location.href='index.php';</script>";
		  }
}

?>