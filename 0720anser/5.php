<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>title</title>
</head>
<body>

<?php

$servername = "localhost";
$username = "abc376267";
$password = "abc123";
$dbname = "school";
$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
function getStudentData() {
    global $conn;
    try {
        $sql = "select*, B.name as student_name  , SCORE as 成績, A.course_id, A.SCORE\n"
    . " from student as B\n"
    . "LEFT join\n"
    . " (select* from score WHERE course_id='2') as A\n"
    . "  on B.id = A.student_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
              $record = $stmt->fetchAll();
              print_r($sql);
              return $record;       
  }
     catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
};
$y=getStudentData();
   printf('<table border="1">');
   printf("<tr>");
   printf("<th>未上張老師課的學生</th>");
foreach($y as $value){ 
  printf("<tr>");
   if($value['course_id']==null) {
     printf("<td>" . $value['student_name'] ."</td>");
    };
  };
     printf("</tr>"); 
     printf("</table>");
?>