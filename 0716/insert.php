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
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mytest", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $xxx = 'MX';
        $sqlString = "INSERT INTO `dns_records`(`ser_no`, `zone`, `host`, `type`, 
        `data`, `ttl`, `mx_priority`, `refresh`, `retry`, `expire`,
         `minimum`, `serial`, `resp_person`, `primary_ns`)
        VALUES (0,'$get_value2','$get_value3','$get_value1', 
        '$get_value4', 3600, null, null, null, null, null, null, null, null)";
        print_r($sqlString);
        $stmt = $conn->prepare($sqlString);
        $stmt->execute();
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