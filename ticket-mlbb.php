<!DOCTYPE html>
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
            if (!empty($_POST)){
                $name=trim($_POST['name']);
                $email=trim($_POST['email']);
                $phone=trim($_POST['phone']);
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
                
                $error['name']=checkRegisterName($name);
                $error['email']=checkRegisterEmail($email);
                $error['phone']= checkRegisterPhone($phone);
                $error['ticketType']= checkTicketType($ticketType);
                $error['row']= checkRow($row);
                $error['column']= checkColumn($column);

                $error=array_filter($error);
                
                if(empty($error)){
                    /*
                    $con= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
                    $sql="INSERT INTO Ticket (name, email, phone, ticket_type, row, column) VALUES(?,?,?,?,?,?)";
                    $stmt=$con->prepare($sql);
                    $stmt->bind_param('ssssss',$name, $email, $phone, $ticketType, $row, $column);
                    $stmt->execute();
                    
                    if($stmt->affected_rows>0){
                        printf("<div class='info'>
                                Registration form for <b>%s</b> has been submitted.</div>",$name);
                    }else{
                        echo "<div class='error'>Unable to register.</div>";
                    }
                    
                    $con->close();
                    $stmt->close();
                    */
                }else {
                    echo "<ul class='error'>";
                    printf("<p>%s</p>", implode("<p></p>", $error));
                }
            }else{
                
            }
        ?>

        <form method="post">
            <div class="ticket-mlbb-contacttable">
                <h2><i>Contact Information</i></h2>
                <table>
                    <tr>
                        <td><label for="name"><i class="fa fa-user"><b> Full Name</b></label></td>
                        <td>: <input type="text" id="name" name="name" placeholder="Enter your name" size="50" style="height:30px" value="<?php echo (isset($name))?$name:'';?>"></td>
                    </tr>
                    <tr>
                        <td><label for="email"><i class="fa fa-envelope"><b> Email</b></label></td>
                        <td>: <input type="text" id="email" name="email" placeholder="Enter your email address" size="50" style="height:30px" value="<?php echo (isset($email))?$email:'';?>"> <br><small>Format: example@example.com</small></td>
                    </tr>
                    <tr>
                        <td><label for="phone"><i class="fa fa-phone"></i><b> Contact Number</b></label></td>
                        <td>: <input type="tel" id="phone" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="Enter your phone number" size="50" style="height:30px" value="<?php echo (isset($phone))?$phone:'';?>"> <br><small>Format: 012-3456789</small></td>
                    </tr>
                </table>
            </div>

            <br><hr><br>
            <h2><i>Choose your seat</i></h2>
            <img src="img\ticket\Ticket.png" alt="seat" class="ticket-mlbb-seat">
            <br>
            <div class="ticket-mlbb-seattable">
                <table>
                    <tr>
                        <td><label for="ticketType"><i class="fa fa-ticket"></i><b> Ticket type:</b></label></td>
                        <td>
                            <input type="radio" id="vip" name="ticketType" value="VIP" >
                            <label for="vip">VIP [ RM50 ]</label>
                            <input type="radio" id="standard" name="ticketType" value="Standard">
                            <label for="standard">Standard [ RM40 ]</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="row"><b>Row:</b></label>
                            <select name="row" id="row" style="height:30px; width:100px;" >
                                <option value="" disabled selected>Choose row</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                                <option value="f">F</option>
                                <option value="g">G</option>
                                <option value="h">H</option>
                                <option value="i">I</option>
                                <option value="j">J</option>
                            </select>
                        </td>
                        <td>
                            <label for="column"><b>Column:</b></label>
                            <select name="column" id="column" style="height:30px; width:130px;" >
                                <option value="" disabled selected>Choose column</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </td>
                    </tr>    
                </table>
            </div>
            <br>
            <input type="reset" value="Reset" class="ticket-reset">  
            <input type="submit" value="Pay Now" class="ticket-paynow">
        </form>
    </div>
    <br><br>
    <?php include "footerUser.php"?>  
</body>
</html>