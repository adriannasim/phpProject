<!DOCTYPE html>
<html>
<head>
    <title>View tickets</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/mhistory.css">
</head>

<body>
    <?php include "headerUser.php"?>
    <h1>Ticket Purchase History</h1>
    <div class="controlbtn">
            <a href="merch.php"><button>Back to Merch &#10558;</button></a>
            <a href="cart.php"><button id="controlbtn2">Go to Cart &#10559;</button></a>
        </div>
        <div class="filter-history">
            <div class="history-btn">
                <form action="" method="get">
                    <button type="reset" class="hsfilterbtn">All</button>
                    <button name="bycategory" class="ddlhistory">By Event Date</button>
                </form>
            </div>
        </div>

        <div class="record">
            <h3>No records currently available !</h3>
        </div>
    <?php include "footerUser.php"?> 
</body>
</html>