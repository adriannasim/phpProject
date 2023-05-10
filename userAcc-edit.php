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
        <table class="user-info-edit-table">
            <tr>
                <td><label for="user-id">User ID</label></td>
                <td><input type="hidden" name="user-id" /></td>
            </tr>
            <tr>
                <td><label for="user-name">Name</label></td>
                <td><input type="text" name="user-name" /></td>
            </tr>
            <tr>
                <td><label for="user-email">Email</label></td>
                <td><input type="text" name="user-email" /></td>
            </tr>
            <tr>
                <td><label for="user-tel">Phone Number</label></td>
                <td><input type="text" name="user-tel" /></td>
            </tr>
            <tr  class="user-manage-btn">
                <td colspan="2"><a href="userAcc-edit.php?id=" id="user-manage-reset"><button>Reset</button></a>
                <a href="" id="user-manage-submit"><button>Submit</button></a></td>
            </tr>
        </table>

    </div>


    <?php include "footerUser.php" ?>
</body>

</html>