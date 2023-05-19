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
        'HelpdeskID' => 'Enquiry ID',
        'AskDatetime' => 'Date/Time Enquired',
        'ReplyDatetime' => 'Date/Time Replied',
        'AskContent' => 'Enquiry',
        'ReplyContent' => 'Reply'
    );
    $header2 = array(
        'HelpdeskID' => 'Enquiry ID',
        'AskDatetime' => 'Date/Time Enquired',
        'AskContent' => 'Enquiry'
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
                    printf(
                        "
                    <tr>
                        <td class='help-id'>%s</td>
                        <td class='help-time'>%s</td>
                        <td class='help-time'>%s</td>
                        <td class='content'>%s</td>
                        <td class='content'>%s</td>
                        <td><button id='edit'><a href='helpdeskReply.php?id=$record->HelpdeskID'>Reply</a></button></td>
                    </tr>", $record->HelpdeskID, $record->AskDatetime, $record->ReplyDatetime, $record->AskContent, $record->ReplyContent
                    );
                }
            }
            ?>
        </table>
        <table class="helpdesk-view-table">
            <tr>
                <?php
                $sql = "SELECT * FROM helpdesk";
                foreach ($header2 as $value) {
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
                    printf(
                        "
                    <tr>
                        <td class='help-id'>%s</td>
                        <td class='help-time2'>%s</td>
                        <td class='content2'>%s</td>
                        <td><button id='edit'><a href='helpdeskReply.php?id=$record->HelpdeskID'>Reply</a></button></td>
                    </tr>", $record->HelpdeskID, $record->AskDatetime, $record->AskContent
                    );
                }
            }
            ?>
        </table>

    </div>
</body>

</html>