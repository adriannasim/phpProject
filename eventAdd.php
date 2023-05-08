<?php 
    session_start();
    include ("config/config.php");
    $UserID = "admin";
    //$UserID = $_SESSION['UserID'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Event</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'adminHelper.php'; include "headerAdmin.php"; ?>
        <div class="addEvent">
            <div class="addEvent-header">
                <h1>Add Events</h1>
            </div>
            <div class="addEvent-form">
            <?php
                if(!empty($_POST)) {
                    $eventID = trim($_POST['id']);
                    $name = mysqli_real_escape_string($connection, trim($_POST['name']));
                    $date = trim($_POST['eventDate']);
                    $time = trim($_POST['eventTime']);
                    $venue = trim($_POST['venue']);
                    $desc = mysqli_real_escape_string($connection, trim($_POST['desc']));
                    $error = array();
                    
                    $sqlCheck = "SELECT EventID FROM event WHERE EventID = '$eventID'";
                    $result = mysqli_query($connection, $sqlCheck);
                    if (mysqli_num_rows($result) == 1) {
                        $chkEventID = $eventID;
                    } 
                    else {
                        $chkEventID = "";
                    }

                    $error['id'] = checkEventID($eventID, $chkEventID);
                    $error['name'] = checkEventName($name);
                    $error['venue'] = checkEventVenue($venue);
                    $error['desc'] = checkEventDesc($desc);
                    $error = array_filter($error);

                    if ($date == NULL) {
                        $error['eventDate'] = '⚠ Please enter the event date';
                    }
                
                    if($time == NULL) {
                        $error['eventTime'] = '⚠ Please enter the event time';
                    }

                    if((empty($error))) {
                        $eventAdd = "INSERT INTO event VALUES ('$eventID', NULL, '$name', '$date', '$time', '$venue', '$desc');";
                        if (($connection->prepare($eventAdd))->execute()) {
                            echo "<div class='addEvent-form-success'>";
                            printf("<p>
                                Event Added Successfully ! <a href='eventManage.php'>Back to Manage Events</a>
                                </p>");
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='addEvent-form-error'>";
                        printf("<p>
                                %s
                                </p>", implode("</p><p>",$error));
                        echo "</div>";
                    }
                }
                ?>
                <form action="" method="post">
                    <div class="addEvent-form-group">
                        <label for="name">Event ID</label><br/>
                        <input type="text" name="id" id="id" value="<?php echo (isset($eventID))? $eventID: "";?>"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="name">Event Name</label><br/>
                        <input type="text" name="name" id="name" value="<?php echo (isset($name))? $name: "";?>"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="eventDate">Event Date</label><br/>
                        <input type="date" name="eventDate" id="eventDate" value="<?php echo (isset($date))? $date: "";?>"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="eventTime">Event Time</label><br/>
                        <input type="time" name="eventTime" id="eventTime" value="<?php echo (isset($time))? $time: "";?>"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="venue">Event Venue</label><br/>
                        <input type="text" name="venue" id="venue" value="<?php echo isset($_POST['venue']) ? $_POST['venue'] : '';?>"></textarea>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="desc">Event Description</label><br/>
                        <textarea name="desc" id="desc" ><?php echo isset($_POST['desc']) ? $_POST['desc'] : '';?></textarea>
                    </div>
                    <div class="addEvent-form-btn">
                        <input type="reset" onclick="location = 'eventAdd.php'"/>
                        <input type="submit" value="Add" name="addEvent-form-submit"/>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>