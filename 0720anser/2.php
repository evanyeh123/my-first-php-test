
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
       
    $sql = "select *\n"
    . "  from \n"
    . "(select student_id, sum(score) as sum_score, AVG(score) as avg_score , max(score)\n"
    . "  from score\n"
    . " where course_id in (1,2,3)\n"
    . " group by student_id\n"
    . " order by student_id\n"
    . " ) as A\n"
    . "where avg_score > 60";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll();
    return $record;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        
    }
}
$x = getData(); 
printf('<table border="1">');
    printf("<tr>");
    printf("<th>學生編號</th>");
    printf("<th>平均成績</th>");
    printf("<th>總成績</th>");
foreach($x as $value){
        printf("<tr>");
        printf("<td>" . $value['student_id'] .   "</td>");
        printf("<td>" . $value['avg_score'] .  "</td>");
        printf("<td>" . $value['sum_score']  . "</td>");
        printf("</tr>");
    };
        printf("</table>");

?>

