<me
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>title</title>
</head>
<body>

<?php

$servername = "127.0.0.1";
$username = "abc376267";
$password = "abc123";
$dbname = "school";
$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



function getData() {
 global $conn;
  try {
    $sql = "SELECT *, student.name as student_name, course.name as course_name
     FROM score\n"
     . "INNER JOIN student\n"
    . "ON score.student_id=student.id\n"
    . "LEFT JOIN course\n"
    . "ON score.course_id=course.id";
    print_r($sql);
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $record = $stmt->fetchAll();
        return $record;
    }    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();  
      }  
};
// $arr = [
//     "student_id" => $record['student_id'],
//     "score"  => $record['score']
// function arr(){
    $x=getData(); 
    $arr=array();
    foreach($x as $value ){
        if (!isset($arr[$value['student_id']])) {
            $arr[$value['student_id']] = 0;
            $arr2[$value['student_id']] = 0;
            $arr3[$value['student_id']] = array();
        }
        $arr[$value['student_id']]=$arr[$value['student_id']]+$value['score'];
        $arr2[$value['student_id']]=$arr2[$value['student_id']]+1;
        array_push($arr3[$value['student_id']], $value['course_name']);
//        printf($value['arr']);
        // $arr2[$student_id]=$arr2[$stuent_id]+1;
};
// var_dump($x);
// var_dump($arr);

print_r("<br/>");
foreach($arr as $key => $value) {
    print_r($key . " || " . $value . "<br/>");
}
print_r("<br/>");
foreach($arr2 as $key => $value) {
    print_r($key . " || " . $value . "<br/>");
}

print_r("<br/>");
foreach($arr3 as $key => $value) {
    print_r($key . " || " . var_dump($value) . "<br/>");
}


// printf('<table border="1">');
//     printf("<tr>");
//     printf("<th>學生編號</th>");
//     printf("<th>學生姓名</th>");
//     printf("<th>課程</th>");
//     printf("<th>總成績</th>");

// foreach($x as $value){
       
//     printf("<tr>");
//         printf("<td>" . $value['student_id'] .   "</td>");
//         printf("<td>" . $value['student_name'] .   "</td>");
//         printf("<td>" . $value['course_id']  . "</td>");
//         // printf("<td>" . $value['sum_score']  . "</td>");
//         printf("</tr>");
//     };
//     printf("</table>");
?>