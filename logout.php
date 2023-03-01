<?php

session_start();
$_SESSION["uId"] = "";
$_SESSION["userName"] = "";
$_SESSION["uName"] = "";
$_SESSION["uEmail"] = "";
$_SESSION["uPassword"] = "";
session_destroy();

header("Location:index.php");