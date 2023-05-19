<?php
session_start();
include "config/config.php";
include "adminHelper.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="fgtpsw-heading">
        <h1>Password Recovery</h1>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $UserID = $_POST["id"];
        $Question = $_POST["ques"];
        $Password = $_POST["psw"];
        $error = array();

        $error['psw'] = checkUserPsw($Password);
        $error = array_filter($error);

        $sqlCheck = "SELECT Ques FROM user WHERE UserID = '$UserID'";
        $result = mysqli_query($connection, $sqlCheck);
        if (mysqli_num_rows($result) == 1) {
            while ($record = $result->fetch_object()) {
                if (($record->Ques) == $Question) {
                    if ((!empty($error))) {
                        echo "<div class='addEvent-form-error'>";
                        printf("<p>
                                %s
                                </p>", implode("</p><p>", $error));
                        echo "</div>";
                    } else {
                        $sql = "UPDATE user SET Password = '$Password' WHERE UserID = '$UserID'";
                        $result1 = mysqli_query($connection, $sql);
                        if ($result1) {
                            echo "<script>alert('Password changed.');
                                window.location = 'index.php'</script>";
                        }
                    }
                } else {
                    echo "<script>alert('Wrong security question answer. Please create a new account and contact support.');
                    window.location = 'fgtpsw.php'</script>";
                }
            }
        } else {
            echo "<script>alert('UserID does not exists. Please try again.');
                    window.location = 'fgtpsw.php'</script>";
        }
    }
    ?>
    <div class="user-info">
        <form method="post">
            <table class="user-fgtpsw-table">
                <tr>
                    <td><label for="user-id">User ID</label></td>
                    <td><input type="text" name="id" required /></td>
                </tr>
                <tr>
                    <td><label for="ques">Security Question: What is your favourite animal?</label></td>
                    <td><input type="text" name="ques" required /></td>
                </tr>
                <tr>
                    <td><label for="psw">New Password</label></td>
                    <td><input type="password" name="psw" required /></td>
                </tr>
                <tr class="user-manage-btn">
                    <td colspan="2">
                        <button type="submit" name="submit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>