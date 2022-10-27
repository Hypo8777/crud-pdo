<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>

<body>
    <div id="content" class="wrapper">
        <header>
            <h1>PDO [Create, Read, Update, Delete] Operations</h1>
        </header>
        <div class="mycontent">
            <div class="content_navigator_select">
                <h1>CRUD Operators</h1>
                <br>
                <h5>Choose Operator</h5>
                <br>
                <div class="nav-selectors">
                    <a href="?create">Create</a>
                    <a href="?read">Read</a>
                    <a href="?update">Update</a>
                    <a href="?delete">Delete</a>
                </div>
            </div>
            <div class="navigated_content_load">
                <?php
                // ? Include Database Connection
                require_once "connection/database.php";
                //  ? Load Selected Content
                if (isset($_GET['create'])) {
                    include_once "operator/create.php";
                } else  if (isset($_GET['read'])) {
                    include_once "operator/read.php";
                } else  if (isset($_GET['update'])) {
                    include_once "operator/update.php";
                } else  if (isset($_GET['delete'])) {
                    include_once "operator/delete.php";
                } else {
                    include_once "operator/create.php";
                }
                ?>

            </div>
        </div>
        <footer>
            <h5>Created by Roald M. Dela Cruz</h5>
            <p>&copy; 2022</p>
        </footer>
    </div>

</body>

</html>