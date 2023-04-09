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
                <tr>
                    <th colspan="14">Standard</th>
                </tr>
                <tr>
                    <th></th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>     
                    <th rowspan="13" colspan="1">WALKING AREA</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                </tr>
                <tr>
                    <th>A</th>
                    <td class="seat available" data-seat="A1"></td>
                    <td class="seat available" data-seat="A2"></td>
                    <td class="seat available" data-seat="A3"></td>
                    <td class="seat available" data-seat="A4"></td>
                    <td class="seat available" data-seat="A5"></td>
                    <td class="seat available" data-seat="A6"></td>
                    <td class="seat available" data-seat="A7"></td>
                    <td class="seat available" data-seat="A8"></td>
                    <td class="seat available" data-seat="A9"></td>
                    <td class="seat available" data-seat="A10"></td>
                    <td class="seat available" data-seat="A11"></td>
                    <td class="seat available" data-seat="A12"></td>
                </tr>
                <tr>
                    <th>B</th>
                    <td class="seat available" data-seat="B1"></td>
                    <td class="seat available" data-seat="B2"></td>
                    <td class="seat available" data-seat="B3"></td>
                    <td class="seat available" data-seat="B4"></td>
                    <td class="seat available" data-seat="B5"></td>
                    <td class="seat available" data-seat="B6"></td>
                    <td class="seat available" data-seat="B7"></td>
                    <td class="seat available" data-seat="B8"></td>
                    <td class="seat available" data-seat="B9"></td>
                    <td class="seat available" data-seat="B10"></td>
                    <td class="seat available" data-seat="B11"></td>
                    <td class="seat available" data-seat="B12"></td>
                </tr>
                <tr>
                    <th>C</th>
                    <td class="seat available" data-seat="C1"></td>
                    <td class="seat available" data-seat="C2"></td>
                    <td class="seat available" data-seat="C3"></td>
                    <td class="seat available" data-seat="C4"></td>
                    <td class="seat available" data-seat="C5"></td>
                    <td class="seat available" data-seat="C6"></td>
                    <td class="seat available" data-seat="C7"></td>
                    <td class="seat available" data-seat="C8"></td>
                    <td class="seat available" data-seat="C9"></td>
                    <td class="seat available" data-seat="C10"></td>
                    <td class="seat available" data-seat="C11"></td>
                    <td class="seat available" data-seat="C12"></td>
                </tr>
                <tr>
                    <th>D</th>
                    <td class="seat available" data-seat="D1"></td>
                    <td class="seat available" data-seat="D2"></td>
                    <td class="seat available" data-seat="D3"></td>
                    <td class="seat available" data-seat="D4"></td>
                    <td class="seat available" data-seat="D5"></td>
                    <td class="seat available" data-seat="D6"></td>
                    <td class="seat available" data-seat="D7"></td>
                    <td class="seat available" data-seat="D8"></td>
                    <td class="seat available" data-seat="D9"></td>
                    <td class="seat available" data-seat="D10"></td>
                    <td class="seat available" data-seat="D11"></td>
                    <td class="seat available" data-seat="D12"></td>
                </tr>
                <tr>
                    <th>E</th>
                    <td class="seat available" data-seat="E1"></td>
                    <td class="seat available" data-seat="E2"></td>
                    <td class="seat available" data-seat="E3"></td>
                    <td class="seat available" data-seat="E4"></td>
                    <td class="seat available" data-seat="E5"></td>
                    <td class="seat available" data-seat="E6"></td>
                    <td class="seat available" data-seat="E7"></td>
                    <td class="seat available" data-seat="E8"></td>
                    <td class="seat available" data-seat="E9"></td>
                    <td class="seat available" data-seat="E10"></td>
                    <td class="seat available" data-seat="E11"></td>
                    <td class="seat available" data-seat="E12"></td>
                </tr>
                <tr>
                    <th>F</th>
                    <td class="seat available" data-seat="F1"></td>
                    <td class="seat available" data-seat="F2"></td>
                    <td class="seat available" data-seat="F3"></td>
                    <td class="seat available" data-seat="F4"></td>
                    <td class="seat available" data-seat="F5"></td>
                    <td class="seat available" data-seat="F6"></td>
                    <td class="seat available" data-seat="F7"></td>
                    <td class="seat available" data-seat="F8"></td>
                    <td class="seat available" data-seat="F9"></td>
                    <td class="seat available" data-seat="F10"></td>
                    <td class="seat available" data-seat="F11"></td>
                    <td class="seat available" data-seat="F12"></td>
                </tr>
                <tr>
                    <th>G</th>
                    <td class="seat available" data-seat="G1"></td>
                    <td class="seat available" data-seat="G2"></td>
                    <td class="seat available" data-seat="G3"></td>
                    <td class="seat available" data-seat="G4"></td>
                    <td class="seat available" data-seat="G5"></td>
                    <td class="seat available" data-seat="G6"></td>
                    <td class="seat available" data-seat="G7"></td>
                    <td class="seat available" data-seat="G8"></td>
                    <td class="seat available" data-seat="G9"></td>
                    <td class="seat available" data-seat="G10"></td>
                    <td class="seat available" data-seat="G11"></td>
                    <td class="seat available" data-seat="G12"></td>
                </tr>
                <tr>
                    <th>H</th>
                    <td class="seat available" data-seat="H1"></td>
                    <td class="seat available" data-seat="H2"></td>
                    <td class="seat available" data-seat="H3"></td>
                    <td class="seat available" data-seat="H4"></td>
                    <td class="seat available" data-seat="H5"></td>
                    <td class="seat available" data-seat="H6"></td>
                    <td class="seat available" data-seat="H7"></td>
                    <td class="seat available" data-seat="H8"></td>
                    <td class="seat available" data-seat="H9"></td>
                    <td class="seat available" data-seat="H10"></td>
                    <td class="seat available" data-seat="H11"></td>
                    <td class="seat available" data-seat="H12"></td>
                </tr>
                <tr>
                    <th>I</th>
                    <td class="seat available" data-seat="I1"></td>
                    <td class="seat available" data-seat="I2"></td>
                    <td class="seat available" data-seat="I3"></td>
                    <td class="seat available" data-seat="I4"></td>
                    <td class="seat available" data-seat="I5"></td>
                    <td class="seat available" data-seat="I6"></td>
                    <td class="seat available" data-seat="I7"></td>
                    <td class="seat available" data-seat="I8"></td>
                    <td class="seat available" data-seat="I9"></td>
                    <td class="seat available" data-seat="I10"></td>
                    <td class="seat available" data-seat="I11"></td>
                    <td class="seat available" data-seat="I12"></td>
                </tr>

                <tr>
                    <th>J</th>
                    <td class="seat available" data-seat="J1"></td>
                    <td class="seat available" data-seat="J2"></td>
                    <td class="seat available" data-seat="J3"></td>
                    <td class="seat available" data-seat="J4"></td>
                    <td class="seat available" data-seat="J5"></td>
                    <td class="seat available" data-seat="J6"></td>
                    <td class="seat available" data-seat="J7"></td>
                    <td class="seat available" data-seat="J8"></td>
                    <td class="seat available" data-seat="J9"></td>
                    <td class="seat available" data-seat="J10"></td>
                    <td class="seat available" data-seat="J11"></td>
                    <td class="seat available" data-seat="J12"></td>
                </tr>
            </table>
        </div>
        <button>Edit</button>
        <div class="back">
        <a href="Event_List.php">Back</a>
        </div>
    </body>
</html>
