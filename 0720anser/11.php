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
        $sql = "select* ,B.name as course_name ,C.name as student_name\n"
        . "from course as B \n"
        . "    join  (select* from score ) as A \n"
        . "    on B.id = A.course_ID\n"
        . "    left join\n"
        . "    (select* from student ) as C\n"
        . "        on A.student_id = C.id \n"
        . "   ORDER BY course_name  DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll();
         return $record;
    }    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();  
         }
}
$x=getData();
$c=0;
$m=0;
$z=0;
    printf('<table border="1">');
    printf("<tr>");
    printf("<th>學生編號</th>");
    printf("<th>學生姓名</th>");
    printf("<th>課程</th>");
foreach( $x  as $value){
  if (  $value['course_name'] =="國文") {
    $c=$c+1;
    } 
    elseif ($value['course_name'] =="數學") {
      $m=$m+1; 
         };
if($value['course_name'] =="英文"){
      $z=$z+1;
   }
    printf("<tr>");
    printf("<td>" . $value['student_id'] .   "</td>"); 
    printf("<td>" . $value['student_name'] .   "</td>");
    printf("<td>" . $value['course_name'] .  "</td>");
}
    print"國文上課人數";
    print $c ;
    print"數學上人數";
    print $m;
    print"英文上課人數";
    print $z;
?>