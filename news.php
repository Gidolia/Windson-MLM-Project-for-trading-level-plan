<?php include "database_connect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>WINDSON NEWS UPDATE</title>
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=1Og8gUhxdQEIV5WXdHbkYh09iAE0V1JgCfkagCswF5UOSHktjPkGUizxFDd0-OhPMI-hJfLe_hdP8ELHn2GKSA" charset="UTF-8"></script><style>
.holder { 
  background: linear-gradient(45deg, #ffb628, #ef4200);
  width:100%;
  height:475px;
  overflow:hidden;
  padding:20px;
  font-family:Helvetica;
}
.holder .mask {
  position: relative;
  left: 0px;
  top: 10px;
  width:100%;
  height:100%;
  overflow: hidden;
}
.holder ul {
  list-style:none;
  margin:0;
  padding:0;
  position: relative;
}
.holder ul li {
  padding:10px 0px;
}
.holder ul li a {
  color:darkred;
  text-decoration:none;
}

</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<div class="holder">
<ul id="ticker01">
 <?php 
    $sql="SELECT * FROM `news_update`";
    $as=$con->query($sql);
    while($df=mysqli_fetch_assoc($as))
    {
    ?>
<li><span><?php echo $df[date];?></span>&nbsp;<a href="#"><?php echo $df[news];?></a></li>
<?php }?>
</div>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script id="rendered-js">
jQuery.fn.liScroll = function (settings) {
  settings = jQuery.extend({
    travelocity: 0.03 },
  settings);
  return this.each(function () {
    var $strip = jQuery(this);
    $strip.addClass("newsticker");
    var stripHeight = 1;
    $strip.find("li").each(function (i) {
      stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
    });
    var $mask = $strip.wrap("<div class='mask'></div>");
    var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");
    var containerHeight = $strip.parent().parent().height(); //a.k.a. 'mask' width 	
    $strip.height(stripHeight);
    var totalTravel = stripHeight;
    var defTiming = totalTravel / settings.travelocity; // thanks to Scott Waye		
    function scrollnews(spazio, tempo) {
      $strip.animate({ top: '-=' + spazio }, tempo, "linear", function () {$strip.css("top", containerHeight);scrollnews(totalTravel, defTiming);});
    }
    scrollnews(totalTravel, defTiming);
    $strip.hover(function () {
      jQuery(this).stop();
    },
    function () {
      var offset = jQuery(this).offset();
      var residualSpace = offset.top + stripHeight;
      var residualTime = residualSpace / settings.travelocity;
      scrollnews(residualSpace, residualTime);
    });
  });
};

$(function () {
  $("ul#ticker01").liScroll();
});
//# sourceURL=pen.js
    </script>
</body>
</html>
