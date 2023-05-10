<?php
    session_start();
    include ("config/config.php");
    $UserID = "adrianna";
    //$UserID = $_SESSION['UserID'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Purchase History</title>
        <link href="css/mHistory.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "headerUser.php"?>
        <h1>Merch Purchase History</h1>
        <div class="controlbtn">
            <a href="merch.php"><button>Back to Merch &#10558;</button></a>
            <a href="cart.php"><button id="controlbtn2">Go to Cart &#10559;</button></a>
        </div>
        <div class="filter-history">
            <div class="history-btn">
                <form action="" method="get">
                    <button type="reset" class="hsfilterbtn">All</button>
                    <select name="bycategory" class="ddlhistory">
                        <option selected="selected" disabled>By Category</option>
                        <option>T-Shirts</option>
                        <option>Hoodie/Sweater</option>
                        <option>Hats</option>
                        <option>Tote Bags</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="record">
            <h3>No records currently available !</h3>
        </div>
        <?php include "footerUser.php"?>
    </body>
</html>
