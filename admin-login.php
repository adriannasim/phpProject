<?php
    session_start();
    include ("config/config.php");
    if(isset($_POST["submit"])) {
        $UserID = $_POST["admin-login_txt"];
        $UserPassword = $_POST["password_txt"];

        $sqlLogin = "SELECT * FROM admin WHERE UserID = '$UserID' AND Password = '$UserPassword'";
        $result = mysqli_query($connection, $sqlLogin);
        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION["UserID"] = $UserID;
            header("Location: homepage.php");
        }
    }
    else {
        echo "<script>alert('Incorrect USERNAME or PASSWORD. Please try again');
            window.location = 'admin-login.php'</script>";
    }
?>

<!DOCTYPE html>
    <meta charset="UFT-8">
    <link href="css/games.css" rel="stylesheet" type="text/css"/>
    <body>
    <header>
        <h1>Admin login</h1>
    </header>
    <main>
    <form id="login_form" class="form_class" method="post">
        <div class="form_div">
            <label>Login:</label>
            <input class="field_class" name="admin-login_txt" type="text" placeholder="Enter ID" required>
            <label>Password:</label>
            <input id="pass" class="field_class" name="password_txt" type="password" placeholder="Enter password" required>
            <button class="submit_class" type="submit" name="login_btn">Enter</button>
        </div>
        <div class="info_div">
            <p>Don't have an account? <a href="register/reg-form.php">Register Here!</a></p>
        </div>
    </form>
</main>
        
  
</<body>

</<html>
   
    