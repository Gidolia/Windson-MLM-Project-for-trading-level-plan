<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WIND SON GROUP</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


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
                <h3>Upload Trade Screenshot</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Upload Trade Screenshot</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                      
                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Attach Trade Screenshot</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control" name="screen" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          
                          <input type="submit" class="btn btn-success" value="Submit Trade Screenshot" name="screenshot_submit">
                        </div>
                      </div>
                     </form>
                     
                     </div>
                     </div>
                     </div>
                     </div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Trade Screen Shot History</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>ID</th><th>Date</th><th>Time</th><th>File Name</th><th>Status</th></tr></thead>
            <?php
            $a=0;
                                 
            $g="SELECT * FROM `trade_screen_shot` WHERE `d_id`='$_SESSION[d_id]'";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
          
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date];?></td>
                <td><?php echo $d[time];?></td>
                <td><?php echo $d[file_name];?></td>
                
                
                <td><?php echo $d[status];?></td>
            </tr>
            <?php
            }?>
        </table>
        
<?php
 if(isset($_POST[screenshot_submit]))
            {
                //////////////////////////////find max id for file name
             $sqlkj="SELECT MAX(tss_id) as max FROM `trade_screen_shot`";
  		$dfgh=$con->query($sqlkj);
		$fdbv=mysqli_fetch_array($dfgh);
		$tss_id=$fdbv[max]+1;
		
            	
        if(move_uploaded_file($_FILES["screen"]["tmp_name"], "screenshot/".$tss_id.".jpg"))
		{
            echo "Stored in: " . "screenshot/".$fileName;
            
            $dx="INSERT INTO `trade_screen_shot` (`tss_id`, `d_id`, `date`, `time`, `file_name`,`status`) VALUES ('$tss_id', '$_SESSION[d_id]', '$date', '$time', '','N');";
             if($con->query($dx) === TRUE)
		{
			
				 echo "<script>alert('Screenshot Uploaded Successfully');
		location.href='upload_screenshot.php';</script>";
		}
	 	else
		{
		 		echo "<script>alert('Query failed please try again');
		               location.href='upload_screenshot.php';</script>";
	 	}
           
            }
            }
            ?>   
                    </div>
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
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
