<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Events</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "headerAdmin.php";
    include "config/config.php";
    ?>
    <?php
    $header = array(
        "EventID" => "Event ID",
        "EventName" => "Event Name",
        "EventDate" => "Event Date",
        "EventTime" => "Event Time",
        "EventVenue" => "Event Venue",
        "EventDesc" => "Description"
    );
    ?>
    <div class="editEvents">
        <div class="editEvents-header">
            <h1>Manage Events</h1>
        </div>
        <div class="editEvents-form">
            <form action="" method="get">
                <div class="editEvents-searchBar">
                    <input type="text" name="eventName" id="eventName" placeholder="Enter Event Name" />
                    <button type="submit" class="editEvents-searchBtn" name="search">Search <i
                            class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        <table class="event-details">
            <?php
            if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($connection, (trim($_GET['eventName'])));
                $sql = "SELECT * FROM event WHERE EventName LIKE '%$search%';";
            } else {
                $sql = "SELECT * FROM event";
            }
            $result = $connection->query($sql);
            foreach ($header as $value) {
                printf("<th>%s</th>", $value);
            }
            printf("<th>Action</th>");
            while ($record = $result->fetch_object()) {
                printf(
                    "
                    <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <button id='edit'><a href='editEvent.php?id=$record->EventID'>Edit</a></button>
                            <button id='delete'><a href='deleteEvent.php?id=$record->EventID'>Delete</a></button>
                        </td>
                    </tr>"
                    , $record->EventID, $record->EventName, $record->EventDate, $record->EventTime, $record->EventVenue, $record->EventDesc
                );
            }
            ?>
        </table>
    </div>
    </div>
</body>

</html>