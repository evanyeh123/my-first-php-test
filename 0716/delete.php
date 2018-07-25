<?php
$get_value1=$_GET["type"];
$get_value2=$_GET["zone"];
 $servername = "localhost";
 $username = "abc376267";
 $password = "abc123";
try {
    $conn = new PDO("mysql:host=$servername;dbname=mytest", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
try {
    $conn = new PDO("mysql:host=$servername;dbname=mytest", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $xxx = 'MX';
    $sqlString = "DELETE FROM `dns_records` WHERE type = '$get_value1'and zone=$get_value2";
        // $sqlString = "指令"      
    print_r($sqlString);
    $stmt = $conn->prepare($sqlString);
    $y=$stmt->execute();//執行
  if($y='ture'){echo'成功';}
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // $number_of_rows = $stmt->rowCount();
        // print_r($number_of_rows);
        // print_r('========');
}
catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
}
$conn = null;  
?>