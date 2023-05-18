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
        <title>E-sports Events</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link href="css/event.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <?php include "headerUser.php";
        $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
        $sql = "SELECT * FROM event ORDER BY EventDate $order";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $i = 0;
            while($record = $result->fetch_object()) {
                $EventID[$i] = $record->EventID; 
                $EventName[$i] = $record->EventName; 
                $EventDate[$i] = DateTime::createFromFormat('Y-m-d', $record->EventDate); 
                $EventDate[$i] = DATE_FORMAT($EventDate[$i], 'd-M-Y');
                $EventTime[$i] = DateTime::createFromFormat('H:i:s', $record->EventTime); 
                $EventTime[$i] = DATE_FORMAT($EventTime[$i], 'h:i A');
                $EventVenue[$i] = $record->EventVenue; 
                $EventDesc[$i] = $record->EventDesc;
                $i++;
            }  
        } 
        ?>
        <div class="ebanner">
            <figure>
                <a href="homepage.php"><img src="img/event/b1.png" id="b1"></a>
                <?php
                for ($j = 0; $j < count($EventID); $j++) {
                    printf("<a href='#%s'><img src='img/event/%s.png' id='%s'></a>", $EventID[$j], $EventID[$j], $EventID[$j]);
                }
                ?>
                <a href="ticket.php"><img src="img/event/b5.png" id="b5"></a>
                <img src="img/event/b6.png" id="b6"/>
                <a href="merch.php"><img src="img/merch/merch-banner.png" alt="alt" id="b7"/></a>
                <img src="img/event/b1.png" id="b1"/>
            </figure>
        </div>
        <h1>Events</h1>
        <div class="browseEvent">
            <div class="searchEvent">
                <form action="" method="get">
                    <input type="text" name="searchBox" placeholder="Browse for Events"/>
                    <button type="submit" name="search" class="searchbtn">Search  <i class="fa fa-search"></i></button>
                    <div class="event-sort">
                        <label for="sort-btn">Sort By Date :  </label>
                        <input type="button" id="sort-latest" value="Latest ⬇"/>
                        <input type="button" id="sort-oldest" value="Oldest ⬆"/>
                    </div>
                </form>
            </div>
        </div>
        <div class="events">
            <?php
            if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($connection, (trim($_GET['searchBox'])));
                $sqlSearch = "SELECT EventName FROM event WHERE EventName LIKE '%$search%'";
                $searchResult = $connection->query($sqlSearch);
                while ($searchRecord = $searchResult->fetch_object()) {
                    for ($j = 0; $j < count($EventID); $j++) {
                        if (strcmp($EventName[$j], $searchRecord->EventName) == 0) {
                            printf("
                            <div class='event-card' style='margin-top:-800px; margin-bottom:1000px;'>
                                <div class='event-front'>
                                    <img src='img/event/%s.png' width='100%%'>
                                    <h2>%s</h2>
                                    <img src='img/event/%s-2.png' width='100%%'>
                                </div>
                                <div class='event-back'>
                                    <h2>%s</h2>
                                    <div class='event-details'>
                                        <div class='event-desc'>
                                            <img src='img/event/%s-1.jpg'>
                                            <p>%s</p>
                                        </div>
                                        <div class='event-date'>
                                            <p> Date  : %s<br>
                                                Time  : %s<br>
                                                Venue : %s<br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class='event-btn'>
                                        <a href='newticket.php?id=%s'><button class='book'>Book Now</button></a>
                                    </div>
                                </div>
                            </div>
                            ", $EventID[$j], $EventName[$j], $EventID[$j], $EventName[$j], $EventID[$j], $EventDesc[$j], $EventDate[$j], $EventTime[$j], $EventVenue[$j], $EventID[$j]);
                        }
                    }
                }
            } else {
                for ($j = 0; $j < count($EventID); $j++) {
                    printf("
                    <div class='event-card'>
                        <div class='event-front'>
                            <img src='img/event/%s.png' width='100%%'>
                            <h2>%s</h2>
                            <img src='img/event/%s-2.png' width='100%%'>
                        </div>
                        <div class='event-back'>
                            <h2>%s</h2>
                            <div class='event-details'>
                                <div class='event-desc'>
                                    <img src='img/event/%s-1.jpg'>
                                    <p>%s</p>
                                </div>
                                <div class='event-date'>
                                    <p> Date  : %s<br>
                                        Time  : %s<br>
                                        Venue : %s<br>
                                    </p>
                                </div>
                            </div>
                            <div class='event-btn'>
                                <a href='newticket.php?id=%s'><button class='book'>Book Now</button></a>
                            </div>
                        </div>
                    </div>
                    ", $EventID[$j], $EventName[$j], $EventID[$j], $EventName[$j], $EventID[$j], htmlspecialchars($EventDesc[$j]), $EventDate[$j], $EventTime[$j], $EventVenue[$j], $EventID[$j]);
                }
            }
            ?>
    
        </div> 
        <?php include "footerUser.php"; ?>
        <script>
            $(document).ready(function() {
                $('#sort-latest').click(function() {
                    var order = 'desc';
                    
                    $.ajax({
                        url: 'eventUser.php',
                        type: 'GET',
                        data: {
                            order: order
                        },
                        success: function(response) {
                            $('.events').parent().html(response);
                        }
                    });
                });
                
                $('#sort-oldest').click(function() {
                    var order = 'asc';
                    
                    $.ajax({
                        url: 'eventUser.php',
                        type: 'GET',
                        data: {
                            order: order
                        },
                        success: function(response) {
                            $('.events').parent().html(response);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
