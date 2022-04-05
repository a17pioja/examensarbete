<?php 
$dbhost = "localhost";
$dbname = "a17piojaExamensarbete";
$dbuser = "root";
$dbpass = "";
try{
    $conn = new PDO('mysql:host='.$dbhost.'; dbname='.$dbname, $dbuser, $dbpass);
}
catch(PDOException $connectionError){
    echo "Failed to connect to database: ".$connectionError->getMessage();
}
?>