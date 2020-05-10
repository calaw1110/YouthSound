<?php
include "include/config.php";
//session_destroy();LOG OUT
//假如有登入狀態
if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location: Account.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="assets/css/Index.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

    <title>YouthSound</title>
    <style></style>
</head>

<body>
    <div id="mainContainer">
        <div id="topContainer">
            <?php include("include/navBarContainer.php"); ?>

            <div id="mainViewContainer">
                <div id="mainContent">
