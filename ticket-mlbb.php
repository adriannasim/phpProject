<?php
session_start();
include("config/config.php");
$UserID = "adrianna";
//$UserID = $_SESSION['UserID'];
?>
<html>
<head>
    <title>MLBB Tournament Registration Form</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/ticket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> 

    <?php
        include "headerUser.php";
        require_once 'ticket-helper.php';
    ?>

    <img src="img/ticket/b2.png" alt="MLBB" class="ticket-mlbb-image">
    <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;">MLBB Tournament - Grand Finale</h1>
    <br>
    <div class="ticket-mlbb-form">
    <?php 
        $error = array();

        if (!empty($_POST)) {
            if(isset($_POST['ticketType'])){
                $ticketType=trim($_POST['ticketType']);
            }else{
                $ticketType="";
            }
            if(isset($_POST['row'])){
                $row=trim($_POST['row']);
            }else{
                $row="";
            }
            if(isset($_POST['column'])){
                $column=trim($_POST['column']);
            }else{
                $column="";
            }
            $error['ticketType']= checkTicketType($ticketType);
            $error['row']= checkRow($row);
            $error['column']= checkColumn($column);                
        } 

        $formSubmitted = !empty($_POST);

        $hasErrors = false;
        foreach ($error as $errorMessage) {
            if (!empty($errorMessage)) {
                $hasErrors = true;
                break;
        }
    }    

    if(!$hasErrors && !empty($_POST)){
                    
        printf("<div class='ticket-success'>Registration form has been submitted. <a href='ticket-payment.php'>Add to cart</a></div>");
                    
    }else {
        if ($formSubmitted) {
        echo "<ul class='ticket-error'>";
        printf("<p>%s</p>", implode("<p></p>", $error));
        echo "</ul>";
        }
    }
                    
    ?>
    <?php

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
    <div class="ticket-mlbb-contacttable">
    <h2><i>Contact Information</i></h2>
    <fieldset class="mlbb"><b>
    Name: <?php echo $name; ?><br>
    Email: <?php echo $email; ?><br>
    Contact: <?php echo $tel; ?><br>
</b></fieldset>
</div>

            <form method="post" action="">
            <br><hr><br>
            <h2><i>Choose your seat</i></h2>
            <img src="img\ticket\Ticket.png" alt="seat" class="ticket-mlbb-seat">
            <br>
            
            <div class="ticket-mlbb-seattable">
                <table>
                    <tr>
                        <td><label for="ticketType"><i class="fa fa-ticket"></i><b> Ticket type:</b></label></td>
                        <td>
                            
                            <input type="radio" id="vip" name="ticketType" value="VIP" <?php if (isset($_POST['ticketType']) && $_POST['ticketType']=="VIP") echo "checked";?>>
                            <label for="vip">VIP [ RM40 ]</label>
                            <input type="radio" id="standard" name="ticketType" value="Standard"<?php if (isset($_POST['ticketType']) && $_POST['ticketType']=="Standard") echo "checked";?>  >
                            <label for="standard">Standard [ RM20 ]</label>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="row"><b>Row:</b></label>
                            
                            <select name="row" id="row" style="height:30px; width:100px;" >
                                <option value="" disabled selected>Choose row</option>
                                <option value="a" <?php if (isset($_POST['row']) && $_POST['row']=="a") echo "selected";?>>A</option>
                                <option value="b" <?php if (isset($_POST['row']) && $_POST['row']=="b") echo "selected";?>>B</option>
                                <option value="c" <?php if (isset($_POST['row']) && $_POST['row']=="c") echo "selected";?>>C</option>
                                <option value="d" <?php if (isset($_POST['row']) && $_POST['row']=="d") echo "selected";?>>D</option>
                                <option value="e" <?php if (isset($_POST['row']) && $_POST['row']=="e") echo "selected";?>>E</option>
                                <option value="f" <?php if (isset($_POST['row']) && $_POST['row']=="f") echo "selected";?>>F</option>
                                <option value="g" <?php if (isset($_POST['row']) && $_POST['row']=="g") echo "selected";?>>G</option>
                                <option value="h" <?php if (isset($_POST['row']) && $_POST['row']=="h") echo "selected";?>>H</option>
                                <option value="i" <?php if (isset($_POST['row']) && $_POST['row']=="i") echo "selected";?>>I</option>
                                <option value="j" <?php if (isset($_POST['row']) && $_POST['row']=="j") echo "selected";?>>J</option>
                            </select>
                        </td>
                        <td>
                            <label for="column"><b>Column:</b></label>
                            <select name="column" id="column" style="height:30px; width:130px;" value="<?php echo (isset($column))? $column: "";?>">
                                <option value="" disabled selected>Choose column</option>
                                <option value="1" <?php if (isset($_POST['column']) && $_POST['column']=="1") echo "selected";?>>1</option>
                                <option value="2" <?php if (isset($_POST['column']) && $_POST['column']=="2") echo "selected";?>>2</option>
                                <option value="3" <?php if (isset($_POST['column']) && $_POST['column']=="3") echo "selected";?>>3</option>
                                <option value="4" <?php if (isset($_POST['column']) && $_POST['column']=="4") echo "selected";?>>4</option>
                                <option value="5" <?php if (isset($_POST['column']) && $_POST['column']=="5") echo "selected";?>>5</option>
                                <option value="6" <?php if (isset($_POST['column']) && $_POST['column']=="6") echo "selected";?>>6</option>
                                <option value="7" <?php if (isset($_POST['column']) && $_POST['column']=="7") echo "selected";?>>7</option>
                                <option value="8" <?php if (isset($_POST['column']) && $_POST['column']=="8") echo "selected";?>>8</option>
                                <option value="9" <?php if (isset($_POST['column']) && $_POST['column']=="9") echo "selected";?>>9</option>
                                <option value="10" <?php if (isset($_POST['column']) && $_POST['column']=="10") echo "selected";?>>10</option>
                                <option value="11" <?php if (isset($_POST['column']) && $_POST['column']=="11") echo "selected";?>>11</option>
                                <option value="12" <?php if (isset($_POST['column']) && $_POST['column']=="12") echo "selected";?>>12</option>
                            </select>
                        </td>
                    </tr>    
                </table>
            </div>
            <br>
            <input type="button" value="Reset" class="ticket-reset" onclick="location='ticket-mlbb.php'">  
            <input type="submit" value="Submit" class="ticket-paynow" >
        </form>
        
        </div>
    <br><br>
    <?php include "footerUser.php"?>  
    
</body>
</html>