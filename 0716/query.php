<meta http-equiv="content-type" charset="utf-8" />
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
    $xxx = 'MX';
    $sqlString = "SELECT type,zone,host,data " .
                     "FROM dns_records  where type ='MX' AND HOST='@' ";    
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
printf('<table border="1">');
printf("<tr>");
printf("<td>type</td>");
printf("<td>zone</td>");
printf("<td>host</td>");
printf("<td>data</td>");
printf("</tr>");
foreach($stmt->fetchAll()as $key=> $value) { 
    printf("</tr>");
    $get_value1=$value['type'];
    printf("<td>" .$value['type']."</td>");
    printf("<td>" .$value['zone']."</td>");
    printf("<td>" .$value['host']."</td>");
    printf("<td>" .$value['data']."</td>");
}
printf("</table>");
?>