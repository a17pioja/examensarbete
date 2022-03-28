<html>
    <head>
        <title>Examensarbete</title>
    </head>
    <body>        
        <?php
            $pdo = new PDO('mysql:dbname=a17piojaExamensarbete;host=localhost', 'root', '');

            echo '<h1>Examensarbete a17pioja</h1>'; 

            $querystring='insert into mytable(ID, Name) values (4, "Bill Lucky");';
            $stmt = $pdo->prepare($querystring);
            $stmt->execute();

        ?>
    </body>
</html>