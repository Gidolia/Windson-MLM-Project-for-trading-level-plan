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

    <title>Windson Group</title>

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
                <h3>IBO Commission</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>




            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>IBO List</h2>
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
                            <th>TXN ID</th>
                          <th>ID</th>
                          <th>Date</th>
                          <th>Time</th></th>
                          <th>Amount</th>
                          <th>Type</th>
                          <th>Balance</th>
                          <th>Activated D_ID</th>
                          <th>Activate for</th>
                          
                          
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                                $au=1;
                                $e="SELECT * FROM `activate1_wallet_history`";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){
                                if($R["d_id"]!="")
                                {
                                ?>
                                    <tr>
                                        <td> <?php echo $R["a1wh_id"]; ?></td>
                                <td>
                                    <?php echo $R["d_id"]; ?>
                                </td>
                                <td>
                                   <?php echo $R["date"];?></a>
                                </td>
                                <td>
                                   <?php echo $R["time"];?></a>
                                </td>
                                <td>
                                   <?php echo $R["amount"];?></a>
                                </td>
                                <td>
                                    <?php echo $R["type"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["a_bal"]; ?>
                                </td>
                                <td><?php echo $R["activated_d_id_commission"]; ?></td>
                                <td><?php echo $R["activate_for"]; ?></td>
                                     
                               <?php  }} ?>
                      </tbody>
                    </table>
                     
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
