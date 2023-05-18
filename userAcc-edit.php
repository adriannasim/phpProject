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
    if ($result = $connection->query($sql)) {
        while ($record = $result->fetch_object()) {
            $UserID = $record->UserID;
            $Name = $record->Name;
            $Email = $record->Email;
            $TelNo = $record->Tel;
        }
    }
    if (isset($_POST["submit"])) {
        $Name = $_POST["name"];
        $Email = $_POST["email"];
        $TelNo = $_POST["tel"];
        $error = array();

        $error['name'] = checkUserName($Name);
        $error['email'] = checkUserEmail($Email);
        $error['tel'] = checkUserTel($TelNo);
        $error = array_filter($error);

        if ((empty($error))) {
            if ($_FILES["profile-pic"]["error"] == UPLOAD_ERR_OK) {
                $temp_name = $_FILES["profile-pic"]["tmp_name"];
                $file_data = base64_encode(file_get_contents(addslashes($temp_name)));

                $sql1 = "UPDATE user SET Name = '$Name', Email = '$Email', Tel = '$TelNo', ProfilePic = '$file_data' WHERE UserID = '$UserID'";
                $stmt = $connection->prepare($sql1);
                if($stmt->execute()) {
                    echo "<script>alert('Info and profile picture updated.');
                            window.location = 'userAcc.php'</script>";
                } else {
                    echo "<script>alert('Error in uploading file. Please try again.');
                            window.location = 'userAcc.php'</script>";
                }
                $stmt->close();
            } else if ($_FILES["profile-pic"] == '') {
                $sql1 = "UPDATE user SET Name = '$Name', Email = '$Email', Tel = '$TelNo' WHERE UserID = '$UserID'";
                $result1 = mysqli_query($connection, $sql1);
                if ($result1) {
                    echo "<script>alert('Info updated.');
                        window.location = 'userAcc.php'</script>";
                }
            } else {
                echo "<script>File upload error: " . $_FILES["profile-pic"]["error"] . "</script>";
            }
        } else {
            echo "<div class='addEvent-form-error'>";
            printf("<p>
                    %s
                    </p>", implode("</p><p>", $error));
            echo "</div>";
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
        <form method="post" enctype="multipart/form-data">
            <table class="user-info-edit-table">
                <div class="add-profile-pic">
                    <tr>
                        <td colspan="2"><label for="profile-pic">Edit Photo</label>
                        <input type="file" name="profile-pic" id="add-pro-pic-btn"></td>
                    </tr>
                </div>
                <tr>
                    <td><label for="user-id">User ID</label></td>
                    <td>
                        <?php echo $UserID ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="name">Name</label></td>
                    <td><input type="text" name="name" value="<?php echo $Name ?>" /></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="text" name="email" value="<?php echo $Email ?>" /></td>
                </tr>
                <tr>
                    <td><label for="tel">Phone Number</label></td>
                    <td><input type="text" name="tel" value="<?php echo $TelNo ?>" /></td>
                </tr>
                <tr class="user-manage-btn">
                    <td colspan="2"><a href="userAcc-edit.php" id="user-manage-reset"><button
                                type="reset">Reset</button></a>
                        <button type="submit" name="submit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>


    <?php include "footerUser.php" ?>
</body>

</html>