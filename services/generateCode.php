<?php 


function createRandomCode()
{

    $chars = $_SESSION["equipmentname"];
    srand((double)microtime() * 1000000);
    $i = 0;
    $code = '';

    while ($i <= 5) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $code = $code . $tmp;
        $i++;
    }

    return $code;

}
?>