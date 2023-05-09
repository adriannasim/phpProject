<?php
    session_start();
    include ("config/config.php");
    $UserID = "adrianna";
    //$UserID = $_SESSION['UserID'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Merch</title>
        <link href="css/merch.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <?php include "headerUser.php"?>
        <div class="mbanner">
            <a href="#merch"><img src="img/merch/merch-banner.png" /></a>
        </div>
        <h1 id="merch">Merch</h1>
        <div class="merchfeature">
            <table class="merchfunc">
                <tr>
                    <td><a href="cart.php"><button class="cart">Cart</button></a></td>
                     <td><a href="mHistory.php"><button class="history">History</button></a></td>
                    <td><button class="filter" onclick="showHideFilter()">Filter   <i class="fa fa-filter"></i></button></td>
                </tr>
            </table>
            <section class="hidden">
                <form method="get">
                    <table>
                        <tr>
                            <td><button type="submit" name="search" value="all" class="all" >All</button></td>
                            <td><button type="submit" name="search" value="tshirt" class="tshirt" >T-Shirt</button></td>
                            <td><button type="submit" name="search" value="hoodie" class="hoodie" >Hoodie/Sweater</button></td>
                            <td><button type="submit" name="search" value="hats" class="hats" >Hats</button></td>
                            <td><button type="submit" name="search" value="totebag" class="totebag" >Tote Bags</button></td>
                        </tr>
                    </table>   
                </form>          
            </section>
        </div>
        <div class="merch">
        <?php
        if (isset($_GET['search'])) {
            if ($_GET['search'] == 'tshirt') {
                $sql = "SELECT * FROM merch_info WHERE Category LIKE 'T-Shirt' ORDER BY MerchID;";
            } else if ($_GET['search'] == 'hoodie') {
                $sql = "SELECT * FROM merch_info WHERE Category LIKE 'Hoodie/Sweater' ORDER BY MerchID;";
            } else if ($_GET['search'] == 'hats') {
                $sql = "SELECT * FROM merch_info WHERE Category LIKE 'Hats' ORDER BY MerchID;";
            } else if ($_GET['search'] == 'totebag') {
                $sql = "SELECT * FROM merch_info WHERE Category LIKE 'Totebag' ORDER BY MerchID;";
            } else if ($_GET['search'] == 'all') {
                $sql = "SELECT * FROM merch_info ORDER BY MerchID;";
            }
        } else {
            $sql = "SELECT * FROM merch_info ORDER BY MerchID;";
        }
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($record = $result->fetch_object()) {
                printf("
                <div class='content'>
                    <img src='img/merch/%s.jpg'  alt='%s' />
                    <h3>%s</h3>
                    <h5>RM %s</h5>
                    <a href='merchBuy.php?id=%s'><button class='buy1'>Buy Now</button></a>
                </div>",
                $record->MerchID, $record->MerchDesc, $record->MerchDesc, $record->MerchPrice, $record->MerchID
                );
            }  
        } 
        ?>  
        </div>
        <?php include "footerUser.php"?>
        <script src="javascripts/merch.js"></script>
    </body>
</html>
