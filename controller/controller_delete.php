<?php

$delete_id = $_GET['delete'];
$msg = "";

try {
    //code...

    $query_find_delete = "SELECT * FROM data_table WHERE id = '$delete_id'";
    $statement_find_delete = $connection->query($query_find_delete);
    foreach ($statement_find_delete->fetchAll() as $found) {
        $name = $found->lastname . ", " . $found->firstname;
    }

    if (isset($_GET['yes'])) {
        $query_delete = "DELETE FROM data_table WHERE id = ?";
        $statement_delete = $connection->prepare($query_delete);
        $statement_delete->execute([$delete_id]);
        header("location: index.php?create");
    }

    if (isset($_GET['no'])) {
        header("location: index.php?create");
    }


    $query_find_delete = null;
    $statement_find_delete = null;
    $query_delete = null;
    $statement_delete = null;
    $connection = null;
} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();
}

?>