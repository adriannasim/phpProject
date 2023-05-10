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
            (isset($_GET["id"])) ? $id = $_GET["id"]: $id = "";

            $sql = "SELECT * FROM event WHERE EventID = '$id'";
            $result = $connection->query($sql);
            if ($record = $result->fetch_object()) {
                $id = $record->EventID;
                $name = $record->EventName;
                $date = $record->EventDate;
                $time = $record->EventTime;
                $venue = $record->EventVenue;
                $desc = $record->EventDesc;
                $hideForm = false;
            } else {
                echo "<div class='error'>Record not found !<a href='eventEdit.php'>Back to Manage Events</a></div>";
                $hideForm = true;
            }
        }    
        if(!empty($_POST)){
            $id = trim($_POST["id"]);
            $name = trim($_POST["name"]);
            $date = trim($_POST["date"]);
            $time = trim($_POST["time"]);
            $venue = trim($_POST["venue"]);
            $desc = trim($_POST["desc"]);

            $error = array();
            $error['name'] = checkEventName($name);
            $error['venue'] = checkEventVenue($venue);
            $error['desc'] = checkEventDesc($desc);
            $error = array_filter($error);
            if (empty($error)) {
                $sql = "UPDATE event SET EventName = ?, EventDate = ?, EventTime = ?, EventVenue = ?, EventDesc = ? WHERE EventID = ?";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("ssssss", $name, $date, $time, $venue, $desc, $id);
                if ($stmt->execute()) {
                    echo "<div class='correct'> Event Data Updated !<br/><a href='eventManage.php'>Back to Manage Events</a></div>";
                } else {
                    echo '<ul class="error">';
                    printf("<li>%s</li>", implode("<li></li>", $error));
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
                        <td><?php echo $id;?><input type="text" name="id" id="id" value="<?php echo $id;?>" hidden/></td>
                    </tr>
                    <tr>
                        <th>Event Name : </th>
                        <td><input type="text" name="name" id="name" value="<?php echo $name;?>"></td>
                    </tr>
                    <tr>
                        <th>Event Date : </th>
                        <td><input type="date" name="date" id="date" value="<?php echo $date;?>"></td>
                    </tr>
                    <tr>
                        <th>Event Time : </th>
                        <td><input type="time" name="time" id="time" value="<?php echo $time;?>"></td>
                    </tr>
                    <tr>
                        <th>Event Venue : </th>
                        <td><input type="text" name="venue" id="venue" value="<?php echo $venue;?>"></td>
                    </tr>
                    <tr>
                        <th>Event Description : </th>
                        <td><textarea name="desc" id="desc"><?php echo htmlspecialchars($desc);?></textarea></td>
                    </tr>
                </table>
                <div class="edit-form-btn">
                    <input type="button" value="Cancel" onclick="location = 'eventManage.php'">
                    <input type="submit" value="Submit" name="edit-form-submit">
                </div>
            </div>
        </form>
        <?php endif;  ?>
        <div>

</body>

</html>