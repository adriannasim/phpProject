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
    .submit {
        text-align: center;
        border-radius:2px;
    }

    .edit,
    .status {
        text-align: center;
    }
    form {
        background-color: lightskyblue;
        margin-top: 10px;
        padding: 10px;
        color: black;
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

        if (empty($error)) {
            $edit = "UPDATE seat SET Status='$status' WHERE SeatID='$seatID';";
            if (mysqli_query($connection, $edit)) {
                printf("<p>Seat edited Successfully ! <a href='eventManage.php'>Back to Manage Events</a></p>");
            } else {
                echo "<div class='addEvent-form-error'>";
                printf("<p>Error updating seat: %s</p>", mysqli_error($connection));
                echo "</div>";
            }
        } else {
            echo "<div class='addEvent-form-error'>";
            printf("<p>%s</p>", implode("</p><p>", $error));
            echo "</div>";
        }
    }
    ?>
    
    <h1>Edit Standard Seat</h1>
    <form action="" method="post">
        <div class="edit">
            <label for="id">Enter SeatID :</label><br />
            <input type="text" name="id" id="id" value="<?php echo (isset($seatID)) ? $seatID : ""; ?>" />
        </div>
        <div class="status">
            <label for="status">Enter Status :</label><br />
            <input type="text" name="status" id="status" value="<?php echo (isset($status)) ? $status : ""; ?>" />
        </div>
        <div class="submit">
        <button type="submit" id="button">Edit</button>
</div>
    </form>
</body>

</html>