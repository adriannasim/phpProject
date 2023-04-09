<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Event</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "headerAdmin.php"; ?>
        <div class="addEvent">
            <div class="addEvent-header">
                <h1>Add Events</h1>
            </div>
            <div class="addEvent-form">
            <?php
                if(!empty($_POST)) {
                    $name = trim($_POST['name']);
                    $date = trim($_POST['eventDate']);
                    $time = trim($_POST['eventTime']);
                    $venue = trim($_POST['venue']);
                    $desc = trim($_POST['desc']);
                    $error = array();

                    if($name == NULL) {
                        $error['name'] = 'Please enter the event name';
                    }
                
                    if ($date == NULL) {
                        $error['eventDate'] = 'Please enter the event date';
                    }
                
                    if($time == NULL) {
                        $error['eventTime'] = 'Please enter the event time';
                    }

                    if($venue == NULL) {
                        $error['venue'] = 'Please enter the event venue';
                    }

                    if($desc == NULL) {
                        $error['desc'] = 'Please enter the event description';
                    }

                    if((empty($error))) {
                        echo "<div class='addEvent-form-success'>";
                        printf("<p>
                                Event Added Successfully.
                                </p>");
                        echo "</div>";
                    } else {
                        echo "<div class='addEvent-form-error'>";
                        printf("<p>
                                %s
                                </p>", implode("</p><p>",$error));
                        echo "</div>";
                    }
                } else {
                    
                }
                ?>
                <form action="" method="post">
                    <div class="addEvent-form-group">
                        <label for="name">Event Name</label><br/>
                        <input type="text" name="name" id="name"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="eventDate">Event Date</label><br/>
                        <input type="date" name="eventDate" id="eventDate"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="eventTime">Event Time</label><br/>
                        <input type="time" name="eventTime" id="eventTime"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="venue">Event Venue</label><br/>
                        <textarea name="venue" id="venue"></textarea>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="desc">Event Description</label><br/>
                        <textarea name="desc" id="desc"></textarea>
                    </div>
                    <div class="addEvent-form-btn">
                        <input type="reset"/>
                        <input type="submit" value="Add" name="addEvent-form-submit"/>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>