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
   $sql = "select*, A.name as student_name  , SCORE as 成績, B.course_id, B.SCORE ,C.name as course_name ,MAX(score) \n"
    . "  from score as B\n"
    . " join\n"
    . "  (select* from student) as A\n"
    . "   on B.student_id = A.ID\n"
    . " left join\n"
    . "  (select* from course ) as C\n"
    . "   on B.course_id = C.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll();
         return $record;
    }    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();  
    }
}
   $x = getData(); 
    printf('<table border="1">');
    printf("<tr>");
    printf("<th>學生編號</th>");
    printf("<th>學生姓名</th>");
    printf("<th>課程</th>");
    printf("<th>分數</th>");
foreach($x as $value){
  if( $value['score']<"60"){
    printf("<tr>");
    printf("<td>" . $value['student_id'] .   "</td>");
    printf("<td>" . $value['student_name'] .   "</td>");
    printf("<td>" . $value['course_name'] .  "</td>");
    printf("<td>" . $value['score'] . "</td> ");
    printf("</tr>");
    }
}    
    printf("</table>");
?>