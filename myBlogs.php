<?php

session_start();

if ($_SESSION["uId"] == "") {
  header("Location:index.php");
} else {
  ?>


  <?php
  include "connection.php";

      $uId = $_SESSION["uId"];
    //   echo $_SESSION["uId"];
  $q = "select * from blogs where uId = $uId";
  $res = mysqli_query($connect, $q);

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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

      <?php

      while ($data = mysqli_fetch_assoc($res)) {
        ?>
        <div class="card my-3">
          <div class="card-header">
            <?php echo $data["uName"]; ?>
          </div>
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $data["bTitle"]; ?>
            </h5>
            <p class="card-text"> <?php echo substr($data["bData"],0, 50); ?></p>
            <!-- <p class="card-text"> <?php echo $data["bData"]; ?></p> -->
            <a href="blogContent.php?bId=<?php echo $data["bId"]; ?>" class="btn btn-primary">Show more!</a>
            <a href="editBlog.php?bId=<?php echo $data["bId"]; ?>" class="btn btn-warning">Edit blog!</a>
            <a href="deleteBlog.php?bId=<?php echo $data["bId"]; ?>" class="btn btn-danger">Delete blog!</a>
          </div>
        </div>
        <?php
      }

      ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>



  </body>

  </html>

  <?php
}

?>