<?php
 include "../../../database_connect.php";

 
 
 //////////////////////////////////////////////function for inserting id
 function insert_id($d_id,$s_id)
 {
     global $con, $date, $time;
     $sa="SELECT * FROM `autopool1` WHERE `d_id`='$d_id';";
     $ax=$con->query($sa);
     if($ax->num_rows==0)
     {
     $instq="INSERT INTO `autopool1` (`d_id`, `s_id`, `date`, `time`, `level`, `ap1_id`) VALUES ('$d_id', '$s_id', '$date', '$time', '', NULL);";
     $ins="INSERT INTO `autopool_entry_request` (`aer_id`, `d_id`, `date`, `time`, `card`, `status`) VALUES (NULL, '$d_id', '$date', '$time', 'White', 'Y');";

     if($con->query($instq) === TRUE && $con->query($ins) === TRUE )
		{
			echo "<h1>success</h1>";
		}
	 	else
		{
		 	echo "<script>alert('Query failed to enter id please try again');
		 	</script> <h1> failed</h1>";
	 	}
     }
 }
 
///////////////////////////////////////////////function for finding last s_id
function find_last_s_id()
{
    global $con;
    $temp=array();
    $temp1=array();
    
    $sql="SELECT * FROM `autopool1` ORDER BY `ap1_id` ASC";
 $que=$con->query($sql);
 if ($que->num_rows > 0) {
     $qs=$que->fetch_assoc();
     //echo $qs[d_id];
    ///////////////////////////level 1  
    $sql1="SELECT * FROM `autopool1` WHERE `s_id`='$qs[d_id]';";
    $que1=$con->query($sql1);
    if ($que1->num_rows >= 5) {
        while($qs1=$que1->fetch_assoc())
        {
            $temp[]=$qs1[d_id];
        }
       // echo "Level 1<br>";
    }
    else{$s_idd=$qs[d_id];
    $stop=1;
       // echo "stop1";
    }
    
    /////////////////////////////////////level 2
    
    if(count($temp)>0)
    {
        for($x=0; $x<count($temp); $x++)
    	{
    	    if($stop!=1)
    	    {
                $sql1="SELECT * FROM `autopool1` WHERE `s_id`='$temp[$x]';";
                $que1=$con->query($sql1);
                if ($que1->num_rows >= 5) {
                    while($qs1=$que1->fetch_assoc())
                    {
                        $temp1[]=$qs1[d_id];
                      //  echo $qs1[d_id];
                    }
                    //echo "Level 2<br>";
                }
                else{$s_idd=$temp[$x];
                    $stop=1;
                   // echo "stop2";
                }
    	    }
    	}
    }
    unset($temp);
    $temp=array();
    for($t=0; $t<50; $t++)
    {
        
        if($stop!=1)
        {
            //echo "55";
        if(count($temp1)>0)
        {
            for($x=0; $x<count($temp1); $x++)
        	{
        	    if($stop!=1)
        	    {
                    $sql1="SELECT * FROM `autopool1` WHERE `s_id`='$temp1[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 5) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp[]=$qs1[d_id];
                            //echo $qs1[d_id];
                        }
                         //echo "Level 3<br>";
                    }
                    else{$s_idd=$temp1[$x];
                        $stop=1;
                        //echo $temp1[$x];
                        //echo "stop3";
                    }
        	    }
        	}
        }
        unset($temp1);
        $temp1=array();
        if(count($temp)>0)
        {
            for($x=0; $x<count($temp); $x++)
        	{
        	    if($stop!=1)
        	    {
                    $sql1="SELECT * FROM `autopool1` WHERE `s_id`='$temp[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 5) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp1[]=$qs1[d_id];
                        }
                    }
                    else{$s_idd=$temp[$x];
                        $stop=1;
                        //echo "stop4";
                    }
        	    }
        	}
        }
        unset($temp);
        $temp=array();
        }
        
    }
    
    
    
 }else{$s_idd=0;}
    return $s_idd;
}





//////////////////////////////////function for team Counter
function downline_counter($d_id)
{
    $au=0;
    global $con;
    
        
        $g="SELECT * FROM `distributor` WHERE `s_id`='$d_id'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
                                                }
            
            
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
                                                }
                
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
                                                }
                    
                    
                    $g4="SELECT * FROM `distributor` WHERE `s_id`='$d3[d_id]'";
                    $que4=$con->query($g4);
                    while($d4=$que4->fetch_assoc())
                    {
                        if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
                                                }
                       
                        $g5="SELECT * FROM `distributor` WHERE `s_id`='$d4[d_id]'";
                        $que5=$con->query($g5);
                        while($d5=$que5->fetch_assoc())
                        {
                            if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
                                                }
                           
                            $g6="SELECT * FROM `distributor` WHERE `s_id`='$d5[d_id]'";
                            $que6=$con->query($g6);
                            while($d6=$que6->fetch_assoc())
                            {
                                if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
                                                }
                               
                                $g7="SELECT * FROM `distributor` WHERE `s_id`='$d6[d_id]'";
                                $que7=$con->query($g7);
                                while($d7=$que7->fetch_assoc())
                                {
                                    if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
                                                }
                                   
                                    
                                    $g8="SELECT * FROM `distributor` WHERE `s_id`='$d7[d_id]'";
                                    $que8=$con->query($g8);
                                    while($d8=$que8->fetch_assoc())
                                    {
                                                if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
                                                }
                                        
                                        $g9="SELECT * FROM `distributor` WHERE `s_id`='$d8[d_id]'";
                                        $que9=$con->query($g9);
                                        while($d9=$que9->fetch_assoc())
                                        {
                                            if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
                                                }
                                                
                                            $g10="SELECT * FROM `distributor` WHERE `s_id`='$d0[d_id]'";
                                            $que10=$con->query($g10);
                                            while($d10=$que10->fetch_assoc())
                                            {
                                                                                        if($d[activate1]=='Y' || $d[activate2]=='Y')
                                                {
                                                    $au++;
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
        return $au;
}




$it="SELECT * FROM `distributor`";
$sxp=$con->query($it);
while($sxv=$sxp->fetch_assoc())
{
    
    $au=0;
    $t_team=0;
    $g="SELECT * FROM `distributor` WHERE `s_id`='$sxv[d_id]'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            if($d[activate1]=='Y' || $d[activate2]=='Y')
            {
                $au++;
            }
        }
        echo $au;
    $t_team=downline_counter($sxv[d_id]);
    echo $t_team;
    if($sxv[activate1]=='Y' || $sxv[activate2]=='Y')
    {
        if($au >'5' & $t_team > '29')
        {
           echo $sxv[d_id]."yes<br>";
           $last_s_id=find_last_s_id();
           //echo $last_s_id;
           insert_id($sxv[d_id],$last_s_id);
        }
        else{ echo $sxv[d_id]."no<br>"; }
    }
}
echo "<script>alert('Autopool Entry check up 1 Done'); location.href='autopool1.php'</script>";
//echo find_last_s_id();
//echo downline_counter(78616);









 