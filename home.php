<?php
session_start();
include("config/config.php");
$UserID = $_SESSION['UserID'];

if ($UserID == '') {
    header("location: index.php");
}
?>

<HTML>

<head>
    <title>Feedback Form</title>
</head>

<body>
    <?php
    include "headerUser.php";
    ?>
    <?php include "footerUser.php" ?>

    <body>

</HTML>