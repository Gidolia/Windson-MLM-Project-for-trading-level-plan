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
<link rel="icon" href="../../small_logo.jpg" type="image/ico" />
    <title>Wind Son Group </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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
                <h3>Withdrawl Requests</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>




            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Withdrawl Request</h2>
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
                          <th>Request ID</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Withdrawal Balance</th>
                          <th>Withdrawal Amount</th>
                          <th>Date / Time</th>
                          <th>Admin Charge 10%</th>
                          <th>Trading a/c 5%</th>
                          <th>Amount Pay</th>
                          <th>Enter TXN ID</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                            
                                $e="SELECT * FROM `withdrawal_request` WHERE `status`='N'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                $fv="SELECT * FROM `distributor` WHERE `d_id`='$R[d_id]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                
                                ?>
                                    <tr>
                                        <td> <?php echo $R['wr_id']; ?></td>
                                <td>
                                    <?php echo $R['d_id']; ?>
                                </td>
                                <td>
                                  <?php echo $ssss['name'];?>
                                </td>
                                <td>
                                    <?php echo $ssss['withdrawal_wallet']; ?>
                                </td>
                                <td>
                                    <?php echo $R['amount']; ?>
                                </td>
                                <td>
                                    <?php echo $R['date']." / ".$R['time']; ?>
                                </td>
                                <td>
                                    <?php echo $R['amount']*10/100; ?>
                                </td>
                                <td>
                                    <?php echo $R['amount']*5/100; ?>
                                </td>
                                <td>
                                    <b><?php 
                                    $a=$R['amount']*10/100;
                                    $b=$R['amount']*5/100;
                                    echo $R['amount']-$a-$b; ?></b>
                                </td>
                                <form method="post">
                                <td>
                                <input type="text" class="form-control" name="txn_id">
                                <input type="hidden" name="wr_id" value="<?php echo $R['wr_id']; ?>">
                                <input type="hidden" name="d_id" value="<?php echo $R['d_id']; ?>">
                                <input type="hidden" name="amount" value="<?php echo $R['amount']; ?>">
                                </td>
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
                         $amt=$cdcdc[withdrawal_wallet]-$_POST[amount];
                         $tra=$_POST[amount]*5/100;
                         $admin=$_POST[amount]*10/100;
                         $amt_paid=$_POST[amount]-$tra-$admin;
                         $tra_bal=$cdcdc[trading_wallet]+$tra;
                       $sql="UPDATE `withdrawal_request` SET `a_clear_txn_id` = '$_POST[txn_id]' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `status` = 'Y' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `a_clear_date` = '$date' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `a_clear_time` = '$time' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$amt' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                       
                       $sql .="INSERT INTO `trading_wallet` (`tw_id`, `d_id`, `date`, `time`, `type`, `amount`) VALUES (NULL, '$_POST[d_id]', '$date', '$time', '+', '$tra');";
                       
                       $sql .="UPDATE `withdrawal_request` SET `amt_paid` = '$amt_paid' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `admin_charge` = '$admin' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `trading_walley` = '$tra' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `distributor` SET `trading_wallet` = '$tra_bal' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                       
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
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
