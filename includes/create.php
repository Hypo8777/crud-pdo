<?php

require_once "./controller/controller_create.php";

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

    ?>
</form>