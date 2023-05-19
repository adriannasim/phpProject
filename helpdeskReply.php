<?php
    session_start();
    include "config/config.php";
    include "adminHelper.php";
    $UserID = $_SESSION['UserID'];

    if ($UserID == '') {
        header("location: index.php");
    }
?>
<?php
    (isset($_GET["id"])) ? $id = $_GET["id"]: $id = "";

    $sql = "SELECT * FROM helpdesk WHERE HelpdeskID = '$id'";
    $result = $connection->query($sql);
    if ($record = $result->fetch_object()) {
        $id = $record->HelpdeskID;
        $subject = $record->Subject;
        $enquiry = $record->AskContent;
        $reply = $record->ReplyContent;
    }else {
        echo "<div class='error'>Record not found !<a href='eventEdit.php'>Back to Manage Events</a></div>";
        $hideForm = true;
    }
    if(!empty($_POST)){
        $reply = mysqli_real_escape_string($connection, trim($_POST["reply"]));
        $datetime = date('Y-m-d H:i:s');
        $sql = "UPDATE helpdesk SET ReplyContent = ?, ReplyDatetime = ? WHERE HelpdeskID = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $reply, $datetime, $id);
        if ($stmt->execute()) {
            echo "<div class='correct'>";
            printf("<p>
                    Reply Has Been Sent Successfully ! <a href='helpdeskAdmin.php'>Back to Manage Enquiries</a>
                    </p>");
            echo "</div>";
        }
    } 
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Helpdesk Reply</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include "headerAdmin.php";
    ?>
    <div class="reply-header">
        <h1>Enquiry Reply</h1>
    </div>
    <form action="" method="post">
            <div class="reply-form">
            <table class="reply-form-table">
                <tr>
                    <th>Enquiry ID : </th>
                    <td><?php echo $id;?></td>
                </tr>
                <tr>
                        <th class="txtarea-th">Subject : </th>
                        <td><?php echo htmlspecialchars($subject);?></td>
                    </tr>
                <tr>
                    <th class="txtarea-th">Enquiry : </th>
                    <td><?php echo htmlspecialchars($enquiry);?></td>
                </tr>
                <tr>
                    <th class="txtarea-th">Reply : </th>
                    <td><textarea name="reply" id="reply" required><?php echo htmlspecialchars($reply);?></textarea></td>
                </tr>
            </table>
                <div class="reply-form-btn">
                    <input type="button" value="Cancel" onclick="location = 'helpDeskAdmin.php'">
                    <input type="submit" value="Submit" name="reply-form-submit">
                </div>
            </div>
        </form>
</body>

</html>