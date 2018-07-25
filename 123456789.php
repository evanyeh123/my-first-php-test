<?php

function test($h,$w){
print($h) ;
print('\n');
print('\n');

$result=$h*$w;

return $result;
}
$area= test(10,15);
echo($area);

function up ($y,$x)
{
$result=$y+$x;
return $result;
}
$total= up(8,8);
echo($total);

?>