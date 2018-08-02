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

function showTable($record) {
    printf('<table border="1">');
    printf("<tr>");
    printf("<th>學生編號</th>");
    printf("<th>學生姓名</th>");
    printf("<th>學生性別</th>");
    printf("<th>國文成績</th>");
    printf("<th>英文成績</th>");
    printf("</tr>");

    foreach($record as $value) {
      
        printf("<tr>");
        printf("<td>" . $value['student_id']  . "</td>");
        printf("<td>" . $student['name'] . "</td>");
        printf("<td>" . $student['sex'] . "</td>");
        printf("<td>" . $value['score_ch']  . "</td>");
        printf("<td>" . $value['score_en']  . "</td>");
        printf("</tr>");
    }

    printf("</table>");
}

function getStudentData($student_id) {
    global $conn;

    try {
        $sql = "select *" .
               "  from student" .
               " where id = " . $student_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    $arr = [
        "name" => $record['name'],
        "sex"  => $record['sex']
    ];
    return $arr;
}


try {
    $sql = "select A.student_id as student_id, A.score as score_ch, B.score as score_en" .
           "  from (select * from score where course_id = 1) as A" .
           "  join (select * from score where course_id = 2) as B on A.student_id = B.student_id"  
           ;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll();

    showTable($record);

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
// print from (select * from score where course_id = 1) as A" .
// "  join (select * from score where course_id = 2) as B" .
// "    on A.student_id = B.student_id";
?>

</body>
</html>

