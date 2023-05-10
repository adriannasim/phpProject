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
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        (isset($_GET["id"])) ?
        $id = $_GET["id"]: $id = "";
                $sql = "DELETE FROM `event` WHERE EventID = '$id'";
                $result = mysqli_query($connection, $sql);
                if ($result) {
                    printf( "<div class='dltMsg'><p>The Event ( %s ) Has Been Deleted Successfully !
                    </p></div>", $id);
                } else {
                    die(mysqli_error($connection));
                }
    }
    ?>
    <div class="dlt-back-btn">
        <button type="button" name="back" onclick="location = 'eventEdit.php'">Back</button>
        <button type="button" name="add-event" onclick="location = 'eventAdd.php'">Add Events</button>
    </div>
</body>
</html>