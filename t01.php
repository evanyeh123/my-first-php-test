<?php
$servername = "localhost";
$username = "abc376267";
$password = "abc123";

try {
    $conn = new PDO("mysql:host=$servername;dbname=mytest", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mytest", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT  host, zone FROM dns_records limit 1, 10"); 
        $stmt->execute();
    
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    

        printf('<table border="1">');
        printf("<tr>");
        printf("<td>zone</td>");
        printf("<td>host</td>");
        printf("</tr>");
    foreach($stmt->fetchAll() as $key => $value) {
        if($value['host']='www'){
        printf("<tr>");
        printf("<td>" . $value['zone'] ."</td>");
        printf("<td>" . $value['host'] ."</td>");
        printf("</tr>");
        }   
    }
    printf("</table>");

        // foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        //     echo $v;
        // }
    }
   
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";
 
?>
