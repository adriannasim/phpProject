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
                <form action="" method="post">
                    <div class="helpUser-form-group">
                        <input type="text" name="name" id="name" placeholder="Name" required/>
                    </div>
                    <div class="helpUser-form-group">
                        <input type="email" name="email" id="email" placeholder="Email" required oninvalid="setCustomValidity('Please enter a valid email')"/>
                    </div>
                    <div class="helpUser-form-group">
                        <textarea name="message" id="message" placeholder="Message" required></textarea>
                    </div>
                    <div class="helpUser-form-btn">
                        <input type="submit" value="submit" name="helpUser-form-submit"/>
                    </div>
                </form>
            </div>
        </div>
        <?php include "footerUser.php"; ?>     
    </body>
</html>