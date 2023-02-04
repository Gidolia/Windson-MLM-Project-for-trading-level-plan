<?php
/*include "config.php";
$rfr=mysql_query("SELECT * FROM `distributor`")or die("sorry fail");
while($ff=mysql_fetch_assoc($rfr))
{
    mysql_query("INSERT INTO `ibo` (`ibo_id`, `s_id`, `name`, `dob`, `mobile`, `a_mobile`, `email`, `addreass`, `city`, `state`, `country`, `n_name`, `n_dob`, `n_relation`, `enter_date`, `id_status`, `password`, `last_active_date`, `last_active_time`, `wallet`, `hold_wallet`, `profile_update`, `pan_no`, `f_name`, `profile_update_date`, `activate_link`, `id_status_date`, `pin_level`, `distributor`, `agent_start_date`, `agent_start_time`, `shares`, `share_start_date`) VALUES ('$ff[d_id]1', '$ff[sponsor_no]1', '$ff[d_name]', '$ff[d_dob]', '', '', '$ff[email]', '$ff[house_addreass]', '$ff[city]', '$ff[state]', '', '', '', '', '$ff[joining_date]', '$ff[id_status]', '$ff[password]', '', '', '', '$ff[bal]', '', '', '', '', '', '', '', '', '', '', '', '');")or die("sorry fail1");
}

