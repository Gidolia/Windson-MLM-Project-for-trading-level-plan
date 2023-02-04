<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../../small_logo.jpg" type="image/ico" />
    <title>WindSon Group</title>

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
                <h3>Auto pool Entry</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Auto pool Entry</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        
                    <?php
                    $aut="SELECT * FROM `autopool1` WHERE `d_id`='$_SESSION[d_id]';";
                    $ed=$con->query($aut);
                    if($ed->num_rows==0)
                    {
                   $sel="SELECT * FROM `autopool_entry_request` WHERE `d_id`='$_SESSION[d_id]'"; 
                   $dds=$con->query($sel);
                   if($dds->num_rows==0)
                   {?>
                 
        <div class="card-box table-responsive">
        <table class="table table-striped table-bordered">
            <tr><thead><th>White Card</th></thead>
            <tbody><td>
                       <?php
                   $edd="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
                   $dds1=$con->query($edd);
                   if($dds1->num_rows>=5)
                   {
                   ?>
                      <a href="process_autopool_entry.php?card=white">  <button type="button" class="btn">APPLY FOR WHITE CARD</button></a>
                    <?php } else{ ?>
                    <button type="button" class="btn" disabled>APPLY FOR WHITE CARD</button>
                    <?php }?>
                   </td>
                   <td>
                     Eligibility: 5 Direct and
25 Member total team
of 30 Member
                   </td></tbody></tr>
            
               <tr>
                   <thead><th>Yellow Card</th></thead>
                   <tbody>
                   <td><?php
                   $edd="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
                   $asd=$con->query($edd);
                   if($asd->num_rows>=5)
                   {
                   ?>
                   <a href="process_autopool_entry.php?card=yellow"><button type="button" class="btn btn-warning">APPLY FOR YELLOW CARD</button></a>
                   <?php } else{ ?>
                   <button type="button" class="btn btn-warning" disabled>APPLY FOR YELLOW CARD</button>
                   <?php }?>
                   </td>
                   <td>Eligibility: 3 Direct and Pay
Rs.300 (Can Pay direct or from
wallet balance )
                   </td>
                  </tbody> 
               </tr> 
                <tr>
                   <thead><th>Green Card</th></thead>
                   <tbody><td><a href="process_autopool_entry.php?card=green"><button type="button" class="btn btn-success">APPLY FOR GREEN CARD</button></a></td>
                   
                   
                   <td>Eligibility: Just Pay Rs.500
(Can Pay direct or from
wallet balance )</td>
                </tbody>
               </tr> 
            
            
        </table>
        
        <?php }
        }?>
        <table class="table table-striped table-bordered" value ="<h2>Autopool Entry Request history</h2>" id="datatable">
            <thead><tr><th>Sr. no.</th><th>Date</th><th>Time</th><th>Card</th><th>Status</th></tr></thead>
            <?php
            $a=0;
                                 
            $g="SELECT * FROM `autopool_entry_request` WHERE `d_id`='$_SESSION[d_id]'";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
          
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date];?></td>
                <td><?php echo $d[time];?></td>
                <td><?php if($d[card]==green){ ?> <button type="button" class="btn btn-success"> <?php  }
                    elseif($d[card]==yellow){ ?> <button type="button" class="btn btn-warning"> <?php  } 
                    elseif($d[card]==white){ ?> <button type="button" class="btn"> <?php  } 
                    ?>
                </td>
                <td><?php echo $d[status];?></td>
            </tr>
            <?php
            }?>
        </table>
        
        
        
        
        
           </div>         
                    
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "include/footer.php";?>
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
