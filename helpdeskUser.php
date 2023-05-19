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
        <title>HelpDesk</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "headerUser.php"; ?>
        <div class="helpUser">
            <div class="helpUser-header">
                <h1>Have any enquiries?</h1>
                <h4>Send us a message and we will get back to you ASAP</h4>
            </div>
            <div class="helpUser-form">
                <?php
                if(!empty($_POST)) {
                    $subject = mysqli_real_escape_string($connection, trim($_POST['subject']));
                    $msg = mysqli_real_escape_string($connection, trim($_POST['msg']));
                    $error = array();
                
                    if($msg == NULL) {
                        $error['msg'] = 'Please enter your message';
                    }

                    $datetime = date('Y-m-d H:i:s');
                    if((empty($error))) {
                        $sql = "INSERT INTO Helpdesk (UserID, AskDatetime, Subject, AskContent) VALUES ('$UserID','$datetime','$subject','$msg')";
                        $result = mysqli_query($connection, $sql);
                        if ($result) {
                            echo "<div class='helpUser-form-success'>";
                            printf("<p>
                                    Thank you for your message.<br/>We will get back to you as soon as possible.
                                    </p>");
                            echo "</div>";
                        }
                    } 
                }
                ?>
                <form action="" method="post">
                    <div class="helpUser-form-group">
                        <input type="text" name="subject" id="subject" placeholder="Subject" required/>
                    </div>
                    <div class="helpUser-form-group">
                        <textarea name="msg" id="msg" placeholder="Message" required></textarea>
                    </div>
                    <div class="helpUser-form-btn">
                    <input type="reset" value="Reset"/>
                        <input type="submit" value="Submit" name="helpUser-form-submit"/>
                    </div>
                </form>
            </div>
        </div>
        <?php include "footerUser.php"; ?>     
    </body>
</html>