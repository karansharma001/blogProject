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

    <table class="table">
  <thead>
    <tr>
      <th scope="col">My name</th>
      <th scope="col">My Username</th>
      <th scope="col">My Email</th>
      <th scope="col">My Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $_SESSION["uName"] ?></td>
      <td><?php echo $_SESSION["userName"] ?></td>
      <td><?php echo $_SESSION["uEmail"] ?></td>
      <td><?php echo $_SESSION["uPassword"] ?></td>
      <td><a href="editAccount.php" class="btn btn-primary btn-sm">Edit</a></td>
      
      
    </tr>
   
  </tbody>
</table>

     
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>



  </body>

  </html>

  <?php
}

?>