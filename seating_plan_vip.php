<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>seating_plan</title>
        <link href="css/event_ticket.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "headerAdmin.php"?>
        <h1>Seating Plan</h1>
        <div class="screenNplayer"> 
            <table>
                <tr>
                    <td colspan="14">
                        Screen
                    </td>
                </tr>
                <tr>
                    <th>Player1</th>
                    <th>Player2</th>
                    <th>Player3</th>
                    <th>Player4</th>
                    <th>Player5</th>
                    <th>Empty</th>
                    <th>Player6</th>
                    <th>Player7</th>
                    <th>Player8</th>
                    <th>Player9</th>
                    <th>Player10</th>
                </tr>
            </table>
        </div>
        <div class="seating-plan">

            <table>
                <tr>
                    <th colspan="14">VIP</th>
                </tr>
                <tr>
                    <th></th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>     
                    <th rowspan="6" colspan="1">WALKING AREA</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                </tr>
                <tr>
                    <th>A</th>
                    <td class="seat available" data-seat="VA1"></td>
                    <td class="seat available" data-seat="VA2"></td>
                    <td class="seat available" data-seat="VA3"></td>
                    <td class="seat available" data-seat="VA4"></td>
                    <td class="seat available" data-seat="VA5"></td>
                    <td class="seat available" data-seat="VA6"></td>
                    <td class="seat available" data-seat="VA7"></td>
                    <td class="seat available" data-seat="VA8"></td>
                    <td class="seat available" data-seat="VA9"></td>
                    <td class="seat available" data-seat="VA10"></td>
                    <td class="seat available" data-seat="VA11"></td>
                    <td class="seat available" data-seat="VA12"></td>
                </tr>
                <tr>
                    <th>B</th>
                    <td class="seat available" data-seat="VB1"></td>
                    <td class="seat available" data-seat="VB2"></td>
                    <td class="seat available" data-seat="VB3"></td>
                    <td class="seat available" data-seat="VB4"></td>
                    <td class="seat available" data-seat="VB5"></td>
                    <td class="seat available" data-seat="VB6"></td>
                    <td class="seat available" data-seat="VB7"></td>
                    <td class="seat available" data-seat="VB8"></td>
                    <td class="seat available" data-seat="VB9"></td>
                    <td class="seat available" data-seat="VB10"></td>
                    <td class="seat available" data-seat="VB11"></td>
                    <td class="seat available" data-seat="VB12"></td>
                </tr>
                <tr>
                    <th>C</th>
                    <td class="seat available" data-seat="VC1"></td>
                    <td class="seat available" data-seat="VC2"></td>
                    <td class="seat available" data-seat="VC3"></td>
                    <td class="seat available" data-seat="VC4"></td>
                    <td class="seat available" data-seat="VC5"></td>
                    <td class="seat available" data-seat="VC6"></td>
                    <td class="seat available" data-seat="VC7"></td>
                    <td class="seat available" data-seat="VC8"></td>
                    <td class="seat available" data-seat="VC9"></td>
                    <td class="seat available" data-seat="VC10"></td>
                    <td class="seat available" data-seat="VC11"></td>
                    <td class="seat available" data-seat="VC12"></td>

                </tr>
                <tr>
                    <th>D</th>
                    <td class="seat available" data-seat="VD1"></td>
                    <td class="seat available" data-seat="VD2"></td>
                    <td class="seat available" data-seat="VD3"></td>
                    <td class="seat available" data-seat="VD4"></td>
                    <td class="seat available" data-seat="VD5"></td>
                    <td class="seat available" data-seat="VD6"></td>
                    <td class="seat available" data-seat="VD7"></td>
                    <td class="seat available" data-seat="VD8"></td>
                    <td class="seat available" data-seat="VD9"></td>
                    <td class="seat available" data-seat="VD10"></td>
                    <td class="seat available" data-seat="VD11"></td>
                    <td class="seat available" data-seat="VD12"></td>
                </tr>
                <tr>
                    <th>E</th>
                    <td class="seat available" data-seat="VE1"></td>
                    <td class="seat available" data-seat="VE2"></td>
                    <td class="seat available" data-seat="VE3"></td>
                    <td class="seat available" data-seat="VE4"></td>
                    <td class="seat available" data-seat="VE5"></td>
                    <td class="seat available" data-seat="VE6"></td>
                    <td class="seat available" data-seat="VE7"></td>
                    <td class="seat available" data-seat="VE8"></td>
                    <td class="seat available" data-seat="VE9"></td>
                    <td class="seat available" data-seat="VE10"></td>
                    <td class="seat available" data-seat="VE11"></td>
                    <td class="seat available" data-seat="VE12"></td>
                </tr>
                </table>
        <div class="edit">
        <a href="edit_VIPseat.php">Edit VIP Seat</a>
</div>
        <div class="back">
        <a href="Event_List.php">Back</a>
        </div>
    </body>
</html>
