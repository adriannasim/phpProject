<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Events</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
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
                            <td class="editEvents-searchBar-input"><input type="text" name="eventName" placeholder="Example: Valorant" required/>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;"><input type="submit" class="editEvents-searchBtn" name="search" value="Search"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>   
    </body>
</html>