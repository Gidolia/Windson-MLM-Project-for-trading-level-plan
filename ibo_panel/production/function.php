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


////////////////////////////function Today team counter
function downline_counter_date($d_id)
{
    $au=0;
    global $con,$date;
    
        
        $g="SELECT * FROM `distributor` WHERE `s_id`='$d_id'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
			if($d[id_creation_date]==$date)
			{
            $au++;
			}
            
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                if($d2[id_creation_date]==$date)
				{
				$au++;
				}
                
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    if($d3[id_creation_date]==$date)
					{
					$au++;
					}
                    
                    $g4="SELECT * FROM `distributor` WHERE `s_id`='$d3[d_id]'";
                    $que4=$con->query($g4);
                    while($d4=$que4->fetch_assoc())
                    {
                        if($d4[id_creation_date]==$date)
						{
						$au++;
						}
                       
                        $g5="SELECT * FROM `distributor` WHERE `s_id`='$d4[d_id]'";
                        $que5=$con->query($g5);
                        while($d5=$que5->fetch_assoc())
                        {
                            if($d5[id_creation_date]==$date)
							{
							$au++;
							}
                           
                            $g6="SELECT * FROM `distributor` WHERE `s_id`='$d5[d_id]'";
                            $que6=$con->query($g6);
                            while($d6=$que6->fetch_assoc())
                            {
                                if($d6[id_creation_date]==$date)
								{
								$au++;
								}
                               
                                $g7="SELECT * FROM `distributor` WHERE `s_id`='$d6[d_id]'";
                                $que7=$con->query($g7);
                                while($d7=$que7->fetch_assoc())
                                {
                                    if($d7[id_creation_date]==$date)
									{
									$au++;
									}
                                    
                                    $g8="SELECT * FROM `distributor` WHERE `s_id`='$d7[d_id]'";
                                    $que8=$con->query($g8);
                                    while($d8=$que8->fetch_assoc())
                                    {
                                        if($d8[id_creation_date]==$date)
										{
										$au++;
										}
                                        $g9="SELECT * FROM `distributor` WHERE `s_id`='$d8[d_id]'";
                                        $que9=$con->query($g9);
                                        while($d9=$que9->fetch_assoc())
                                        {
                                            if($d9[id_creation_date]==$date)
											{
												$au++;
											}   
                                            $g10="SELECT * FROM `distributor` WHERE `s_id`='$d9[d_id]'";
                                            $que10=$con->query($g10);
                                            while($d10=$que10->fetch_assoc())
                                            {
                                                if($d10[id_creation_date]==$date)
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