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
} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();
}

?>

<form class="create-form" method="POST">
    <h1>Create</h1>
    <span>
        <label for="">Last Name</label>
        <input type="text" name="createLName" id="" placeholder="" value="">
    </span>
    <span>
        <label for="">first Name</label>
        <input type="text" name="createFName" id="" placeholder="" value="">
    </span>
    <span>
        <label for="">Age</label>
        <input type="number" name="createAge" id="" placeholder="">
    </span>
    <span>
        <label for="">Location</label>
        <input type="text" name="createLocation" id="" placeholder="">
    </span>
    <input type="submit" value="Create" name="submitCreate">
    <?php
    echo $msg;
    $query_insert = null;
    $statement_insert = null;
    $connection = null;
    ?>
</form>