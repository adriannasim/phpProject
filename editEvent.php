<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Events</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include "adminHelper.php";
    include "headerAdmin.php";
    global $hideForm;
    ?>

    <div class="edit-header">
        <h1>Edit Events</h1>
    </div>
    <div class="editEvent-form">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            (isset($_GET["id"])) ?
                $id = $_GET["id"]: $id = "";

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = "SELECT * FROM event WHERE EventID = '$id'";
            $result = $con->query($sql);
            if ($record = $result->fetch_object()) {
                $id = $record->EventID;
                $ticketID = $record->TicketID;
                $name = $record->EventName;
                $date = $record->EventDate;
                $time = $record->EventTime;
                $venue = $record->EventVenue;
                $desc = $record->EventDesc;
            } else {
                echo "<div class='error'>Record not found !<a href='eventEdit.php'>Back to Manage Events</a></div>";
                $hideForm = true;
            }
            $con->close();
            $result->free();
        } else if(!empty($_POST)){
            $id = trim($_POST["id"]);
            $ticketID = trim($_POST["ticket"]);
            $name = trim($_POST["name"]);
            $date = trim($_POST["date"]);
            $time = trim($_POST["time"]);
            $venue = trim($_POST["venue"]);
            $desc = trim($_POST["desc"]);
            $error['name'] = checkEventName($name);
            $error['venue'] = checkEventVenue($venue);
            $error['desc'] = checkEventDesc($desc);
            $error = array_filter($error);
            if (empty($error)) {$sql = "UPDATE event SET EventName = ?, EventDate = ?, EventTime = ?, EventVenue = ?, EventDesc = ? WHERE EventID = ?";
                $stmt->bind_param("sssssss",$id, $name, $date, $time, $venue, $desc, $ticket);
                if ($stmt->execute()) {
                    echo "<div class='correct'> Event Data Updated !<br/><a href='eventEdit.php'>Back to Manage Events</a></div>";
                } else {
                    echo '<ul class="error">';
                    printf("<p>%s</p>", implode("<p></p>", $error));
                    echo '</ul>';
            }
        }
        }
        ?>
        <?php if ($hideForm == false) : ?>
        <form action="" method="post">
            <div class="edit-form">
            <table class="edit-form-table">
                <tr>
                    <th>Event ID : </th>
                    <td><?php echo $id;?><input type="hidden" name="id" value="<?php echo $id;?>"></td>
                <tr>
                <tr>
                    <th>Ticket ID : </th>
                    <td><?php echo $ticketID;?><input type="hidden" name="ticket" value="<?php echo $ticketID;?>"></td>
                <tr>
                <tr>
                    <th>Event Name : </th>
                    <td><input type="text" name="name" value="<?php echo $name;?>"></td>
                <tr>
                <tr>
                    <th>Event Date : </th>
                    <td><input type="date" name="date" value="<?php echo $date;?>"></td>
                <tr>
                <tr>
                    <th>Event Time : </th>
                    <td><input type="time" name="time" value="<?php echo $time;?>"></td>
                <tr>
                <tr>
                    <th>Event Venue : </th>
                    <td><input type="text" name="venue" value="<?php echo $venue;?>"></td>
                </tr>
                <tr>
                    <th>Event Description : </th>
                    <td><textarea name="desc" value="<?php echo $desc;?>"></textarea></td>
                </tr>
            </table>
            <div class="edit-form-btn">
            <input type="button" value="Cancel" onclick="location = 'eventEdit.php'">
            <input type="submit" value="Submit" name="edit-form-submit">
            </div>
        </div>
        </form>
        <?php endif; ?>
        <div>

</body>

</html>