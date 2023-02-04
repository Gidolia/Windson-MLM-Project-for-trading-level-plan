<?php
$string="12jan";
$chars = '';
$nums = '';
for ($index=0;$index<strlen($string);$index++) {
    if(isNumber($string[$index]))
        $nums .= $string[$index];
    else    
        $chars .= $string[$index];
}
echo "Chars: -$chars-<br>Nums: -$nums-";


function isNumber($c) {
    return preg_match('/[0-9]/', $c);
}
?>