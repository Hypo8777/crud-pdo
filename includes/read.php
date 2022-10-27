<?php

require_once "./controller/controller_read.php";


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