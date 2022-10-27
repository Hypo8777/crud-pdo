<?php


$msg = "";

try {
    //code...


    if (isset($_POST['submitCreate'])) {
        $createLName = test_input($_POST['createLName']);
        $createFName = test_input($_POST['createFName']);
        $createAge = test_input($_POST['createAge']);
        $createLocation = test_input($_POST['createLocation']);

        $is_all_empty = empty($createLName) && empty($createFName) && empty($createAge) && empty($createLocation);
        $is_empty = empty($createLName) || empty($createFName) || empty($createAge) || empty($createLocation);
        if ($is_all_empty) {
            $msg .= "<p class='msg-fail'>Input Fields Cannot Be Empty!</p>";
        } else if ($is_empty) {
            $msg .= "<p class='msg-fail'>Plese make sure all Input Fields are not Empty!</p>";
        } else {
            $query_insert = "INSERT INTO data_table(lastname,firstname,age,`location`) VALUES(?,?,?,?)";
            $statement_insert = $connection->prepare($query_insert);
            $statement_insert->execute([$createLName, $createFName, $createAge, $createLocation]);
            $msg .= "<p class='msg-success'>Added Sucessfully!</p>";
        }
    }

    $query_insert = null;
    $statement_insert = null;
    $connection = null;
    
} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();
}

?>
