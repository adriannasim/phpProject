<?php
session_start();
include("config/config.php");
$UserID = $_SESSION['UserID'];

if ($UserID == '') {
    header("location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted form data
    $overallExperience = $_POST['starrating'];
    $recommendationRating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Query to retrieve user details based on UserID
    $userQuery = "SELECT name, email, tel FROM user WHERE UserID='$UserID'";
    $userResult = mysqli_query($connection, $userQuery);

    // Check if query was successful
    if (mysqli_num_rows($userResult) == 1) {
        // Fetch user details from result set
        $userRow = mysqli_fetch_assoc($userResult);
        $name = $userRow['name'];
        $email = $userRow['email'];
        $tel = $userRow['tel'];

        // Query to insert the feedback into the database
        $sql = "INSERT INTO feedback (Name, Stars, RecPoints, Comment) VALUES (?, ?, ?, ?)";
        $statement = $connection->prepare($sql);
        $statement->bind_param("siss", $name, $overallExperience, $recommendationRating, $comment);
        $result = $statement->execute();

        if ($result) {
            // Feedback inserted successfully
            $feedbackID = $statement->insert_id;
        } else {
            // Handle database insertion error
            echo "Failed to insert feedback into the database.";
            exit(); // Add an exit statement to stop script execution
        }
    } else {
        // Handle error if no user found with UserID
        $name = '';
        $email = '';
        $tel = '';
    }
} else {
    header("location: index.php");
    exit(); 
}
?>

<HTML>
<head>
    <title>Feedback Form</title>
    <link rel="stylesheet" href="css/feedback.css">
</head>
<body>
    <?php
        include "headerUser.php";
    ?>
    <br><br>
    <div class="feedback">
        <h4 style="text-align:center;">Feedback has been submitted.</h4>
        <br>
            <?php
            echo "Name: ". $name . "<br><br>";
            echo "Email: ". $email . "<br><br>";       
            echo "Contact: ". $tel . "<br><br>";
            echo "Overall Experience: " . $overallExperience . " &#9733;<br><br>";
            echo "Recommendation Points: " . $recommendationRating . "<br><br>";
            echo "Comment: " . $comment . "<br><br>";
            ?>
         <div class="center-button">   
         <a href="eventUser.php"><button type="button" class="backHome">Back to homepage</button></a>
        </div>
    </div>
    <br>
    <?php include "footerUser.php"?>
</body>
</html>