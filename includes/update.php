
<?php

require_once "./controller/controller_update.php";

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