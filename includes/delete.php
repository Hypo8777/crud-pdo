
<?php

require_once "./controller/controller_delete.php";

?>

<form class="delete-form" method="GET">
    <h1>Delete</h1>
    <?php
    if (!empty($delete_id)) {
    ?>
        <span>
            <p>Do you want to delete <strong><?php echo $name; ?></strong> ?</p>
        </span>
        <span>
            <a class="delete-yes" href="?delete=<?php echo $delete_id; ?>&yes">Yes</a>
            <a class="delete-no" href="?delete=<?php echo $delete_id; ?>&no">No</a>
        </span>
    <?php
    } else {
    ?>
        <span>
            <p class="delete-no">
                Please Specify the person to delete by clicking 'Delete' in read
            </p>
        </span>
    <?php
    }
    ?>
</form>