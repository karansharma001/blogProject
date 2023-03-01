<?php

session_start();

if ($_SESSION["uId"] == "") {
    header("Location:index.php");
} else {
    ?>


    <?php
    include "connection.php";

    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Blog Project</title>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Welcome, <?php echo $_SESSION["uName"]; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Feed.php">Feed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="myBlogs.php">My Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="addBlog.php">Create blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="myAccount.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <div class="container p-5">
            <h1>Edit your account!</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp" name="uName"
                        value="<?php echo $_SESSION["uName"]; ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Create username</label>
                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp"
                        name="userName" value="<?php echo $_SESSION["userName"]; ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="uEmail" value="<?php echo $_SESSION["uEmail"]; ?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="uPassword"
                        value="<?php echo $_SESSION["uPassword"]; ?>">
                </div>

                <div class="mb-3">
                </div>

                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
        </div>

        <?php

        if (isset($_POST["update"])) {
            $uName = $_POST["uName"];
            $uEmail = $_POST["uEmail"];
            $uPassword = $_POST["uPassword"];
            $userName = $_POST["userName"];

            $uid = $_SESSION["uId"];
            $query = "update users set uName = '$uName', uEmail = '$uEmail', uPassword = '$uPassword', userName = '$userName' where uId = $uid";

            $resss = mysqli_query($connect, $query);

            if ($resss) {
                ?>

                <script>
                    alert("Accounte updated login now!");
                    window.location = "logout.php";
                </script>

                <?php
            }
            else {
                ?>

                <script>
                    alert("Accounted not updated try again!");
                    window.location = "myAccount.php";
                </script>

                <?php
            }
           

            


        }


        ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>



    </body>

    </html>

    <?php
}

?>