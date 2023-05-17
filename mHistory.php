<?php
    session_start();
    include "config/config.php";
    $UserID = $_SESSION['UserID'];

    if ($UserID == '') {
        header("location: index.php");
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Purchase History</title>
        <link href="css/mHistory.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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
                    <select name="bycategory" class="ddlhistory">
                    <option selected="selected" value="All">Select To Filter</option>
                        <option value="All">All</option>
                        <option value="T-Shirt">T-Shirts</option>
                        <option value="Hoodie/Sweater">Hoodie/Sweater</option>
                        <option value="Hats">Hats</option>
                        <option value="Totebags">Tote Bags</option>
                    </select>
                    <button type="submit" name="search" class="hsfilterbtn">Search <i class="fa fa-search"></i></button>
                    <div class="merch-sort">
                    <label for="sort-btn">Sort By Date :  </label>
                    <input type="button" name="sort-btn" value="Latest ⬇">
                    <input type="button" name="sort-btn" value="Oldest ⬆">
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($_GET["bycategory"])) {
            $category = $_GET["bycategory"];
            if ($category == 'T-Shirt') {
                $sqlMerch = "SELECT * FROM merch_info mi
                            JOIN merch_buy mb ON mi.MerchID = mb.MerchID
                            JOIN cart c ON mb.CartID = c.CartID
                            WHERE c.UserID = ? AND c.checkout = 1 AND mi.Category = 'T-Shirt';";
            } else if ($category == 'Hoodie/Sweater') {
                $sqlMerch = "SELECT * FROM merch_info mi
                            JOIN merch_buy mb ON mi.MerchID = mb.MerchID
                            JOIN cart c ON mb.CartID = c.CartID
                            WHERE c.UserID = ? AND c.checkout = 1 AND mi.Category = 'Hoodie/Sweater';";
            } else if ($category == 'Hats') {
                $sqlMerch = "SELECT * FROM merch_info mi
                            JOIN merch_buy mb ON mi.MerchID = mb.MerchID
                            JOIN cart c ON mb.CartID = c.CartID
                            WHERE c.UserID = ? AND c.checkout = 1 AND mi.Category = 'Hats';";
            } else if ($category == 'Totebags') {
                $sqlMerch = "SELECT * FROM merch_info mi
                            JOIN merch_buy mb ON mi.MerchID = mb.MerchID
                            JOIN cart c ON mb.CartID = c.CartID
                            WHERE c.UserID = ? AND c.checkout = 1 AND mi.Category = 'Totebags';";
            } else if ($category == 'All') {
                $sqlMerch = "SELECT * FROM merch_info mi
                        JOIN merch_buy mb ON mi.MerchID = mb.MerchID
                        JOIN cart c ON mb.CartID = c.CartID
                        WHERE c.UserID = ? AND c.checkout = 1;";
            }
            $stmt = $connection->prepare($sqlMerch);
            $stmt->bind_param("s", $UserID);
            $stmt->execute();
            $merchResult = $stmt->get_result();
            if ($merchResult -> num_rows>0) {
                while($merchRec = $merchResult->fetch_object()) {
                    printf("
                    <div class='prodHistory'>
                        <div class='prod-box'>
                            <img src='img/merch/%s.jpg' alt='alt'/>
                            <div class='box-content'>
                                <h3>%s</h3>
                                <h4>Price: RM %s</h4>
                                <p class='units'>Quantity: <input type='text' value='%s' disabled>
                                <input type='hidden' name='mbuy_id' value='%s'></p>
                            </div>
                        </div>
                    </div>
                    ",$merchRec->MerchID, $merchRec->MerchDesc, $merchRec->MerchPrice, $merchRec->MbuyQty, $merchRec->MbuyID);
                }
            } else {
                printf(" 
                    <div class='record'>
                        <h3>No records currently available !</h3>
                    </div>"
                );
            }
        } else {
            printf(" 
                <div class='record'>
                    <h3>No records currently available !</h3>
                </div>"
            );
        }
        ?>
        <?php include "footerUser.php"?>
    </body>
</html>
