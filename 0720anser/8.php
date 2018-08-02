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
function getData($y) {
    global $conn;
    try {   
        $sql = "select* ,B.name as course_name ,C.name as student_name\n"
        . "from course as B \n"
        . "    join  (select* from score where course_id=$y ) as A \n"
        . "    on B.id = A.course_ID\n"
        . "    left join\n"
        . "    (select* from student ) as C\n"
        . "        on A.student_id = C.id \n"
        . "   ORDER BY score DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll();
         return $record;
    }    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();  
    }
}
$cn=getData(1);
$mt=getData(2);
$en=getData(3);
    printf('<table border="1">');
    printf("<tr>");
    printf("<th>學生編號</th>");
    printf("<th>學生姓名</th>");
    printf("<th>課程</th>");
foreach( $cn  as $value){
    printf("<tr>");
    printf("<td>" . $value['student_id'] .   "</td>"); 
    printf("<td>" . $value['student_name'] .   "</td>");
    printf("<td>" . $value['course_name'] .  "</td>");
 };
    printf('<table border="1">');
    printf("<tr>");
    printf("<th>學生編號</th>");
    printf("<th>學生姓名</th>");
    printf("<th>課程</th>");
 foreach( $mt  as $value){
    printf("<tr>");
    printf("<td>" . $value['student_id'] .   "</td>"); 
    printf("<td>" . $value['student_name'] .   "</td>");
    printf("<td>" . $value['course_name'] .  "</td>"); 
 };
    printf('<table border="1">');
    printf("<tr>");
    printf("<th>學生編號</th>");
    printf("<th>學生姓名</th>");
    printf("<th>課程</th>");
 foreach( $en  as $value){
    printf("<tr>");
    printf("<td>" . $value['student_id'] .   "</td>"); 
    printf("<td>" . $value['student_name'] .   "</td>");
    printf("<td>" . $value['course_name'] .  "</td>");
 };
?>