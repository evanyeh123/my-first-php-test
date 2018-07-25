<?php
$get_value1=$_GET["type"];
$get_value2=$_GET["zone"];
$get_value3=$_GET["host"];
$get_value4=$_GET["data"];
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
    $sqlString = "UPDATE `dns_records`
    SET host = '$get_value3',zone = '$get_value2', data ='$get_value4'
    WHERE type = '$get_value1'";
    print_r($sqlString);
    $stmt = $conn->prepare($sqlString);
    $tt=$stmt->execute();
    var_dump($tt);
      if($tt="ture")
        {echo'成功';
}
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