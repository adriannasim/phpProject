<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<?php
session_start();
include "config/config.php";
?>
<style>
    h1{
        text-align: center;
        margin-left: 0;
        margin-right: 0;
    }
    button {
        text-align: center;
        margin-left: 725px;
        margin-right: 0;
        border-radius:2px;
        background-color:blue;
    }

    .edit,
    .status {
        text-align: center;
    }
</style>

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
    <form action="" method="post">
        <div class="edit">
            <label for="name">Enter SeatID :</label><br />
            <input type="text" name="id" id="id" value="<?php echo (isset($seatID)) ? $seatID : ""; ?>" />
        </div>
        <div class="status">
            <label for="name">Enter Status :</label><br />
            <input type="text" name="status" id="status" value="<?php echo (isset($status)) ? $status : ""; ?>" />
        </div>
    </form>
    <table style="width:100%">
        <tr>
            <td>
    <button type="submit" id="button">Edit</button>
</td>
</tr>
</table>
    <!--
        <?php
    if (!empty($_POST)) {
        $seatID = trim($_POST['id']);
        $status = trim($_POST['status']);
        $SeatTypeID = "";
        $TicketID = "";
        $sqlCheck = "SELECT SeatID FROM seat WHERE SeatID = '$seatID'";
        $result = mysqli_query($connection, $sqlCheck);
        if (mysqli_num_rows($result) == 1) {
            $chkSeatID = $seatID;
        } else {
            $chkSeatID = "";
        }
        $error['id'] = isSeatIDExist($id,$chkSeatID);
    }

    if ((empty($error))) {
        $edit = "INSERT INTO seat VALUES ('$seatID','$SeatTypeID','$TicketID','$status');";
        if (($connection->prepare($eventAdd))->execute()) {
            printf("<p>
                                Seat edited Successfully ! <a href='eventManage.php'>Back to Manage Events</a>
                                </p>");
            echo "</div>";
        }
    } else {
        echo "<div class='addEvent-form-error'>";
        printf("<p>
                                %s
                                </p>", implode("</p><p>", $error));
        echo "</div>";
    }
    ?>
    -->
   
</body>

</html>