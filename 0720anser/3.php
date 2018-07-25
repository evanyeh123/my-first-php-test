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



function getData() {
    global $conn;
    try { $sql = "select *" .
        "from student";
    $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll();
    return $record;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        
    }
};

$x = getData(); 

printf('<table border="1">');
    printf("<tr>");
    printf("<th>學生編號</th>");
    printf("<th>學生姓名
    </th>");
 foreach($x as $value){
        printf("<tr>");
        printf("<td>" . $value['id'] .   "</td>");
        printf("<td>" . $value['name'] .   "</td>");
        printf("</tr>");
    }

    printf("</table>");

?>