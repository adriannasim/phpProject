<?php 
function checkInput(){
    global $name, $email, $msg, $nameErr, $emailErr, $msgErr;
    $error = false;
    $nameErr = $emailErr = $msgErr = "";

    if($name == NULL) {
        $nameErr = 'Please enter your name';
        $error = true;
    }

    if ($email == NULL) {
        $emailErr = 'Please enter your email';
        $error = true;
    } else if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $email)) {
        $emailErr = 'Please enter a valid email';
        $error = true;
    }

    if($msg == NULL) {
        $msgErr = 'Please enter your message';
        $error = true;
    }

    return $error;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HelpDesk</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="helpUser.js" defer></script>
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
                    $name = trim($_POST['name']);
                    $email = trim($_POST['email']);
                    $msg = trim($_POST['msg']);
                    $error = array();
                    $emailPattern = '/^[a-z][_a-z0-9-]+(\.[_a-z0-9-]+)*@([a-z0-9-]{2,})+(\.[a-z0-9-]{2,})*$/';
                    if($name == NULL) {
                        $error['name'] = 'Please enter your name';
                    }
                
                    if ($email == NULL) {
                        $error['email'] = 'Please enter your email';
                    } else if (!preg_match($emailPattern, $email)) {
                        $error['email'] = 'Please enter a valid email';
                    }
                
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
                        <input type="text" name="name" id="name" placeholder="Name"/>
                    </div>
                    <div class="helpUser-form-group">
                        <input type="email" name="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="helpUser-form-group">
                        <textarea name="msg" id="msg" placeholder="Message"></textarea>
                    </div>
                    <div class="helpUser-form-btn">
                        <input type="submit" value="Submit" name="helpUser-form-submit"/>
                    </div>
                </form>
            </div>
        </div>
        <?php include "footerUser.php"; ?>     
    </body>
</html>