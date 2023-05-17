<?php
session_start();
include "config/config.php";
$UserID = $_SESSION['UserID'];

if ($UserID == '') {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Account</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include "config/config.php";
    include "headerUser.php";
    global $hideForm;

    $sql = "SELECT * FROM user WHERE UserID = '$UserID'";
    if ($result = $connection->query($sql)) {
        while ($record = $result->fetch_object()) {
            $UserID = $record->UserID;
            $Name = $record->Name;
            $Email = $record->Email;
            $Tel = $record->Tel;
        }
    }
    ?>
    <div class="user-image">
        <img src="img/login/user-icon.png" width="200px" />
    </div>
    <div class="user-info">
        <table class="user-info-fgtpw-table">
            <tr>
                <td><label>User ID</label></td>
                <td>
                    <?php echo $UserID ?>
                </td>
            </tr>
            <tr>
                <td><label>Name</label></td>
                <td>
                    <?php echo $Name ?>
                </td>
            </tr>
            <tr>
                <td>Security Question</td>
                <td></td>
            </tr>
            <tr>
                <td><label>Security Answer</label></td>
                <td><input type="text" name="ans" placeholder=" Enter Your Answer"/></td>
            </tr>
            <tr class="user-manage-btn">
                    <td colspan="2"><a href="userAcc-fgt-pw.php" id="user-manage-reset"><button
                                type="reset">Reset</button></a>
                        <a href="" id="user-manage-submit"><button type="submit" name="submit">Submit</button></a>
                    </td>
                </tr>
        </table>

    </div>

    <?php include "footerUser.php" ?>
</body>

</html>