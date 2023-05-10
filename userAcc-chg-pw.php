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
    global $hideForm; ?>
    <div class="user-image">
        <img src="img/login/user-icon.png" width="200px" />
    </div>
    <div class="user-info">
        <table class="user-info-table">
            <tr>
                <td><label for="user-id">User ID</label></td>
                <td><input type="hidden" name="user-id" /></td>
            </tr>
            <tr>
                <td><label for="user-pw">User Password</label></td>
                <td><input type="text" name="user-pw" /></td>
            </tr>
            <tr>
                <td><label for="new-user-pw">New Password</label></td>
                <td><input type="text" name="new-user-pw" /></td>
            </tr>
            <tr class="user-manage-btn">
                <td colspan="2"><a href="userAcc-chg-pw.php?id=" id="userAcc-chg-pw-reset"><button>Reset</button></a>
                    <a href="" id="userAcc-chg-pw-submit"><button>Submit</button></a>
                </td>
            </tr>
        </table>
    </div>
    <?php include "footerUser.php" ?>
</body>

</html>