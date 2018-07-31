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
        $sql = 
       "select student.name as student_name , course.name as course_name , SCORE as B\n".
       "from score\n".
       " INNER JOIN course\n" .
       "  on score.course_id = course.id\n".
       " LEFT join student\n".
       "  on score.student_id = student.id\n".
       " where student_name=B";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
              $record = $stmt->fetchAll();
              print_r($sql);
            //   print_r("<br />");
              
              return $record;       
    }
     catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
};
$x=getStudentData();
foreach($x as $value){ 
    
    printf("<tr>");
    if($value['course_name']=='數學' ){
        if($value['score_score']=='null'){
            echo($value['student_name']);
        };
    };
    printf("<td>" . $value['student_name'] ."</td>");
 

};
    printf("</tr>"); 
    printf("</table>");
    // foreach($x as $value){
    //     if($value['course_id']
?>