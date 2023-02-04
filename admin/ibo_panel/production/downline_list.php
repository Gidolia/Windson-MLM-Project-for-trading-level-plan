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

    <title>Wind Son Group | Distributor List</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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
                <h3>Distributor LIST</h3>
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
                    <h2>Distributor List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <table id="datatable-buttons" class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                            <th>sr no</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>S ID</th>
                          <th>mobile</th>
                          <th>password</th>
                          <th>date/time</th>
                          <th>Withdrawal Wallet</th>
                          <th>ID Activate Status</th>
                          <th>city</th>
                          <th>state</th>
                          <th>Status</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                                $au=1;
                                $e="SELECT * FROM `distributor`";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ ?>
                                    <tr>
                                        <td> <?php echo $au ?></td>
                                <td>
                                    <?php echo "WG".$R["d_id"]; ?>
                                </td>
                                <td>
                                  <a href="d_detail.php?d_id=<?php echo $R['d_id'];?>">  <?php echo $R['name'];?></a>
                                </td>
                                <td>
                                    <?php echo "WG".$R["s_id"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["mobile"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["password"]; ?>
                                </td>
                                <td><?php echo $R["id_creation_date"]." / ". $R["id_creation_time"]; ?></td>
                                <td><?php echo $R["withdrawal_wallet"]; ?></td>
                                <td>
                                    <?php echo $R["id_active"]; ?>
                                </td>
                                <td><?php echo $R["city"]; ?></td>
                                <td><?php echo $R["state"]; ?></td>
                                <td><?php if($R[activate1]=='Y') {echo "<button type='button' class='btn btn-success'>1</button>";}
                                    else {?> <button type="button" class="btn btn-danger">1</button>
                                    <?php    
                                    } 
                                    
                                   if($R[activate2]=='Y'){ echo "<button type='button' class='btn btn-success'>2</button>";} 
                                    else { ?> <button type="button" class="btn btn-danger">2</button>
                                    <?php } ?></td>
                                </tr>
                                <?php $au++;     
                                } ?>
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
            © 2020 WIndson Group. All Rights Reserved</a>
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
