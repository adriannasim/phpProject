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
<div class="userAcc-header">
        <h1>User Profile</h1>
    </div>
    <?php
    include "config/config.php";
    include "adminHelper.php";
    include "headerUser.php";
    global $hideForm; 
    $sql = "SELECT * FROM user WHERE UserID = '$UserID'";
    if ($result = $connection -> query($sql)) {
        while($record = $result->fetch_object()) {
            $chkPsw = $record -> Password;
        }
    }
    if(isset($_POST["submit"])) {
        $oldPsw = $_POST["old-pw"];
        $newPsw = $_POST["new-pw"];
        $error = array(); 

        if ($chkPsw != $oldPsw) {
            echo "<script>alert('Old Password is incorrect. Please try again');
                        window.location = 'userAcc-chg-pw.php'</script>";
        } else {
            $error['psw'] = checkUserPsw($newPsw);
            $error = array_filter($error);
            if((empty($error))) {
                $sql1 = "UPDATE user SET Password = '$newPsw'";
                $result1 = mysqli_query($connection, $sql1);
                if ($result1) {
                    echo "<script>alert('Password changed.');
                        window.location = 'userAcc.php'</script>";
                }
            } else {
                echo "<div class='addEvent-form-error'>";
                printf("<p>
                        %s
                        </p>", implode("</p><p>",$error));
                echo "</div>";
            }
        }
    }
    ?>
    <div class="user-image">
        <?php if ($ProfilePic != ''): ?>
        <img src="data:image;base64,<?php echo $ProfilePic; ?>" width="200px"/>
        <?php endif ?>
        <?php if ($ProfilePic == ''): ?>
        <img src="img/login/user-icon.png" width="200px" />
        <?php endif ?>
    </div>
    <div class="user-info">
        <form method="post">
            <table class="user-info-pw-table">
                <tr>
                    <td><label for="user-id">User ID</label></td>
                    <td><?php echo $UserID?></td>
                </tr>
                <tr>
                    <td><label for="old-pw">Old Password</label></td>
                    <td><input type="text" name="old-pw"/></td>
                </tr>
                <tr>
                    <td><label for="new-pw">New Password</label></td>
                    <td><input type="text" name="new-pw" /></td>
                </tr>
                <tr class="user-manage-btn">
                    <td colspan="2"><a href="userAcc-chg-pw.php" id="userAcc-chg-pw-reset"><button type="reset">Reset</button></a>
                        <a href="" id="userAcc-chg-pw-submit"><button type="submit" name="submit">Submit</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php include "footerUser.php" ?>
</body>

</html>