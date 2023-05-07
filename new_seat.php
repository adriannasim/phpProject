<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style></style>
    <title>Add event seat</title>
</head>

<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "esport");
?>

<body>
    <?php
    include "headerAdmin.php"
        ?>
    <h1>Create event seat</h1>
    <?php
    //create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Get data from database
    $sql = "SELECT * FROM event GROUP BY EventName";
    $result = $conn->query($sql);
    ?>
    <div class="event">
        <form action="" method="POST">
            <label for="event">Choose an event:</label>
            <select name="event" id="event">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?php echo $row['EventID']; ?>"><?php echo $row['EventName']; ?></option>
                <?php } ?>
            </select>
            <label for="amount">Choose amount of seat:<label>
                <select name="amount" id="amount">
                    <option value=""
            <input type="submit" value="Submit">
        </form>

</body>

</html>