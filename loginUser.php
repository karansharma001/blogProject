<?php

// This is a test comment
include "./connection.php";
session_start();

if (isset($_POST["login"])) {
    $userName = $_POST["userName"];
    $uPassword = $_POST["uPassword"];

    $ifUserExists = "select * from users where userName = '$userName'";
    $res = mysqli_query($connect, $ifUserExists);
    $ifExists = mysqli_num_rows($res);



    if ($ifExists > 0) {
        $lQ = "select * from users where userName = '$userName'";
        $lqRes = mysqli_query($connect, $lQ);

        while ($uData = mysqli_fetch_assoc($lqRes)) {
            if ($uData['userName'] == $userName) {
                if ($uData['uPassword'] == $uPassword) {
                    $_SESSION["uId"] = $uData["uId"];
                    $_SESSION["userName"] = $uData["userName"];
                    $_SESSION["uName"] = $uData["uName"];
                    $_SESSION["uEmail"] = $uData["uEmail"];
                    $_SESSION["uPassword"] = $uData["uPassword"];

                    ?>

                    <script>
                        alert("Login Success!");
                        window.location = "Feed.php";
                    </script>
                    <?php

                } else {
                    ?>

                    <script>
                        alert("Wrong Password");
                        window.location = "index.php";
                    </script>
                    <?php
                }
            } else {
                ?>

                <script>
                    alert("Wrong userName");
                    window.location = "index.php";
                </script>
                <?php
            }
        }
    }
    else {
        ?>

        <script>
            alert("Ther is an issue with your userName try again!");
            window.location = "index.php";
        </script>
        <?php
    }



}


?>