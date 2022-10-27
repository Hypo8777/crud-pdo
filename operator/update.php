<?php



$msg = "";
$lname = "";
$fname = "";
$age = "";
$location = "";

try {
    //code...
    if (isset($_POST['submitUpdate'])) {
        $updateID = $_GET['update'];
        $updateLName = test_input($_POST['updateLName']);
        $updateFName = test_input($_POST['updateFName']);
        $updateAge = test_input($_POST['updateAge']);
        $updateLocation = test_input($_POST['updateLocation']);

        $is_all_empty = empty($updateLName) && empty($updateFName) && empty($updateAge) && empty($updateLocation);
        $is_empty = empty($updateLName) || empty($updateFName) || empty($updateAge) || empty($updateLocation);
        if (!empty($updateID)) {
            if ($is_all_empty) {
                $msg .= "<p class='msg-fail'>Input Fields Cannot Be Empty!</p>";
            } else if ($is_empty) {
                $msg .= "<p class='msg-fail'>Plese make sure all Input Fields are not Empty!</p>";
            } else {
                $query_update = "UPDATE data_table SET lastname = ?, firstname = ?, age = ?, `location` = ? WHERE id = ?";
                $statement_update = $connection->prepare($query_update);
                $statement_update->execute([$updateLName, $updateFName, $updateAge, $updateLocation, $updateID]);
                $msg .= "<p class='msg-success'>Updated Sucessfully!</p>";
            }
        } else {
            $msg .= "<p class='msg-fail'>Please Specify the person to update by clicking 'Update' in read</p>";
        }
    }

    $find_id = $_GET['update'];
    $query_find_update = "SELECT * FROM data_table WHERE id = '$find_id'";
    $statement_find_update = $connection->query($query_find_update);
    if ($statement_find_update->rowCount() !== 0) {
        foreach ($statement_find_update->fetchAll() as $found) {
            $lname = $found->lastname;
            $fname = $found->firstname;
            $age = $found->age;
            $location = $found->location;
        }
    } else {
        if (empty($find_id)) {
            $msg .= "<p class='msg-fail'>Please Specify the person to update by clicking 'Update' in read</p>";
        } else {
            $msg .= "<p class='msg-fail'>No Such Person is found with an ID of " . $find_id . " </p>";
        }
    }


    $statement_update = null;
    $statement_update = null;
    $query_find_update = null;
    $statement_find_update = null;
    $connection = null;
} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();
}



?>


<form class="update-form" method="POST">
    <h1>Update</h1>
    <?php
    if (!empty($_GET['update'])) {
    ?>
        <span>
            <label for="">ID : </label>
            <input type="text" name="" id="" value="<?php echo $_GET['update']; ?>" readonly>
        </span>
        <span>
            <label for="">Last Name</label>
            <input type="text" name="updateLName" id="" placeholder="" value="<?php echo $lname; ?>">
        </span>
        <span>
            <label for="">first Name</label>
            <input type="text" name="updateFName" id="" placeholder="" value="<?php echo $fname; ?>">
        </span>
        <span>
            <label for="">Age</label>
            <input type="number" name="updateAge" id="" placeholder="" value="<?php echo $age; ?>">
        </span>
        <span>
            <label for="">Location</label>
            <input type="text" name="updateLocation" id="" placeholder="" value="<?php echo $location; ?>">
        </span>
        <span class="submit_span">
            <input type="submit" value="Update" name="submitUpdate">            
            <?php echo $msg; ?>
        </span>
    <?php
    } else {
        echo $msg;
    }
    ?>
</form>