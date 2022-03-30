<html>
    <head>
        <title>Examensarbete</title>
    </head>
    <body>        
        <?php

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

                CreateCustomersMySQL( $connectMysql);
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

            function CreateCustomersMySQL($connectMysql){
                $firstNames = array("Luke", "Danny", "Mike", "Maria", "Julia", "Taylor");
                $lastNames  = array("Gonzales", "Kowalski", "Smith", "Washington", "Svensson", "Nguyen");
                $cities  = array("Stochholm", "Warsaw", "Tokyo", "Madrid", "Cario", "Prague");
                $countries  = array("Sweden", "Poland","Japan", "Spain", "Egypt", "Czechia");
                $addresses  = array("Lucky st. 13", "Smith st. 68", "Kings st. 13", "Queensway 31", "Sunny st. 26", "Goodneighbour st. 11");


                $querystring="insert into Customers(CustomerFirstName, CustomerLastName, CustomerCity, CustomerCountry, 
                CustomerAddress) values ('" .$firstNames[rand(0,5)]."','".$lastNames[rand(0,5)]."','".$cities[rand(0,5)].
                "','".$countries[rand(0,5)]."','".$addresses[rand(0,5)]."');";

                $stmt = $connectMysql->prepare($querystring);
                $stmt->execute();
            }
      
        ?>
        <h1>Examensarbete a17pioja</h1>
        <form method="post">
            <input type="submit" name="enableMysqlBtn"
                    class="button" value="mysql" />
              
            <input type="submit" name="enablePgsqlBtn"
                    class="button" value="pqsql" />
        </form>

    </body>
</html>