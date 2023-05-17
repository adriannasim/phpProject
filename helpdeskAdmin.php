<html>

<head>
    <meta charset="UTF-8">
    <title>Admin HelpDesk</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <?php include "adminHelper.php";
    include 'config/config.php';
    include "headerAdmin.php"; ?>
    <?php
    $header = array(
        'HelpID' => 'Enquiry ID',
        'HelpDate' => 'Date Enquired',
        'HelpTime' => 'Time Enquired',
        'HelpMsg' => 'Enquiry',
        'HelpReply' => 'Reply'
    );
    ?>
    <div class="helpdeskAdmin-header">
        <h1>Admin HelpDesk</h1>
    </div>
    <div class="helpdesk-view">
        <table class="helpdesk-view-table">
            <tr>
                <?php
                $sql = "SELECT * FROM helpdesk";
                foreach ($header as $value) {
                    printf("
                        <th>%s</th>
                         ", $value);
                }
                ?>
                <th>Action</th>
            </tr>
            <?php
            if ($result = $connection->query($sql)) {
                while ($record = $result->fetch_object()) {
                    printf("
                    <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td><button id='edit'><a href='helpdeskReply.php?id=$record->HelpID'>Reply</a></button></td>
                    </tr>", $record->HelpID, $record->HelpDate, $record->HelpTime, $record->HelpMsg, $record->HelpReply
                    );
                }
            }
            ?>  
        </table>

    </div>
</body>

</html>