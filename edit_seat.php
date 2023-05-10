<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<?php
session_start();
include("config/config.php");
$UserID = "admin";
//$UserID = $_SESSION['UserID'];
?>

<head>
    <meta charset="UTF-8">
    <title>Edit event seat</title>
   
</head>
<body>
    <?php
    include "headerAdmin.php";
    require_once "seat_helper.php";
        ?>
    <h1>Edit Standard Seat</h1>

   
</body>

</html>