<html>
    <head>
        <title>Examensarbete</title>
        <script src="Js/MyScript.js"></script>
        <script src="Js/jquery-3.6.0.min.js"></script>
        
    </head>
    <body>        
        <?php
            EnableMySQL();
            EnablePgsql();

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

                CreateData( $connectMysql);
            }

            function EnablePgsql() {
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

                CreateData($connectPgsql);
            }

            function CreateData($connectDB){

                $firstNames = array("Luke", "Danny", "Mike", "Maria", "Julia", "Taylor");
                $lastNames  = array("Gonzales", "Kowalski", "Smith", "Washington", "Svensson", "Nguyen");
                $cities  = array("Stochholm", "Warsaw", "Tokyo", "Madrid", "Cario", "Prague");
                $countries  = array("Sweden", "Poland","Japan", "Spain", "Egypt", "Czechia");
                $addresses  = array("Lucky st. 13", "Smith st. 68", "Kings st. 13", "Queensway 31", "Sunny st. 26", "Goodneighbour st. 11");
                
                $productNames = array("MetalDeth", "Excavators", "Pierce the Horizon in Reverse","Deck Neep", "Look365", "Saylor Twift");
                $productLocations = array("Stochholm", "Warsaw", "Tokyo", "Madrid", "Cario", "Prague");
                $productDates = array("2022-05-25 10:30:10","1988-01-15 08:50:00","2005-12-01 23:30:00","2012-05-21 11:50:00", "2032-01-01 21:50:00", "2011-04-23 04:50:00");
                
                for ($i = 0; $i <= 10; $i++) {
                $querystring="insert into Customers(CustomerFirstName, CustomerLastName, CustomerCity, CustomerCountry, 
                CustomerAddress) values ('" .$firstNames[rand(0,5)]."','".$lastNames[rand(0,5)]."','".$cities[rand(0,5)].
                "','".$countries[rand(0,5)]."','".$addresses[rand(0,5)]."');";

                $stmt = $connectDB->prepare($querystring);
                $stmt->execute();

               $querystring="insert into products(ProductName, ProductPrice, ProductLocation,ProductDate) values ('".$productNames[rand(0,5)]."',".rand(9,999).
                ",'".$productLocations[rand(0,5)]."','".$productDates[rand(0,5)]."')";

                $stmt = $connectDB->prepare($querystring);
                $stmt->execute();
                }

            }

        ?>
        <h1>Examensarbete a17pioja</h1>
    
        <form method="post">
            <input type="submit" name="enableMysqlBtn" class="button" value="mysql" />
            <input type="submit" name="enablePgsqlBtn" class="button" value="pqsql" />
        </form>
    


    </body>
</html>