<?php include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wind Son Group | IBO List</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <?php include "include/sidebar.php";?>
            
          </div>
        </div>

        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Auto pool Uncleared amount</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>




            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Autopool uncleared amount</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>apw_id</th>
                          <th>Name (D ID)</th>
                          <th>Date / Time</th>
                          <th>Level</th>
                          <th>Autopool No</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th>Clear Request</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                            
                                $e="SELECT * FROM `auto_pool_wallet` WHERE `status`='N'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                $fv="SELECT * FROM `distributor` WHERE `d_id`='$R[d_id]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                
                                ?>
                                    <tr>
                                        <td> <?php echo $R['apw_id']; ?></td>
                                
                                <td>
                                  <?php echo $ssss['name']."(".$R['d_id'].")";?>
                                </td>
                                <td>
                                    <?php echo $R['date']." / ".$R['time']; ?>
                                </td>
                                <td> <?php echo $R['level']; ?></td>
                                <td> <?php echo $R['autopool_no']; ?></td>
                                <td> <?php echo $R['amount']; ?></td>
                                <td> <?php echo $R['status']; ?></td>
                                
                                <form method="post">
                                
                                
                                <input type="hidden" name="apw_id" value="<?php echo $R['apw_id']; ?>">
                                <input type="hidden" name="d_id" value="<?php echo $R['d_id']; ?>">
                                <input type="hidden" name="amount" value="<?php echo $R['amount']; ?>">
                                
                                <td>
                                <input type="submit" name="clear_submit" class="btn btn-success">
                                </td>
                                </form>
                                <?php 
                                } ?>
                      </tbody>
                    </table>
                     
                     <?php 
                     if(isset($_POST[clear_submit]))
                     {
                         $csc="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                         $dscsdf=$con->query($csc);
                         $cdcdc=mysqli_fetch_assoc($dscsdf);
                         $amt=$cdcdc[withdrawal_wallet]+$_POST[amount];
                         
                         
                       $sql="UPDATE `auto_pool_wallet` SET `status` = 'Y' WHERE `auto_pool_wallet`.`apw_id` = '$_POST[apw_id]';";
                      
                       $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$amt' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                       $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$_POST[d_id]', '$date', '$time', '+', '$_POST[amount]', 'Auto pool income');";
                        if ($con->multi_query($sql) === TRUE) {
                          echo "<script>alert('Withdrawal amount Cleared successfully');
                          location.href='withdrawal_request.php'</script>";
                        } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                     }
                     ?>
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            © 2020 Windson Group. All Rights Reserved</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
