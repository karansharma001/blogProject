<?php

session_start();

if ($_SESSION["uId"] == "") {
    header("Location:index.php");
} else {
    ?>


    <?php

    include "./connection.php";
    $bId = $_GET["bId"];
    $q = "select * from blogs where bId = $bId";
    $res = mysqli_query($connect, $q);
    $data = mysqli_fetch_assoc($res);

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
            <h1>Create a blog!</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Enter blog title!</label>
                    <input type="text" name="bTitle" class="form-control" id="exampleFormControlInput1" value="<?php echo $data['bTitle']; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Enter blog content!</label>
                    <textarea class="form-control" name="bContent" id="exampleFormControlTextarea1" rows="5"><?php echo $data['bData'];?></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" name="update" value="update" class="btn btn-primary">
                </div>
            </form>


        </div>


        <?php

        include "connection.php";

        if (isset($_POST["update"])) {
            $bTitle = $_POST["bTitle"];
            $bContent = $_POST["bContent"];
            

            $q2 = "update blogs set bTitle = '$bTitle', bData = '$bContent' where bId = $bId";
            $res2 = mysqli_query($connect, $q2);

            if ($res2) {
                ?>

                <script>
                    alert("Blog updated!");
                    window.location = "myBlogs.php";
                </script>


                <?php
            } else {
                ?>

                <script>
                    alert("Something went wrong! try again");
                    window.location = "myBlogs.php";
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