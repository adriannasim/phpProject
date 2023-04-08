<!DOCTYPE html>
<html>
<head>
    <title>MLBB Tournament Registration Form</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/ticket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> 
    <?php include "headerUser.php"?>
    <br>
    <img src="img/ticket/b2.png" alt="MLBB" class="ticket-mlbb-image">
    <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;">MLBB Tournament - Grand Finale</h1>
    
    <br>
    <div class="ticket-mlbb-form">
    <form>
    <div class="ticket-mlbb-table">
    <h2><i>Contact Information</i></h2>
    <table>
        <tr>
            <td><label for="name"><i class="fa fa-user"><b> Full Name:</b></label></td>
            <td><input type="text" id="name" name="name" placeholder="Enter your name" size="50" style="height:30px" required></td>
        </tr>
        <tr>
            <td><label for="email"><i class="fa fa-envelope"><b> Email:</b></label></td>
            <td><input type="email" id="email" name="email" placeholder="Enter your email address" size="50" style="height:30px" required> <br><small>Format: example@example.com</small></td>
        </tr>
        <tr>
            <td><label for="phone"><i class="fa fa-phone"></i><b> Contact Number:</b></label></td>
            <td><input type="tel" id="phone" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="Enter your phone number" size="50" style="height:30px" required> <br><small>Format: 012-3456789</small></td>
        </tr>
    </table>
    <br>
    <h2><i>Choose your seat</i></h2>
    <img src="img/ticket/Ticket.png" alt="seat" class="ticket-mlbb-seat">
    
    <table>
        <tr>
            <td><label for="ticketType"><i class="fa fa-ticket"></i><b> Ticket type:</b></label></td>
            <td>
                <input type="radio" id="vip" name="ticketType" value="VIP" required>
                <label for="vip">VIP [ RM50 ]</label>
                <input type="radio" id="standard" name="ticketType" value="Standard">
                <label for="standard">Standard [ RM40 ]</label>
            </td>
        </tr>
        <tr>
            <td>
                <label for="row"><b>Row:</b></label>
                <select name="row" id="row" style="height:30px; width:100px;" required>
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
                <select name="column" id="column" style="height:30px; width:130px;" required>
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
    </table>
    
            <h2><i>Payment</i></h2>
            <label for="fname">Accepted Cards</label>
            
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
            
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
            
              
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              
            
          
    
    <input type="reset" value="Reset" class="ticket-reset">  
    <input type="submit" value="Register" class="ticket-register">
    </form>
    </div>
    </div>
    <br>
    <?php include "footerUser.php"?>  
</body>
</html>