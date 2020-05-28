<?php
include "includes/config.php";
//要先include Artist class 才能 include Album class
include "includes/classes/Artist.php"; //1
include "includes/classes/Album.php"; //2
include "includes/classes/Song.php"; //3
//session_destroy();LOG OUT
//假如有登入狀態
if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
    echo "<script>userLoggedIn ='$userLoggedIn';</script>";
} else {
    header("Location: account.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="assets/js/script.js"></script>
    <title>YouthSound</title>

</head>

<body>

    <div id="mainContainer">
        <div id="topContainer">
            <?php include "includes/navBarContainer.php";?>

            <div id="mainViewContainer">
                <div id="mainContent">
