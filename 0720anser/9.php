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
        $sql = "select* from student";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll();
         return $record;
    }    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();  
    }
}
$x=getData();
$boy=0;
$gir=0;
   printf('<table border="1">');
   printf("<tr>");
   printf("<th>學生姓名</th>");
   printf("<th>性別</th>");
foreach($x as $value){
   printf("<tr>");
   printf("<td>" . $value['name'] .   "</td>");
   printf("<td>" . $value['sex'] .   "</td>");
   printf("</tr>");
  if($value['sex']=="男"){
     $boy=$boy+1;
  };
  if($value['sex']=="女")
     $gir=$gir+1;
};
  printf("</tr>"); 
  printf("</table>");
  echo "男生人數:";
  print $boy;
  echo "女生人數:";
  print $gir;
?>