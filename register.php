<?php
    session_start();
    include ("config/config.php");
    if(isset($_POST["submit"])) {
        $UserID = $_POST["registerID"];
        $Name = $_POST["registerName"];
        $Email = $_POST["registerEmail"];
        $TelNo = $_POST["registerTel"];
        $Password = $_POST["password_txt"];

        $sqlCheck = "SELECT * FROM user WHERE UserID = '$UserID'";
        $result = mysqli_query($connection, $sqlCheck);
        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('UserID is already in used. Please try another one.');
                window.location = 'register.php'</script>";
        } 
        else {
            $sqlReg = "INSERT INTO user (UserID, PaymentID, Password, Name, Email, Tel)
                VALUES ('$UserID', NULL, '$Password', '$Name', '$Email', '$TelNo')";
            $result = mysqli_query($connection, $sqlReg);
            if ($result) {
                echo "<script>alert('Registration successful.');
                    window.location = 'login.php'</script>";
            }
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
            <input class="field_class" name="registerID" type="text" placeholder="Enter UserID" required>
            <label>Name:</label>
            <input class="field_class" name="registerName" type="text" placeholder="Enter Name" required>
            <label>Email:</label>
            <input class="field_class" name="registerEmail" type="text" placeholder="Enter Email" required>
            <label>Tel No:</label>
            <input class="field_class" name="registerTel" type="text" placeholder="Enter TelNo." required>
            <label>Create a password:</label>
            <input id="pass" class="field_class" name="password_txt" type="password" placeholder="Create a password" required>
            <button class="submit_class" type="submit" name="login_btn">Enter</button>
    </form>
</main>
</body>
</html>
   
    
