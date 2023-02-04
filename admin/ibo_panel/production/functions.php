<?php

function direct_sponser($d_id)
{
	global $con;
	$a=0;
	$g="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
    $dc=$con->query($g);
	while($d=$dc->fetch_assoc())
    {
		$a++;
	}
	return $a;
}



////////////////////////////function total team counter
function downline_counter($d_id)
{
    $au=0;
    global $con;
        $g="SELECT * FROM `distributor`";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
           $au++;
        }
    return $au;
}


////////////////////////////function Today team counter
function downline_counter_date($d_id)
{
    $au=0;
    global $con,$date;
    
        $g="SELECT * FROM `distributor` WHERE `id_creation_date`='$date'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $au++;
        }
        return $au;
}


///////////////////////function to find total income
function total_income($d_id)
{
	global $con,$date;
	$sd="SELECT * FROM `activate1_wallet_history` WHERE `d_id`='$d_id'";
	$fg=$con->query($sd);
	while($er=$fg->fetch_assoc()){
		if($er[type]=="+")
		{
			$grand=$grand+$er[amount];
		}
	}
	$grand=$grand+0;
	return $grand;
}
///////////////////////////////////////////////////////
function total_income_till_date($d_id)
{
	global $con,$date;
	$sd="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$d_id'";
	$fg=$con->query($sd);
	while($er=$fg->fetch_assoc()){
		if($er[type]=="+")
		{
			$grand=$grand+$er[amount];
		}
	}
	$grand=$grand+0;
	return $grand;
}