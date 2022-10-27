<?php

try {
    //code...
    $hostname       = "localhost";
    $dbUsername     = "root";
    $dbPassword     = "";
    $dbName         = "crud_db";
    $dsn = 'mysql:host=' . $hostname . ';dbname=' . $dbName;
    $connection = new PDO($dsn,$dbUsername,$dbPassword,);
    // ? Set fetch mode as object
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();    
}

?>