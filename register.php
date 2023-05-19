<?php
    session_start();
    include ("config/config.php");
    include ("adminHelper.php");
    if(isset($_POST["register"])) {
        $UserID = $_POST["registerID"];
        $Name = $_POST["registerName"];
        $Email = $_POST["registerEmail"];
        $TelNo = $_POST["registerTel"];
        $Password = $_POST["password_txt"];
        $Question = $_POST["question_txt"];
        $error = array(); 

        $sqlCheck = "SELECT * FROM user WHERE UserID = '$UserID'";
        $result = mysqli_query($connection, $sqlCheck);
        if (mysqli_num_rows($result) == 1) {
            $chkID = $UserID;
        } 
        else {
            $chkID = "";
        }
        $error['id'] = checkUserID($UserID, $chkID);
        $error['name'] = checkUserName($Name);
        $error['email'] = checkUserEmail($Email);
        $error['tel'] = checkUserTel($TelNo);
        $error['psw'] = checkUserPsw($Password);
        $error['ques'] = checkUserQues($Question);
        $error = array_filter($error); 
        if((empty($error))) {
            $sqlReg = "INSERT INTO user (UserID, Password, Name, Email, Tel, Ques)
                VALUES ('$UserID', '$Password', '$Name', '$Email', '$TelNo', '$Question')";
            $result = mysqli_query($connection, $sqlReg);
            if ($result) {
                echo "<script>alert('Registration successful.');
                    window.location = 'index.php'</script>";
            }
        } else {
                echo "<div class='addEvent-form-error' style=";
                echo "'color:white';";
                printf("<p>
                        %s
                        </p>", implode("</p><p>",$error));
                echo "</div>";
        }
    }
?>

<!DOCTYPE html>
    <meta charset="UFT-8">
    <link href="css/games.css" rel="stylesheet" type="text/css"/>
    <body>
    <header>
        <h1>Registration</h1>
    </header>
    <main>
    <form id="login_form" class="form_class" method="post">
        <div class="form_div">
            <label>UserID:</label>
            <input class="field_class" name="registerID" type="text" placeholder="Enter UserID">
            <label>Name:</label>
            <input class="field_class" name="registerName" type="text" placeholder="Enter Name">
            <label>Email:</label>
            <input class="field_class" name="registerEmail" type="text" placeholder="Enter Email">
            <label>Tel No:</label>
            <input class="field_class" name="registerTel" type="text" placeholder="Enter TelNo Eg. 012-3456789">
            <label>Create a password:</label>
            <input id="pass" class="field_class" name="password_txt" type="password" placeholder="Create a password">
            <label>Security Question: What is your favourite animal?</label>
            <input id="ques" class="field_class" name="question_txt" type="text" placeholder="Enter your security question answer">
            <button class="submit_class" type="submit" name="register">Enter</button>
    </form>
</main>
</body>
</html>
   
    
