<?php
    session_start();
    include "config/config.php";
    $UserID = $_SESSION['UserID'];

    if ($UserID == '') {
        header("location: index.php");
    }

    // Handle feedback deletion
    if (isset($_GET['delete_name']) && isset($_GET['delete_comment'])) {
        $deleteName = $_GET['delete_name'];
        $deleteComment = $_GET['delete_comment'];
        $deleteQuery = "DELETE FROM feedback WHERE Name = '$deleteName' AND Comment = '$deleteComment'";
        mysqli_query($connection, $deleteQuery);
        header("location: feedbackAdmin.php");
    }
?>

<html>
<head>
    <title>User Feedback</title>
    <link rel="stylesheet" href="css/feedback.css">
</head>

<body>
    <?php include "headerAdmin.php"; ?>
    <br><br>

    <div class="feedbackTable">
        <table>
            <tr>
                <th>Name</th>
                <th>Stars rated</th>
                <th>Recommendation Points</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>

            <?php
                // Retrieve user feedback from the database
                $query = "SELECT Name, Stars, RecPoints, Comment FROM feedback";
                $result = mysqli_query($connection, $query);

                // Check if there are any feedback records
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['Name']."</td>";
                        echo "<td>".$row['Stars']." &#9733;</td>";
                        echo "<td>".$row['RecPoints']."</td>";
                        echo "<td>".$row['Comment']."</td>";
                        echo "<td><a class='deleteButton' href='feedbackAdmin.php?delete_name=".urlencode($row['Name'])."&delete_comment=".urlencode($row['Comment'])."'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No feedback records found.</td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>

