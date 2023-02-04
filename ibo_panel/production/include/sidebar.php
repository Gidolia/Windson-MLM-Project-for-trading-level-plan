<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                
             <h2 class="site_title"> WINDSON GROUP</h2>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR3V3u4v1SLzLa_gBhgT2DySjHaCnPQYt5BziDuDD2uA0qDEE3B" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $d_detail[name];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Dashboard </a></li>
                  
                  <li><a><i class="fa fa-sitemap"></i> My Network<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="my_network_tree_view.php">Network Tree</a></li>
                        <li><a href="downline_list.php">Network List</a></li>
                        <li><a href="level.php">Level View</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bank"></i>Autopool Tree View<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="autopool1_tree.php">Autopool Tree 1</a></li>
                        <li><a href="autopool2_tree.php">Autopool Tree 2</a></li>
                        <li><a href="auto_pool3.php">Autopool Tree 3</a></li>
                        
                    </ul>
                  </li>
                  <li><a href="rewards_clear_view.php"><i class="fa fa-money"></i> Rewards</a></li>
                  <li><a href="autopool_entry.php"><i class="fa fa-money"></i> Autopool Entry</a></li>
                   <li><a><i class="fa fa-sitemap"></i> Income <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="level_commission.php"> Level Income</a></li>
                        <li><a href="autopool_income.php"> Autopool Income</a></li>
                        <li><a href="brokerage_level.php">Brokerage Level Income</a></li>
                    </ul>
                    </li>
                   <li><a href="withdrawl_wallet.php"><i class="fa fa-money"></i> Withdrawl Request</a></li>
                   <li><a href="withdrawal_request_history.php"><i class="fa fa-money"></i>Payout History</a></li>
                   <li><a href="advanced_payment.php"><i class="fa fa-money"></i> Advanced Withdrawl</a></li>
                    <li><a href="trading_wallet.php"><i class="fa fa-money"></i> Trading Wallet</a></li>
                    
                   
                   <li><a><i class="fa fa-user"></i>My Profile<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="profile_edit.php">Update Profile</a></li>
                        
                        <li><a href="pass_change.php">Change Password</a></li>
                        <li><a href="kyc.php">KYC</a></li>
                    </ul>
                  </li>
                  <li><a href="upload_screenshot.php"><i class="fa fa-home"></i> Upload trade Screenshot </a></li>
                 </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="log_out.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>