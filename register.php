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

    <div class="container p-5">
        <h1>Register to Blog Project</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp"
                    name="uName">

            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Create username</label>
                <input type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp"
                    name="userName">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="uEmail">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="uPassword">
            </div>

            <div class="mb-3">
                <p>Don't have an account? login <a href="./index.php">here</a></p>
            </div>

            <button type="submit" class="btn btn-primary" name="register">Regiser</button>
        </form>
    </div>

    <?php

    include "./connection.php";

    if(isset($_POST["register"])) {
        $uName = $_POST["uName"];
        $uEmail = $_POST["uEmail"];
        $uPassword = $_POST["uPassword"];
        $userName = $_POST["userName"];

        $ifUserExists = "select * from users where userName = '$userName'";
        $res = mysqli_query($connect, $ifUserExists);
        $ifExists = mysqli_num_rows($res);

        if($ifExists > 0) {
            ?>

            <script>
                alert("Username Already Exists... Try another one!");
                window.location = "register.php";
            </script>

            <?php
        } else {
            $rQ = "insert into users values (null, '$uName', '$uEmail', '$uPassword', '$userName')";
            $rqRes = mysqli_query($connect, $rQ);
            if($rqRes) {
                ?>
    
                <script>
                    alert("Account Created! Login now");
                    window.location = "index.php";
                </script>
    
                <?php
            }
            else {
                ?>
    
                <script>
                    alert("Something went wrong! Try again");
                    window.location = "register.php";
                </script>
    
                <?php
            }
        }

      
    }


    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>



</body>

</html>