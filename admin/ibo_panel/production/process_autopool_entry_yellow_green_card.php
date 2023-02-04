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

     if($con->query($instq) === TRUE)
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

if($_GET[card]==1)
{
    $card="Yellow";
    $amount="200";
}
if($_GET[card]==2)
{
    $card="Green";
    $amount="500";
}
$d_id=$_GET[d_id];
    $last_s_id=find_last_s_id();
       insert_id($d_id,$last_s_id);
    $sql="INSERT INTO `autopool_entry` (`ae_id`, `d_id`, `date`, `time`, `amount`, `card_entry`) VALUES (NULL, '$d_id', '$date', '$time', '$amount', '$card');";
    $sql .="UPDATE `autopool_entry_request` SET `status` = 'Y' WHERE `autopool_entry_request`.`aer_id` = '$_GET[aer_id]';";
    if($con->multi_query($sql)=== TRUE)
    {
        echo "<script>alert('id entered in autopool');location.href='autopool_entry_request.php';</script>";
    }
    else{echo "Failed please try again";}

