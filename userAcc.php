<?php
    session_start();
    include ("config/config.php");
    $UserID = "adrianna";
    //$UserID = $_SESSION['UserID'];
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
    if ($result = $connection -> query($sql)) {
        while($record = $result->fetch_object()) {
            $UserID = $record -> UserID;
            $Name = $record -> Name;
            $Email = $record -> Email;
            $Tel = $record -> Tel;
        }
    }
    ?>
    <div class="user-image">
        <img src="img/login/user-icon.png" width="200px" />
    </div>
    <div class="user-info">
        <table class="user-info-table">
            <tr>
                <td><label>User ID</label></td>
                <td><?php echo $UserID?></td>
            </tr>
            <tr>
                <td><label>Name</label></td>
                <td><?php echo $Name?></td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td><?php echo $Email?></td>
            </tr>
            <tr>
                <td><label>Phone Number</label></td>
                <td><?php echo $Tel?></td>
            </tr>
            <tr class="user-manage-btn">
                <td colspan="2"><a href="userAcc-edit.php" id="edit-profile-btn"><button>Edit Profile</button></a>
                    <a href="userAcc-chg-pw.php" id="chg-pw-btn"><button>Change Password</button></a>
                </td>
            </tr>
        </table>

    </div>

    <?php include "footerUser.php" ?>
</body>

</html>