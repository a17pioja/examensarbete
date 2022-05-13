<?php 
    $dbhost = "localhost";
    $dbname = "a17piojaExamensarbete";
    $dbuser = "postgres";
    $dbpass = "kurwa";

    try{
        $conn = new PDO('pgsql:host='.$dbhost.'; dbname='.$dbname, $dbuser, $dbpass);
    }
    catch(PDOException $connectionError){
        echo "Failed to connect to database: ".$connectionError->getMessage();
    }
?>