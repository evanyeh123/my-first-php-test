<title>don't be con mem</title>
<meta http-equiv="content-type" charset="utf-8" />
<?php
  $get_value1=$_GET["number1"];
  $get_value2=$_GET["number2"];
  $get_value3=$_GET["number3"];
  $get_value4=$_GET["number4"];
  $get_value5=$_GET["number5"];
    $num1 = $_GET["number1"];
   $num2 = $_GET["number2"];
   $num3 = $_GET["number3"];
   $num4 = $_GET["number4"];
   $num5 = $_GET["number5"];

function cash($number1,$number2,$number3,$number4,$number5)
{   
    echo max($number1,$number2,$number3,$number4,$number5);

}

function up ($v,$w,$x,$y,$z)
{
    $result=$v+$w+$x+$y+$z;
    return $result;
}

$bers = array($num1,$num2,$num3,$num4,$num5);
    rsort($bers);
    $arrlength = count($bers);
for($x = 0; $x < $arrlength; $x++) {
    echo $bers[$x];
    echo '<br>';
}
  $total= up($_GET["number1"],$_GET["number2"],$_GET["number3"],$_GET["number4"],$_GET["number5"]);
    echo($total);
 echo'<br>';
 cash($num1,$num2,$num3,$num4,$num5);

 if( $get_value1<10){
    echo "hello";
}
else {
    echo "hi";
}

?>
