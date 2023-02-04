<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
               
               
                <li class="">
                 <?php 
                    
                                if($d_detail[activate1]=='Y' || $d_detail[activate2]=='Y')
                                {?>
                                <button type="button" class="btn btn-success">ACC Active</button>
                               
                                <?php }
                                else{ ?>  <button type='button' class='btn btn-danger'>ACC Not Active</button> <?php } ?>
                                 
                    
                                
				  </li>
                 <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR3V3u4v1SLzLa_gBhgT2DySjHaCnPQYt5BziDuDD2uA0qDEE3B" alt=""><?php echo $d_detail[name]."(".$d_detail[d_id].")";?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="profile_edit.php">Profile</a></li>
                        <li><a href="kyc.php">KYC</a></li>
                        <li><a href="pass_change.php">Change Password</a></li>
                    <li><a href="log_out.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>