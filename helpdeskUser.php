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
                    $msg = trim($_POST['msg']);
                    $error = array();
                
                    if($msg == NULL) {
                        $error['msg'] = 'Please enter your message';
                    }

                    if((empty($error))) {
                        echo "<div class='helpUser-form-success'>";
                        printf("<p>
                                Thank you for your message.<br/>We will get back to you as soon as possible.
                                </p>");
                        echo "</div>";
                    } else {
                        echo "<div class='helpUser-form-error'>";
                        printf("<p>
                                %s
                                </p>", implode("</p><p>",$error));
                        echo "</div>";
                    }
                } else {
                    
                }
                ?>
                <form action="" method="post">
                    <div class="helpUser-form-group">
                        <input type="text" name="subject" id="subject" placeholder="Subject"/>
                    </div>
                    <div class="helpUser-form-group">
                        <textarea name="msg" id="msg" placeholder="Message"></textarea>
                    </div>
                    <div class="helpUser-form-btn">
                    <input type="reset" value="Reset" name="helpUser-form-reset" onclick="location='helpDeskUser.php'"/>
                        <input type="submit" value="Submit" name="helpUser-form-submit"/>
                    </div>
                </form>
            </div>
        </div>
        <?php include "footerUser.php"; ?>     
    </body>
</html>