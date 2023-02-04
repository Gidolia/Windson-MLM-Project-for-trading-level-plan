<!DOCTYPE html>

<?php include "database_connect.php"; ?>
<!-- 

-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>THE WINDSON GROUP</title>
    <meta name="description" content="">
    <meta name="keywords" content="	advisor, analytical, audit, broker, brokerage, business, company, consulting, currency, exchange, finance, financial, insurance, modern, trader">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/images/fav.png"/>
</head>
<body>
<div class="me-main-wraper">
    <!-- top header -->
    <div class="me-top-header">
        <div class="container">
            <div class="me-top-head">
                <div class="me-top-header-left">
                    <ul>
                        <li>Follow Us :</li>
                        <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="me-top-header-right">
                    <ul>
                        <li>
                            <i class="far fa-envelope-open"></i> example@gmail.com</li>
                        <li>
                            <i class="fas fa-mobile-alt"></i> +789-5654-123
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header -->
   <?php include "include/header.php";?>
    <!-- breadcrumb -->
    <div class="me-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <div class="me-breadcrumb-box">
                        <h1>Welcome to Windson Group</h1>
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Contact -->
    
    <div class="me-contact me-padder-top">
        <div class="container">
            <div class="me-contaict-detail">
                <div class="row">
                    
				<div class="col-md-12">
					
					<h2>Name = <?php echo $_GET[name];?></h2>
					<h2>ID No. = wg<?php echo $_GET[d_id];?></h2>
					
					
						
				</div>
				
				</div>
			</div>
		</div>
	</div>
    <!-- Footer -->
    <?php include "include/footer.php";?>
    
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/swiper.min.js"></script>
<script src="assets/js/SmoothScroll.min.js"></script>
<script src="assets/js/ui_range_slider.js"></script>
<script src="assets/js/canvasjs.js"></script>
<script src="assets/js/jquery-jvectormap.min.js"></script>
<script src="assets/js/jquery-jvectormap-world-mill.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>