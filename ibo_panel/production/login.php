<?php include "../../database_connect.php";
session_start();
session_destroy();
function isNumber($c) {
    return preg_match('/[0-9]/', $c);
}?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WIND SON GROUP | Login</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="IBO ID" name="id" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                 <input type="submit" name="sub_login" class="btn btn-primary" value="Log in">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Forget Password?
                  <a href="#signup" class="to_register"> Find Password </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> WIND SON GROUP</h1>
                  <p>©2019 All Rights Reserved. WIND SON GROUP || developed by Gidolia Pvt Ltd</p>
                </div>
              </div>
            </form>
          </section>
        </div>

<?php
echo "sdvvfdgv";
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

    $sel="SELECT * FROM `distributor` WHERE `d_id`='$d_id' AND `password`='$_POST[password]'";
		  $res=$con->query($sel);
		  if ($res->num_rows > 0)
		  {
		      
			    //echo $d_id; 
               $_SESSION[d_id]=$d_id; 
			  $_SESSION[d_password]=$_POST[password];
			  echo "<script>location.href='index.php';</script>";
			 
		  }
		  else{
			  	echo "<script>alert('Invalid user name or Password');
    			location.href='login.php';</script>";
		  }
}else{
			  	echo "<script>alert('Invalid user name or Password');
    			location.href='login.php';</script>";
		  }
}

?>



        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post">
              <h1>Forget Password</h1>
              <div>
                <input type="text" name="f_d_id" class="form-control" placeholder="ID" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" name="send_pass" value="Send Password to mobile">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Back to login ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> WIND SON GROUP</h1>
                  <p>©2019 All Rights Reserved. WIND SON GROUP || developed by Gidolia Pvt Ltd</p>
                </div>
                <?php
if(isset($_POST[send_pass]))
{
    $que=mysql_query("SELECT `d_id`, `mobile`, `password` FROM `distributor` WHERE `d_id`=$_POST[f_d_id]")or die("query fail to execute");
    if(mysqli_num_rows($que)!=0)
    {
        $ibp=mysql_fetch_assoc($que);
        $dd='Your Password = '.$ibp[password];
$dd = str_replace(' ', '%20', $dd);
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=INAURA&smstype=TRANS&numbers='.$ibp[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo "<script>alert('Password sended sucessfully to your register mobile number');</script>";
    }
    else{echo "<script>alert('Invalid User ID');
    location.href='login.php';</script>";}
}

?>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
