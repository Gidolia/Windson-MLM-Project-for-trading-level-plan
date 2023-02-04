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
                <h3>Downline List</h3>
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
                    <h2>downline list</h2>
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
                             if(isset($_GET[tj]))
{
    $temp=array();
        
        $m=0;
        $g="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            if($d[id_creation_date]==$date)
            {
            $temp[]=$d[d_id];
            }
            
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                if($d2[id_creation_date]==$date)
            {
            $temp[]=$d2[d_id];
            }
                
                
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    if($d3[id_creation_date]==$date)
                    {
                        $temp[]=$d3[d_id];
                    }
                    
                    
                    
                    $g4="SELECT * FROM `distributor` WHERE `s_id`='$d3[d_id]'";
                    $que4=$con->query($g4);
                    while($d4=$que4->fetch_assoc())
                    {
                        if($d4[id_creation_date]==$date)
                         {
                        $temp[]=$d4[d_id];
                        }
                        
                       
                        $g5="SELECT * FROM `distributor` WHERE `s_id`='$d4[d_id]'";
                        $que5=$con->query($g5);
                        while($d5=$que5->fetch_assoc())
                        {
                           if($d5[id_creation_date]==$date)
                            {
                                $temp[]=$d5[d_id];
                            }
                           
                           
                            $g6="SELECT * FROM `distributor` WHERE `s_id`='$d5[d_id]'";
                            $que6=$con->query($g6);
                            while($d6=$que6->fetch_assoc())
                            {
                                if($d6[id_creation_date]==$date)
                                {
                                    $temp[]=$d6[d_id];
                                }
                                $g7="SELECT * FROM `distributor` WHERE `s_id`='$d6[d_id]'";
                                $que7=$con->query($g7);
                                while($d7=$que7->fetch_assoc())
                                {
                                    if($d7[id_creation_date]==$date)
                                    {
                                        $temp[]=$d7[d_id];
                                    }
                                    
                                    
                                    $g8="SELECT * FROM `distributor` WHERE `s_id`='$d7[d_id]'";
                                    $que8=$con->query($g8);
                                    while($d8=$que8->fetch_assoc())
                                    {
                                        if($d8[id_creation_date]==$date)
                                        {
                                            $temp[]=$d8[d_id];
                                        }
                                        
                                        $g9="SELECT * FROM `distributor` WHERE `s_id`='$d8[d_id]'";
                                        $que9=$con->query($g9);
                                        while($d9=$que9->fetch_assoc())
                                        {
                                            if($d9[id_creation_date]==$date)
                                            {
                                                $temp[]=$d9[d_id];
                                            }
                                        
                                                
                                            $g10="SELECT * FROM `distributor` WHERE `s_id`='$d9[d_id]'";
                                            $que10=$con->query($g10);
                                            while($d10=$que10->fetch_assoc())
                                            {
                                                if($d10[id_creation_date]==$date)
                                                {
                                                        $temp[]=$d10[d_id];
                                                }
                                                
                                               
                                                $g11="SELECT * FROM `distributor` WHERE `s_id`='$d10[d_id]'";
                                            $que11=$con->query($g11);
                                            while($d11=$que11->fetch_assoc())
                                            {
                                                if($d11[id_creation_date]==$date)
                                                {
                                                    $temp[]=$d11[d_id];
                                                }
                                                
                                               
                                                $m++;
                                            }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
}
else{
        $temp=array();
        
        $m=0;
        $g="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $temp[]=$d[d_id];
            
            
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                $temp[]=$d2[d_id];
                
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    $temp[]=$d3[d_id];
                    
                    
                    $g4="SELECT * FROM `distributor` WHERE `s_id`='$d3[d_id]'";
                    $que4=$con->query($g4);
                    while($d4=$que4->fetch_assoc())
                    {
                        $temp[]=$d4[d_id];
                       
                        $g5="SELECT * FROM `distributor` WHERE `s_id`='$d4[d_id]'";
                        $que5=$con->query($g5);
                        while($d5=$que5->fetch_assoc())
                        {
                            $temp[]=$d5[d_id];
                           
                            $g6="SELECT * FROM `distributor` WHERE `s_id`='$d5[d_id]'";
                            $que6=$con->query($g6);
                            while($d6=$que6->fetch_assoc())
                            {
                                $temp[]=$d6[d_id];
                               
                                $g7="SELECT * FROM `distributor` WHERE `s_id`='$d6[d_id]'";
                                $que7=$con->query($g7);
                                while($d7=$que7->fetch_assoc())
                                {
                                    $temp[]=$d7[d_id];
                                   
                                    
                                    $g8="SELECT * FROM `distributor` WHERE `s_id`='$d7[d_id]'";
                                    $que8=$con->query($g8);
                                    while($d8=$que8->fetch_assoc())
                                    {
                                        $temp[]=$d8[d_id];
                                        
                                        $g9="SELECT * FROM `distributor` WHERE `s_id`='$d8[d_id]'";
                                        $que9=$con->query($g9);
                                        while($d9=$que9->fetch_assoc())
                                        {
                                            $temp[]=$d9[d_id];
                                                
                                            $g10="SELECT * FROM `distributor` WHERE `s_id`='$d0[d_id]'";
                                            $que10=$con->query($g10);
                                            while($d10=$que10->fetch_assoc())
                                            {
                                                $temp[]=$d10[d_id];
                                               
                                                $g11="SELECT * FROM `distributor` WHERE `s_id`='$d10[d_id]'";
                                            $que11=$con->query($g11);
                                            while($d11=$que11->fetch_assoc())
                                            {
                                                $temp[]=$d11[d_id];
                                               
                                                $m++;
                                            }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
}
        ?>
        <div class="card-box table-responsive">
        <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>Sr. no.</th><th>D ID</th><th>Sponsor</th><th>ID Creation date/time</th><th>Name</th><th>ID Activate Status</th><th>Demat Activate Status</th></tr></thead>
            <?php
            $a=0;
            for($x=0;$x<count($temp);$x++)
            { $a++;
            $scv="SELECT * FROM `distributor` WHERE `d_id`='$temp[$x]';";
            
            $dcdf=$con->query($scv);
            $gf=mysqli_fetch_assoc($dcdf);
            $scv1="SELECT * FROM `distributor` WHERE `d_id`='$gf[s_id]';";
            
            $dcdf1=$con->query($scv1);
            $gf1=mysqli_fetch_assoc($dcdf1);
            
            ?>
            <tr>
                <td><?php echo $a;?></td><td><?php echo "wg".$temp[$x];?></td><td><?php echo  "wg".$gf[s_id]."(".$gf1[name].")"; ?></td><td><?php echo $gf["id_creation_date"]." / ". $gf["id_creation_time"]; ?></td><td><?php echo $gf[name];?></td><td><?php echo $gf[id_active];?></td>
                <td>
                <?php  if($gf[activate1]=="Y"){ ?> <button type="button" class="btn btn-success">1</button> <?php }
                        else{  echo "<button type='button' class='btn btn-danger'>1</button>";
                          }
                          if($gf[activate2]=="Y"){ ?> <button type="button" class="btn btn-success">2</button> <?php }
                        else{  echo "<button type='button' class='btn btn-danger'>2</button>";
                          }?>
                </td>
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
