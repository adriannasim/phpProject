<!DOCTYPE html>
<html>
<head>
    <title>View tickets</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/mhistory.css">
</head>

<body>
    <?php include "headerUser.php";
    include "config/config.php";
    ?>
    <h1>Ticket Purchase History</h1>
    <div class="controlbtn">
            <a href="merch.php"><button>Back to Merch &#10558;</button></a>
            <a href="cart.php"><button id="controlbtn2">Go to Cart &#10559;</button></a>
        </div>
        <?php
        $sqlTicket = "SELECT * FROM ticket_info ti
            JOIN ticket_buy tb ON ti.TicketID = tb.TicketID
            JOIN event e ON ti.EventID = e.EventID
            JOIN cart c ON tb.CartID = c.CartID
            WHERE c.UserID = '$UserID' AND c.checkout = 1;";
        $stmt = $connection->prepare($sqlTicket);
        $stmt->bind_param("s", $UserID);
        $stmt->execute();
        $ticketResult = $stmt->get_result();
        if ($ticketResult -> num_rows>0) {
            while($ticketRec = $ticketResult->fetch_object()) {
                printf("
                    <div class='prod-box'>
                        <div class='box-content'>
                            <h3>Ticket: %s</h3>
                            <h4>Price: RM %s</h4>
                            <p class='units'>Quantity: <input type='text' value='%s' disabled>
                            <form method='post'>
                            <input type='hidden' name='tbuy_id' value='%s'>
                        </div>
                    </div>
                ",$ticketRec->EventName, $ticketRec->TicketPrice, $ticketRec->TbuyQty, $ticketRec->TbuyID);
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