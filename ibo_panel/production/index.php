<?php include "config.php";
include "function.php";
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

    <title>WINDSON GROUP || Index</title>

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
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    

	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include "include/sidebar.php";?>

        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <a href="withdrawl_wallet.php"><div class="tile-stats">
                  <div class="icon"><i class="fa fa-money"></i></div>
                  <div class="count"><i class="fa fa-inr"></i> <?php echo $d_detail[withdrawal_wallet]+0;?></div>
                  <h3>Withdrable Balance</h3>
                </div></a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <a href="level_commission.php"> <div class="count"><i class="fa fa-inr"></i> <?php echo $d_detail[a1_wallet]+$d_detail[a2_wallet]+0;?> </div>
                  <h3>Current Wallet Balance</h3>
                </div></a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  <a href="level_list1.php">
                  <div class="count"><i class="fa fa-user"></i> <?php echo direct_sponser($_SESSION[d_id]);?> </div>
                  <h3>MY Direct Sponser</h3>
                </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <a href="downline_list.php"> <div class="count"><i class="fa fa-user"></i> <?php echo downline_counter($_SESSION[d_id]);?> </div>
                  <h3>My Total Team</h3>
                </div></a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <a href="downline_list.php?tj=1"> <div class="count"><i class="fa fa-user"></i> <?php echo downline_counter_date($_SESSION[d_id]);?> </div>
                  <h3>Today Joined Member</h3>
                </div></a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <a href="level_commission.php"> <div class="count"><i class="fa fa-user"></i> <?php echo total_income($_SESSION[d_id]);?> </div>
                  <h3>Total Earning</h3>
                </div></a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <a href="trading_wallet.php"> <div class="count"><i class="fa fa-user"></i> <?php echo $d_detail[trading_wallet];?> </div>
                  <h3>Trading Fund</h3>
                </div></a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <a href="demat_income.php?l=1"> <div class="count"><i class="fa fa-user"></i> <?php echo $d_detail[a1_wallet];?> </div>
                  <h3>Demat Acc 1</h3>
                </div></a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <a href="demat_income.php?l=2"> <div class="count"><i class="fa fa-user"></i> <?php echo $d_detail[a2_wallet];?> </div>
                  <h3>Demat Acc 2</h3>
                </div></a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <a href="today_income.php"> <div class="count"><i class="fa fa-user"></i>  </div>
                  <h3>Today Income</h3>
                </div></a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <div class="count"><i class="fa fa-user"></i> <?php echo total_income_till_date($_SESSION[d_id]);?> </div>
                  <h3>Total Released Income</h3>
                </div>
              </div>
              
              
              
              
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Network Activities </h3>
                  </div>
                  
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <h3>Link</h3>
                      <table class="table table-striped table-bordere jambo_table bulk_action">
                        
                          <tr>
                            <th class="column-title">For free ID activation open your free demat account 1</th>
                            <td class=" ">
                                <a href="acc_open_option.php?l=1"><button type='button' class='btn btn-primary' >Click Here</button></a>
                
                                
                                <?php 
                    
                                if($d_detail[activate1]!='Y')
                                {?>
                                <button type='button' class='btn btn-danger'>ACC Not Active</button>
                                <?php }
                                else{ ?> <button type="button" class="btn btn-success">ACC Active</button> <?php }
                                ?>
                                <a href="acc_status.php?l=1"><button type='button' class='btn btn-primary'>ACC Status</button></a>
                                </td>
                          </tr>
                          
                          <tr>
                              <th>For free ID activation open your free demat account 2</th>
                              <td><a href="acc_open_option.php?l=2"><button type='button' class='btn btn-primary'>Click Here</button></a>
                
                                
                                <?php 
                    
                                if($d_detail[activate2]!='Y')
                                {?>
                                <button type='button' class='btn btn-danger'>ACC Not Active</button>
                                <?php }
                                else{ ?> <button type="button" class="btn btn-success">ACC Active</button> <?php }
                                ?>
                                <a href="acc_status.php?l=2"><button type='button' class='btn btn-primary'>ACC Status</button></a>
                                </td>
                          </tr>
                          
                          
                        
                        
                            
                         
                       
                      </table>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                 

                  
                     
                      <table class="table">
                        
                        <tr>
                          <th>Referal Link</th>
                          <td><textarea rows="5" cols="10" id="myInput" readonly>http://windsongroup.space/index.php?d_id=<?php echo $_SESSION[d_id];?> </textarea> <button onclick="myFunction()">Copy text</button></td>
                        
                        </tr>
                        
                        
                      
                    </table>
                    
                 
                </div>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          
            
          
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
	
  </body>
</html>
