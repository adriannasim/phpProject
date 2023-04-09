<html>
    <head>
        <meta charset="UTF-8">
        <title>Purchase History</title>
        <link href="css/mHistory.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "headerUser.php"?>
        <h1>Purchase History</h1>
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
                    <select name="bymonth" class="ddlhistory">
                        <option selected="selected" disabled>By Month</option>
                        <option>Jan</option>
                        <option>Feb</option>
                        <option>Mar</option>
                        <option>Apr</option>
                        <option>May</option>
                        <option>Jun</option>
                        <option>Jul</option>
                        <option>Aug</option>
                        <option>Sep</option>
                        <option>Oct</option>
                        <option>Nov</option>
                        <option>Dec</option>
                    </select>
                    <select name="byyear" class="ddlhistory">
                        <option selected="selected" disabled>By Year</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
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
