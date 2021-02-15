<?php
       define('HOST_PARAM', 'localhost');
       define('DBNAME', 'database-2013644');
       define('USERNAME', "root");
       define('PASSWORD', "1234");
#Establishing the Connection to database with PDO.
    $connection=new PDO("mysql:host=".HOST_PARAM.";dbname=".DBNAME."",USERNAME,PASSWORD);
#able to catch the errors in the queries.
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>