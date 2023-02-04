<?php
include "../../../database_connect.php";

function downline_counter($d_id)
{
    $au=0;
    global $con;
    
        
        $g="SELECT * FROM `distributor` WHERE `s_id`='$d_id'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $au++;
            
            
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                $au++;
                
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    $au++;
                    
                    
                    $g4="SELECT * FROM `distributor` WHERE `s_id`='$d3[d_id]'";
                    $que4=$con->query($g4);
                    while($d4=$que4->fetch_assoc())
                    {
                        $au++;
                       
                        $g5="SELECT * FROM `distributor` WHERE `s_id`='$d4[d_id]'";
                        $que5=$con->query($g5);
                        while($d5=$que5->fetch_assoc())
                        {
                            $au++;
                           
                            $g6="SELECT * FROM `distributor` WHERE `s_id`='$d5[d_id]'";
                            $que6=$con->query($g6);
                            while($d6=$que6->fetch_assoc())
                            {
                                $au++;
                               
                                $g7="SELECT * FROM `distributor` WHERE `s_id`='$d6[d_id]'";
                                $que7=$con->query($g7);
                                while($d7=$que7->fetch_assoc())
                                {
                                    $au++;
                                   
                                    
                                    $g8="SELECT * FROM `distributor` WHERE `s_id`='$d7[d_id]'";
                                    $que8=$con->query($g8);
                                    while($d8=$que8->fetch_assoc())
                                    {
                                        $au++;
                                        
                                        $g9="SELECT * FROM `distributor` WHERE `s_id`='$d8[d_id]'";
                                        $que9=$con->query($g9);
                                        while($d9=$que9->fetch_assoc())
                                        {
                                            $au++;
                                                
                                            $g10="SELECT * FROM `distributor` WHERE `s_id`='$d0[d_id]'";
                                            $que10=$con->query($g10);
                                            while($d10=$que10->fetch_assoc())
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
        return $au;
}
function rewa($d_id)
{
    global $con, $date, $time;
$team_size=downline_counter($d_id);
if($team_size>=20)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='1' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'1',$team_size,'20');
    echo "inserted";
    }
    
}
if($team_size>=100)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='2' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'2',$team_size,'100');
    echo "inserted";
    }

}
if($team_size>=500)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='3' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'3',$team_size,'500');
    echo "inserted";
    }
}
if($team_size>=1500)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='4' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'4',$team_size,'1500');
    echo "inserted";
    }
}
if($team_size>=5000)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='5' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'5',$team_size,'5000');
    echo "inserted";
    }
}
if($team_size>=10000)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='6' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'6',$team_size,'10000');
    echo "inserted";
    }
}
if($team_size>=20000)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='7' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'7',$team_size,'20000');
    echo "inserted";
    }
}
if($team_size>=40000)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='8' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'8',$team_size,'40000');
    echo "inserted";
    }
}
if($team_size>=250000)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='9' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'9',$team_size,'250000');
    echo "inserted";
    }
}
if($team_size>=10000000)
{
    $d="SELECT * FROM `reward_clear_history` WHERE `reward_clear`='10' AND `d_id`='$d_id';";
   
    $r=$con->query($d);
    if(mysqli_num_rows($r) == 0)
    {
    insert_reward_history($d_id,'10',$team_size,'10000000');
    echo "inserted";
    }
}
}
function insert_reward_history($d_id,$r_clear,$team_size,$r_condition)
{
    global $con,$date,$time;
    $instq="INSERT INTO `reward_clear_history` (`rch_id`, `d_id`, `date`, `time`, `reward_clear`, `reward_condition`, `team_size`) VALUES (NULL, '$d_id', '$date', '$time', '$r_clear', '$r_condition', '$team_size');";
    


     if($con->query($instq) === TRUE)
		{
			echo "<script>alert('Successfully Cleared Rewards');
			        location.href='rewards_view.php';</script>";
		}
	 	else
		{
		 	echo "<script>alert('Query failed to enter id please try again');
		 	</script> <h1> failed</h1>";
	 	}
}

$a=0;
$sel="SELECT * FROM `distributor`";
$df=$con->query($sel);
while($cs=$df->fetch_assoc())
{   
    downline_counter($cs[d_id]);
    $a++;
    echo $a . "//".$cs[d_id]."<br>";
    rewa($cs[d_id]);
}
?>
