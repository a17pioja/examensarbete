<html>
    <head>
        <title>Examensarbete</title>
    </head>
    <body>        
        <?php

            echo '<h1>Examensarbete a17pioja</h1>'; 
    
            if(isset($_POST['enableMysqlBtn'])){
                EnableMySQL();
            }
            
            if(isset($_POST['enablePgsqlBtn'])){
                EnablePostgreSQL();
            }
            
            function EnableMySQL() {
                
                $dbhost = "localhost";
                $dbname = "a17piojaExamensarbete";
                $dbuser = "root";
                $dbpass = "";
                
                try{
                    $connectMysql = new PDO('mysql:host='.$dbhost.'; dbname='.$dbname, $dbuser, $dbpass);
                }
                catch(PDOException $connectionError){
                    echo "Failed to connect to database: ".$connectionError->getMessage();
                }

                $querystring='insert into mytable(Name) values ("Bill Lucky");';
                $stmt = $connectMysql->prepare($querystring);
                $stmt->execute();
                echo "MySQL!";
            }

            
            function EnablePostgreSQL() {
                $dbhost = "localhost";
                $dbname = "a17piojaExamensarbete";
                $dbuser = "postgres";
                $dbpass = "kurwa";

                try{
                    $connectPgsql = new PDO('pgsql:host='.$dbhost.'; dbname='.$dbname, $dbuser, $dbpass);
                }
                catch(PDOException $connectionError){
                    echo "Failed to connect to database: ".$connectionError->getMessage();
                }

                $querystring="insert into mytable(Name) values ('Bill Lucky');";
                $stmt = $connectPgsql->prepare($querystring);
                $stmt->execute();
                echo "PostgreSQL!";
            }
            
        ?>

            <form method="post">
            <input type="submit" name="enableMysqlBtn"
                    class="button" value="mysql" />
              
            <input type="submit" name="enablePgsqlBtn"
                    class="button" value="pqsql" />
            </form>

    </body>
</html>