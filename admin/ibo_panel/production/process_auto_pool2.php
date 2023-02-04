<?php

 include "../../../database_connect.php";



 //////////////////////////////////////////////function for inserting id

function insert_id($d_id,$s_id)
 {
     global $con, $date, $time;
     $sa="SELECT * FROM `autopool2` WHERE `d_id`='$d_id';";
     $ax=$con->query($sa);
     if($ax->num_rows==0)
     {
     $instq="INSERT INTO `autopool2` (`ap2_id`, `d_id`, `s_id`, `date`, `time`) VALUES (NULL, '$d_id', '$s_id', '$date', '$time');";

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
 

 ///////////////////////////////////////function for checking weather they have 5 id in their down or not

 function check_id($d_id)

 {

     global $con;

    $sql1="SELECT * FROM `autopool2` WHERE `s_id`='$d_id';";

    $que1=$con->query($sql1);

    if ($que1->num_rows >= 5) {

        $a=1;

        

    }

    else{

        $a=0;

    }

    return $a;

 }

 

 

 /////////////////////////////////////////////////////////////////////auto pool code start here

function autopool2_entry($d_id)

{

 global $con,$date,$time;

 $temp=array();

 $temp1=array();

 

 $sql="SELECT * FROM `autopool2` ORDER BY `ap2_id` ASC";

 $que=$con->query($sql);

 if ($que->num_rows > 0) {

     $qs=$que->fetch_assoc();

     echo $qs[d_id];

    ///////////////////////////level 1  

    $sql1="SELECT * FROM `autopool2` WHERE `s_id`='$qs[d_id]';";

    $que1=$con->query($sql1);

    if ($que1->num_rows >= 5) {

        while($qs1=$que1->fetch_assoc())

        {

            $temp[]=$qs1[d_id];

            $nex=1;

        }

        

    }

    else{

        insert_id($d_id,$qs[d_id]);

        $nex=0;

    }

    ////////////////////////////////level 2 

    if($nex==1){

        for($x=0; $x<count($temp); $x++)

    	{

    	    //echo $temp[$x]."d_id";

    	    if(check_id($temp[$x])==1)

    	    {

    	        $sql1="SELECT * FROM `autopool12` WHERE `s_id`='$temp[$x]';";

                $que1=$con->query($sql1);

                while($se=$que1->fetch_assoc())

                {

    	            $temp1[]=$se[d_id];

                }

                $nex=1;

                echo "srdd";

    	    }

    	    else{

    	        insert_id($d_id,$temp[$x]);

    	        break;

                $nex=0;

                echo "faedd";

    	    }

    	}

    }

    unset($temp);

    $temp=array();

    for($r=0; $r>50; $r++)

    {

        if($nex==1){

            for($x=0; $x<count($temp1); $x++)

        	{

        	    //echo $temp1[$x]."d_id";

        	    if(check_id($temp1[$x])==1)

        	    {

        	        $sql1="SELECT * FROM `autopool2` WHERE `s_id`='$temp1[$x]';";

                    $que1=$con->query($sql1);

                    while($se=$que1->fetch_assoc())

                    {

        	            $temp[]=$se[d_id];

                    }

                    $nex=1;

                    //echo "srdd";

        	    }

        	    else{

        	        insert_id($d_id,$temp[$x]);

        	        break;

        	        break;

                    $nex=0;

                    //echo "faedd";

        	    }

        	}

        }

        unset($temp1);

        $temp1=array();

        

        

        if($nex==1){

            for($x=0; $x<count($temp); $x++)

        	{

        	    //echo $temp[$x]."d_id";

        	    if(check_id($temp[$x])==1)

        	    {

        	        $sql1="SELECT * FROM `autopool2` WHERE `s_id`='$temp[$x]';";

                    $que1=$con->query($sql1);

                    while($se=$que1->fetch_assoc())

                    {

        	            $temp1[]=$se[d_id];

                    }

                    $nex=1;

                    echo "srdd";

        	    }

        	    else{

        	        insert_id($d_id,$temp[$x]);

        	        break;

        	        break;

                    $nex=0;

                    echo "faedd";

        	    }

        	}

        }

        unset($temp);

        $temp=array();

        

        

        

        

    }

    

     

 }else{

     insert_id($d_id,0);

 }

}





$dce="SELECT * FROM `auto_pool_wallet` WHERE `level`='5' AND `autopool_no`='1';";

$rfd=$con->query($dce);

while($rf=$rfd->fetch_assoc())

{

    autopool2_entry($rf['d_id']);

}
echo "<script>alert('Autopool 2 Entry check up 2 Done'); location.href='autopool1.php'</script>";
?>



