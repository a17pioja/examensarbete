<html>
    <head>
        <title>Examensarbete</title>

        <link rel="stylesheet" href="css/style.css">

        <!--
        <script src="Js/MyScript.js"></script>
        <script src="Js/jquery-3.6.0.min.js"></script>
        -->
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Examensarbete a17pioja</h1>
                <div class="php">
                    <?php
                    
                        if(isset($_POST['enableMysqlBtn'])) {
                            $dbmsType = "mysql";
                            EnableDB($dbmsType);
                        }

                        if(isset($_POST['enablePgsqlBtn'])) {
                            $dbmsType = "pgsql";
                            EnableDB($dbmsType);
                        }

                        if(isset($_POST['createOrderMysqlBtn'])) {
                            $dbmsType = "mysql";
                            CreateOrder($dbmsType);
                        }

                        if(isset($_POST['createOrderPgsqlBtn'])) {
                            $dbmsType = "pgsql";
                            CreateOrder($dbmsType);
                        }

                        function EnableDB($dbmsType) {

                            if($dbmsType=="mysql"){
                                include "PHP/connMysql.php";
                            }
                            else if($dbmsType=="pgsql"){
                                include "PHP/connPgsql.php";
                            }
                            else{
                                echo "something went wrong when choosing which conn file to include in EnableDB";
                            }
                            
                            $customerFirstNames = array("Luke", "Danny", "Mike", "Maria", "Julia", "Taylor");
                            $customerLastNames  = array("Gonzales", "Kowalski", "Smith", "Washington", "Svensson", "Nguyen");
                            $customerCities  = array("Stochholm", "Warsaw", "Tokyo", "Madrid", "Cario", "Prague");
                            $customerCountries  = array("Sweden", "Poland","Japan", "Spain", "Egypt", "Czechia");
                            $CustomerAddresses  = array("Lucky st. 13", "Smith st. 68", "Kings st. 13", "Queensway 31", "Sunny st. 26", "Goodneighbour st. 11");
                            $productNames = array("MetalDeth", "Excavators", "Pierce the Horizon in Reverse","Deck Neep", "Look365", "Saylor Twift");
                            $productLocations = array("Stochholm", "Warsaw", "Tokyo", "Madrid", "Cario", "Prague");
                            $productDates = array("2022-05-25 10:30:10","1988-01-15 08:50:00","2005-12-01 23:30:00","2012-05-21 11:50:00", "2032-01-01 21:50:00", "2011-04-23 04:50:00");
                            
                            $stmt = $conn->query('SELECT * FROM customers');
                            $customersAmount = $stmt->rowCount();

                            $stmt = $conn->query('SELECT * FROM products');
                            $ProductsAmount = $stmt->rowCount();  

                            while($customersAmount<100){
                                CreateCustomers($conn, $customerFirstNames, $customerLastNames, $customerCities, $customerCountries, $CustomerAddresses);
                                $customersAmount++;
                                echo $dbmsType.": Customers: ".$customersAmount."</br>";
                            }
                            echo $dbmsType.": Customers: ".$customersAmount."</br>";

                            while($ProductsAmount<100){
                                CreateProducts($conn, $productNames, $productLocations, $productDates);
                                $ProductsAmount++;
                            }
                            echo $dbmsType.": Products: ".$ProductsAmount;
                            
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
                        function CreateOrder($dbmsType){
                            
                            $filename = 'measurement.csv';
                            $myCsv = fopen($filename, 'a');
                            if ($myCsv === false) {
                                die('Error opening the file ' . $filename);
                            }

                            $measurements = array();

                            $i=0;
                            while($i<10){
                                
                                sleep(0.1);
                                $startTime = microtime(true);

                                if($dbmsType=="mysql"){
                                    include "PHP/connMysql.php";
                                }
                                else if($dbmsType=="pgsql"){
                                    include "PHP/connPgsql.php";
                                }
                                else{
                                    echo "something went wrong when choosing which conn file to include in CreateOrder";
                                    return;
                                }
                                
                                $querystring="insert into orders(orderuserid, orderproductid, ordername) values (1, 1, 'testorderwebb')";
                                $stmt = $conn->prepare($querystring);
                                $stmt->execute();

                                $timeElapsed = (microtime(true) - $startTime)*1000;
                                $conn = null;
                                echo "<b>Time elapsed: </b>".$timeElapsed."ms</br>";
                                $i++;
                            }
                            
                            array_push($measurements, $timeElapsed);
                            fputcsv($myCsv, $measurements);
                            fclose($myCsv);
                        }
                        
                    ?>
                </div>
                
                <form method="post">
                        <div class="db-menu">
                        <input type="submit" name="enableMysqlBtn" class="button" value="Enable MySQL" />
                        <input type="submit" name="createOrderMysqlBtn" class="button" value="Create an order for MySQL" />
                    </div>

                    <div class="db-menu">
                        <input type="submit" name="enablePgsqlBtn" class="button" value="Enable PostgreSQL" />
                        <input type="submit" name="createOrderPgsqlBtn" class="button" value="Create an order for PostgreSQL" />
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>