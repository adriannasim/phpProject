<?php
session_start();
include("config/config.php");
$UserID = $_SESSION['UserID'];

if ($UserID == '') {
    header("location: index.php");
}
?>

<HTML>
  <head>
    <title>Feedback Form</title>
</head>

  <body>
    <?php
        include "headerUser.php";

        //query to retrieve user details based on UserID
        $sql = "SELECT name, email, tel FROM user WHERE UserID='$UserID'";
        $result = mysqli_query($connection, $sql);

        //check if query was successful
        if (mysqli_num_rows($result) == 1) {
            //fetch user details from result set
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $email = $row['email'];
            $tel = $row['tel'];
        } else {
            //handle error if no user found with UserID
            $name = '';
            $email = '';
            $tel = '';
        }
    ?>  

    <h1>Feedback Form</h1>
    <form action="" method="post">

    <fieldset class="feedbackUser"><b>
    Name: <?php echo $name; ?><br>
    Email: <?php echo $email; ?><br>
    Contact Number: <?php echo $tel; ?><br>
    </b></fieldset>
      <br>
      <br>
        Comment :<br>        
        <textarea rows="6" cols="50" name="commentfield"></textarea>

        <br>
        <br>
        <input type="submit" value="Submit Feedback">
        <input type="reset" value="Reset">
    </form>
    <?php include "footerUser.php"?>
  <body>  
</HTML>