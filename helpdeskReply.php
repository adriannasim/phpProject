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
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        (isset($_GET["id"])) ? $id = $_GET["id"]: $id = "";

        $sql = "SELECT * FROM helpdesk WHERE HelpdeskID = '$id'";
        $result = $connection->query($sql);
        if ($record = $result->fetch_object()) {
            $id = $record->HelpdeskID;
            $enquiry = $record->AskContent;
            $reply = $record->ReplyContent;
        }else {
            echo "<div class='error'>Record not found !<a href='eventEdit.php'>Back to Manage Events</a></div>";
            $hideForm = true;
        }
    }if(!empty($_POST)){
        $id = trim($_POST["id"]);
        $enquiry = trim($_POST["enquiry"]);
        $reply = trim($_POST["reply"]);
        $error = array();
        $error['reply'] = checkHelpdeskReply($reply);
        if (empty($error)) {
            $sql = "UPDATE helpdesk SET ReplyContent = ? WHERE HelpdeskID = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ss", $reply, $id);
            if ($stmt->execute()) {
                echo "<div class='correct'> Reply Has Been Sent Successfully ! <a href='helpdeskAdmin.php'>Back to Manage Enquiries</a></div>";
            }
        } else {
            echo '<ul class="error">';
            printf("<li>%s</li>", implode("<li></li>", $error));
            echo '</ul>';
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
    include "adminHelper.php";
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
                        <td><?php echo $id;?><input type="text" name="id" id="id" value="<?php echo $id;?>" hidden/></td>
                    </tr>
                    <tr>
                        <th class="txtarea-th">Enquiry : </th>
                        <td><?php echo htmlspecialchars($enquiry);?><textarea name="enquiry" id="enquiry" hidden><?php echo htmlspecialchars($enquiry);?></textarea></td>
                    </tr>
                    <tr>
                        <th class="txtarea-th">Reply : </th>
                        <td><textarea name="reply" id="reply"><?php echo htmlspecialchars($reply);?></textarea></td>
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