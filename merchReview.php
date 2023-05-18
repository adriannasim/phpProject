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
    <title>Merch Reviews</title>
    <link href="css/mHistory.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <?php
    include "headerUser.php";
    ?>
    <h1>Merch Review</h1>
    
    <?php include "footerUser.php" ?>

    <body>

</HTML>