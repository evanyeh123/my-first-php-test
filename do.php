<?php

$num1 = $argv[1];
$num2 = $argv[2];
$num3 = $argv[3];
$num4 = $argv[4];
$num5 = $argv[5];

echo $num1 . "\n";
echo $num2 . "\n";
echo $num3 . "\n";
echo $num4 . "\n";
echo $num5 . "\n";
function cash($mum1,$num2,$num3,$num4,$num5)
{
echo max($num1,$num2,$num3,$num4,$num5);
}
$bers = array($num1,$num2,$num3,$num4,$num5);
rsort($bers);

$arrlength = count($bers);
for($x = 0; $x < $arrlength; $x++) {
    echo $bers[$x];
    echo '<br>';
}
?>