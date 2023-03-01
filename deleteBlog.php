<?php

include "./connection.php";

$bid = $_GET['bId'];

$q = "delete from blogs where bId = $bid";
$res = mysqli_query($connect, $q);

if ($res) {
    ?>
        <script>
            alert("blog deleted!");
            window.location = "myBlogs.php";
        </script>
    <?php
}else {
    ?>
        <script>
            alert("something went wrong!");
            window.location = "myBlogs.php";
        </script>
    <?php
}