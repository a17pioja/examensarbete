<html>
    <head>
        <title>Examensarbete</title>
        <script src="Js/MyScript.js"></script>
        <script src="Js/jquery-3.6.0.min.js"></script>
        
    </head>
    <body>        
        <?php

            if(isset($_POST['enableMysqlBtn'])) {
                EnableMysql();
            }

            if(isset($_POST['enablePgsqlBtn'])) {
                EnablepPgsql();
            }

            function EnableMysql() {
                $dbmsType = "mysql";
                $dbhost = "localhost";
                $dbname = "a17piojaExamensarbete";
                $dbuser = "root";
                $dbpass = "";
                EnableDB($dbmsType, $dbhost, $dbname, $dbuser, $dbpass);
            }

            function EnablepPgsql() {
                $dbmsType = "pgsql";
                $dbhost = "localhost";
                $dbname = "a17piojaExamensarbete";
                $dbuser = "postgres";
                $dbpass = "kurwa";
                EnableDB($dbmsType, $dbhost, $dbname, $dbuser, $dbpass);
            }
            function EnableDB($dbmsType, $dbhost, $dbname, $dbuser, $dbpass) {

                $customerFirstNames = array("Luke", "Danny", "Mike", "Maria", "Julia", "Taylor");
                $customerLastNames  = array("Gonzales", "Kowalski", "Smith", "Washington", "Svensson", "Nguyen");
                $customerCities  = array("Stochholm", "Warsaw", "Tokyo", "Madrid", "Cario", "Prague");
                $customerCountries  = array("Sweden", "Poland","Japan", "Spain", "Egypt", "Czechia");
                $CustomerAddresses  = array("Lucky st. 13", "Smith st. 68", "Kings st. 13", "Queensway 31", "Sunny st. 26", "Goodneighbour st. 11");
                $productNames = array("MetalDeth", "Excavators", "Pierce the Horizon in Reverse","Deck Neep", "Look365", "Saylor Twift");
                $productLocations = array("Stochholm", "Warsaw", "Tokyo", "Madrid", "Cario", "Prague");
                $productDates = array("2022-05-25 10:30:10","1988-01-15 08:50:00","2005-12-01 23:30:00","2012-05-21 11:50:00", "2032-01-01 21:50:00", "2011-04-23 04:50:00");

                try{
                    $conn = new PDO($dbmsType.':host='.$dbhost.'; dbname='.$dbname, $dbuser, $dbpass);
                }
                catch(PDOException $connectionError){
                    echo "Failed to connect to database: ".$connectionError->getMessage();
                }
                
                $stmt = $conn->query("SELECT customerid FROM customers  Order by customerid desc LIMIT 1");
                $customersAmount = $stmt->fetch();
                $customersAmount = $customersAmount['customerid'];    

                $stmt = $conn->query("SELECT productid FROM products  Order by productid desc LIMIT 1");
                $ProductsAmount = $stmt->fetch();
                $ProductsAmount = $ProductsAmount['productid'];     

                
                while($customersAmount<100){
                    CreateCustomers($conn, $customerFirstNames, $customerLastNames, $customerCities, $customerCountries, $CustomerAddresses);
                    $customersAmount++;
                }
                while($ProductsAmount<100){
                    CreateProducts($conn, $productNames, $productLocations, $productDates);
                    $ProductsAmount++;
                }
               
                
            }
            function CreateCustomers($conn, $customerFirstNames, $customerLastNames, $customerCities, $customerCountries, $CustomerAddresses){

                $querystring="insert into Customers(CustomerFirstName, CustomerLastName, CustomerCity, CustomerCountry, 
                CustomerAddress) values ('" .$customerFirstNames[rand(0,5)]."','".$customerLastNames[rand(0,5)]."','".$customerCities[rand(0,5)].
                "','".$customerCountries[rand(0,5)]."','".$CustomerAddresses[rand(0,5)]."');";

                $stmt = $conn->prepare($querystring);
                $stmt->execute();

            }

            function CreateProducts($conn, $productNames, $productLocations, $productDates){

                $querystring="insert into products(ProductName, ProductPrice, ProductLocation,ProductDate) values ('".$productNames[rand(0,5)]."',".rand(9,999).
                ",'".$productLocations[rand(0,5)]."','".$productDates[rand(0,5)]."')";

                $stmt = $conn->prepare($querystring);
                $stmt->execute();
                
                
            }

        ?>
        <h1>Examensarbete a17pioja</h1>
    
        <form method="post">
            <input type="submit" name="enableMysqlBtn" class="button" value="Enable MySQL" />
            <input type="submit" name="enablePgsqlBtn" class="button" value="Enable PostgreSQL" />
        </form>
    


    </body>
</html>