<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Events</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include "headerAdmin.php"; ?>
        <div class="editEvents">
            <div class="editEvents-header">
                <h1>Search Event</h1>
            </div>
            <div class="editEvents-form">
                <form action="" method="post">
                    <table class="editEvents-searchBar" >
                        <tr>
                            <td class="editEvents-searchBar-label">Event Name:</td>
                            
                        </tr>
                        <tr>
                            <td class="editEvents-searchBar-input"><input type="text" name="eventName" placeholder="E.g Valorant" required/>
                            <td colspan="2" style="text-align:center;"><button type="submit" class="editEvents-searchBtn" name="search">Search <i class="fa fa-search"></i></button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>   
    </body>
</html>