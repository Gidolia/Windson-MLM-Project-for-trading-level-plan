<?php include "config.php";
if(isset($_POST[note_submit1]))
{
    $sql="UPDATE `distributor` SET `acc_1_note` = '$_POST[note1]' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
    if($con->query($sql)===TRUE)
    {
        echo "<script>location.href='d_detail.php?d_id=$_POST[d_id]';</script>";
    }
    
}
if(isset($_POST[note_submit2]))
{
    $sql="UPDATE `distributor` SET `acc_2_note` = '$_POST[note2]' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
    if($con->query($sql)===TRUE)
    {
        echo "<script>location.href='d_detail.php?d_id=$_POST[d_id]';</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail | IBO List</title>

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
                <h3>IBO Detail</h3>
              </div>
            </div>

            <div class="clearfix"></div>




            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>IBO Detail</h2>
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
                            <th>sr no</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>mobile</th>
                          <th>password</th>
                          <th>city</th>
                          <th>state</th>
                          <th>Brokerage Amount</th>
                          <th>Status</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                            
                                $e="SELECT * FROM `distributor` WHERE `d_id`='$_GET[d_id]'";
                                $d=$con->query($e);
                                $au=1;
                                $R=mysqli_fetch_assoc($d); ?>
                                    <tr>
                                    <td><?php echo $au; ?></td>
                                    <td>
                                    <?php echo "WG".$R["d_id"]; ?>
                                </td>
                                <td>
                                    <?php echo $R['name'];?>
                                </td>
                                <td>
                                    <?php echo $R["mobile"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["password"]; ?>
                                </td>
                                <td><?php echo $R["city"]; ?></td>
                                <td><?php echo $R["state"]; ?></td>
                                
                                <td><form method="get" action="process_brokerage.php">
                                    <input type="number" class="form-control" name="brokerage" min="0" required>
                                
                                <input type="hidden" name="d_id" value="<?php echo $_GET[d_id];?>">
                                
                                <input type="submit" class="btn btn-success" value="Brokerage" name="brokerage_submit"></form></td>
                                <td>
                                  <?php   if($R[activate1]=='Y')
                                        { ?> </a> <?php echo "<button type='button' class='btn btn-success'>1</button>"; }
                                    else {?> <button type="button" class="btn btn-danger">1</button> 
                                    <?php    
                                    } 
                                    
                                   if($R[activate2]=='Y'){ echo "<button type='button' class='btn btn-success'>2</button>";} 
                                    else { ?><button type="button" class="btn btn-danger">2</button> 
                                    <?php } ?></td>
                                    
                                </tr>
                                <tr>
                                	<th>Account 1</th><td><?php 
                    
                                if($R[acc_open1]!='Y')
                                {?>
                                <a href="process_acc_open_update.php?acc=1&d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Open Account 1</button></a>
                                <?php }
                                else{ ?> <button type="button" class="btn btn-success">Account 1 Opened</button> <?php }
                                ?></td><td>
                                	<?php   if($R[activate1]=='Y')
                                        { ?> </a> <?php echo "<button type='button' class='btn btn-success'>Trade Completed 1</button>"; }
                                    else {?><a href="process_activate1.php?d_id=<?php echo $R[d_id];?>"> <button type="button" class="btn btn-danger">Complete Trade and active 1 account</button> </a> 
                                    <?php    
                                    } 
															?>
                                </td>
                                <td><form method="post">Note :: <textarea name="note1"><?php echo $R[acc_1_note];?></textarea><input type="hidden" name="d_id" value="<?php echo $_GET[d_id];?>" ><input type="submit" name="note_submit1"></form></td>
                                </tr>
                                <tr>
                                	<th>Account 2</th><td><?php 
                    
                                if($R[acc_open2]!='Y')
                                {?>
                               <a href="process_acc_open_update.php?acc=2&d_id=<?php echo $R[d_id];?>"> <button type='button' class='btn btn-danger'>Open Account 2</button></a>
                                <?php }
                                else{ ?> <button type="button" class="btn btn-success">Account 2 Opened</button> <?php }
                                ?></td><td>
                                	<?php   if($R[activate2]=='Y')
                                        { ?> </a> <?php echo "<button type='button' class='btn btn-success'>Trade Completed 2 </button>"; }
                                    else {?><a href="process_activate2.php?d_id=<?php echo $R[d_id];?>"> <button type="button" class="btn btn-danger">Complete Trade and active 2 account</button> </a> 
                                    <?php    
                                    } 
															?>
                                </td>
                                <td><form method="post">Note :: <textarea name="note2"><?php echo $R[acc_2_note];?></textarea><input type="hidden" name="d_id" value="<?php echo $_GET[d_id];?>" ><input type="submit" name="note_submit2"></form></td>
                                </tr>
                                
                                
                                <?php $au++;     
                                
                                $sccd="SELECT * FROM `autopool1` WHERE `d_id`='$_GET[d_id]';";
                                 $xz=$con->query($sccd);
                                    if($xz->num_rows == 0)
                                    {
                                ?>
                                <tr>
                                    <td>
                                        <?php 
                                        $edf="SELECT * FROM `distributor` WHERE `s_id`='$_GET[d_id]'";
                                        $efa="SELECT * FROM `autopool_entry_request` WHERE `card`='white' and `status`='N'";
                                        $asf=$con->query($efa);
                                        $asdg=$con->query($edf);
                                        if($asdg->num_rows>=5)
                                        {
                                        if($asf->num_rows>0)
                                        {
                                        ?>
                                        <a href="process_autopool_entry_yellow_green_card.php?card=2&d_id=<?php echo $_GET[d_id];?>"><button type='button' class='btn btn-success'>Auto Pool Entry White Card</button></a></td>
                                        <?php }} ?>
                                    <td>
                                        <?php
                                        $edd="SELECT * FROM `distributor` WHERE `s_id`='$_GET[d_id]'";
                                        $e="SELECT * FROM `autopool_entry_request` WHERE `card`='yellow' and `status`='N'";
                                        $as=$con->query($e);
                                        $asd=$con->query($edd);
                                        if($asd->num_rows>=3)
                                        {
                                        if($as->num_rows>0)
                                        {
                                        ?>
                                        
                                        <a href="process_autopool_entry_yellow_green_card.php?card=1&d_id=<?php echo $_GET[d_id];?>"><button type='button' class='btn btn-warning'>Auto Pool Entry Yellow Card</button></a>
                                        <?php }}?></td>
                                    <td>
                                        <?php 
                                        $ed="SELECT * FROM `distributor` WHERE `s_id`='$_GET[d_id]'";
                                        $ef="SELECT * FROM `autopool_entry_request` WHERE `card`='green' and `status`='N'";
                                        $as=$con->query($ef);
                                        $asd=$con->query($ed);
                                        if($asd->num_rows>=0)
                                        {
                                        if($as->num_rows>0)
                                        {
                                        ?>
                                        <a href="process_autopool_entry_yellow_green_card.php?card=2&d_id=<?php echo $_GET[d_id];?>"><button type='button' class='btn btn-success'>Auto Pool Entry Green Card</button></a></td>
                                        <?php }} ?>
                                </tr>
                           <?php }  ?>
                      </tbody>
                    </table>
                    
                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                    <h2>ID Activate/Deactivate </h2>
                     <?php 
                    
                                if($R[id_active]!='N')
                                {?>
                                <a href="process_id_deactivate.php?status=deactivate&d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Deactivate ID</button></a>
                                <?php }
                                else{ ?> <a href="process_id_deactivate.php?status=activate&d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-success'>Activate ID</button></a> <?php }
                                ?>
                                <br>&nbsp;<br>&nbsp;<br>&nbsp;
                                <h2>Edit Distributor Profile </h2>
                    <a href="process_edit_profile.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-success'>Edit </button></a>


                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                    <h2>Aadhar Pan Bank Details</h2>
                    
                    <table id="datatable" class="table table-striped table-bordered">
                        
                    <?php $a="SELECT * FROM `kyc_adhar` WHERE `d_id`='$_GET[d_id]' and `status`='c'";
                          $s=$con->query($a);
                          $d=mysqli_fetch_assoc($s)?> 
                        <tr>
                            <th>Aadhar</th>
                            <td><?php if($s->num_rows==0){ echo "The Associate KYC has not been approved";} 
                                else{?> <a href="../../../ibo_panel/production/adhar_card_img/<?php echo $_GET[d_id];?>f.jpg"  target="_blank">Click here to view adhar card front image</a><br><a href="../../../ibo_panel/production/adhar_card_img/<?php echo $_GET[d_id];?>b.jpg"  target="_blank">Click here to view adhar card back image</a><?php } ?></td>
                                
                          <td><?php if($s->num_rows!=0){ ?><a href="kyc_adhar.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Reject</button></a><?php } ?></td>
                          
                          
                          
                        </tr>
                        <?php $b="SELECT * FROM `kyc_pan` WHERE `d_id`='$_GET[d_id]' and `status`='c'";
                          $t=$con->query($b);
                          $e=mysqli_fetch_assoc($t)?>
                        <tr>
                            <th>Pan</th>
                            <td><?php if($t->num_rows==0){ echo "The Associate KYC has not been approved";} 
                                else{?> <a href="../../../ibo_panel/production/pan_card_img/<?php echo $_GET[d_id];?>.jpg"  target="_blank">Click here to view adhar card front image</a><?php } ?></td>
                          <td><?php if($t->num_rows!=0){ ?><a href="kyc_pan.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Reject</button></a><?php } ?></td>
                          
                          
                          
                        </tr>
                        
                        <?php $c="SELECT * FROM `kyc_bank` WHERE `d_id`='$_GET[d_id]' and `status`='c'";
                          $u=$con->query($c);
                          $f=mysqli_fetch_assoc($u)?>
                        <tr>
                            <th>Bank</th>
                            <td><?php if($u->num_rows==0){ echo "The Associate KYC has not been approved";} 
                                else{?> <a href="../../../ibo_panel/production/bank_img/<?php echo $_GET[d_id];?>.jpg" target="_blank">Click here to view Bank Passbook image</a><?php } ?></td>
                          <td><?php if($u->num_rows!=0){ ?><a href="kyc_bank.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Reject</button></a><?php } ?></td>
                          
                          
                          
                        </tr>
                      


                      
                     </table>  
                  
                    
                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                    <h2>Screen Shot</h2>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>sr no</th>
                          <th>date / time</th>
                          
                          <th>img link</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                          <?php
                          $asfa="SELECT * FROM `trade_screen_shot` WHERE `d_id`='$_GET[d_id]'";
                          $sdf=$con->query($asfa);
                          while($df=$sdf->fetch_assoc())
                          {
                          ?>
                     <tr>
                         <td><?php echo $df[tss_id];?></td>
                         <td><?php echo $df[date]." / ".$df[time];?></td>
                         <td><a href="../../../ibo_panel/production/screenshot/<?php echo $df[tss_id];?>.jpg" target="_blank">Click here</a></td>
                     </tr>
                     <?php }?>
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
