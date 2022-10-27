<?php

$load_list = "";

try {
    //code...


    if (isset($_POST['search'])) {
        $query_search_list = "SELECT * FROM data_table WHERE CONCAT(lastname,firstname,age,`location`,datetime_added) LIKE ?";
        $statement_search_list = $connection->prepare($query_search_list);
        $statement_search_list->execute(["%" . $_POST['searchInput'] . "%"]);
        if ($statement_search_list->rowCount() !== 0) {
            foreach ($statement_search_list->fetchAll() as $row) {
                $load_list .= '
            <tr>
                <td> ' . $row->id . ' </td>
                <td>' . $row->lastname . ", " . $row->firstname .  '</td>
                <td>' . $row->age . '</td>
                <td>' . $row->location . '</td>
                <td>' . $row->datetime_added . '</td>
                <td class="actions">
                <a class="update" href="?update=' . $row->id . '">Update</a>
                <a class="delete" href="?delete=' . $row->id . '">Delete</a>
                </td>
            </tr>
                ';
            }
        } else {
            $load_list .= "  <tr><td colspan='6'>No Registered Person Found!</td></tr>";
        }
    } else {
        $query_load_list = "SELECT * FROM data_table";
        $statement_load_list = $connection->query($query_load_list);
        if ($statement_load_list->rowCount() !== 0) {
            while ($row = $statement_load_list->fetch()) {
                $load_list .= '
        <tr>
            <td> ' . $row->id . ' </td>
            <td>' . $row->lastname . ", " . $row->firstname .  '</td>
            <td>' . $row->age . '</td>
            <td>' . $row->location . '</td>
            <td>' . $row->datetime_added . '</td>
            <td class="actions">
            <a class="update" href="?update=' . $row->id . '">Update</a>
            <a class="delete" href="?delete=' . $row->id . '">Delete</a>
            </td>
        </tr>
            ';
            }
        } else {
            $load_list .= "  <tr><td colspan='6'>No Registered Person Found!</td></tr>";
        }
    }


    $query_search_list = null;
    $statement_search_list = null;
    $query_load_list = null;
    $statement_load_list = null;
} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();
}


?>


<form class="read-form" method="POST">
    <h1>Read</h1>
    <span class="search_span">
        <label for="">Search:</label>
        <input type="search" name="searchInput" id="" class="search_input">
        <input type="submit" value="Search" name="search">
    </span>
    <div class="table">
        <table border="1">
            <caption><strong>List of Registered Person</strong></caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Location</th>
                    <th>Date/Time Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $load_list; ?>
            </tbody>
        </table>
    </div>
</form>