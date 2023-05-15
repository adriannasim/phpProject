<!DOCTYPE html>
<html>
<?php
session_start();
include "config/config.php";
$UserID = $_SESSION['UserID'];

if ($UserID == '') {
    header("location: index.php");
}
?>

<head>
    <meta charset="UTF-8">
    <title>seating_plan</title>
</head>
<style>
    .seating-plan {
        width: 100%;
        max-width: 1200px;
        margin: auto;
    }

    .seating-plan table {
        border-collapse: collapse;
        width: 100%;
        margin: 10px;
    }

    .seating-plan th,
    .seating-plan td {
        padding: 10px;
        text-align: center;
    }

    tr,
    td,
    th {
        border-style: solid;
    }

    .seating-plan th,
    .seating-plan td {
        width: 50px;
        font-weight: bold;
        text-align: left;
    }

    .seating-plan .seat {
        width: 50px;
        height: 20px;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    .seating-plan th {
        text-align: center;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    td.seat.occupied {
        background-color: red;
    }

    td.seat.unoccupied {
        background-color: green;

    }

    .screenNplayer table,
    .screenNplayer td {
        border-collapse: collapse;
        width: 75%;
        border-style: solid;
        margin: 0 13.5%;
        text-align: center;
        border-color: white;
    }
</style>

<body>
    <?php include "headerUser.php";
    require_once "seat_helper.php"; ?>
    <h1>Seating Plan</h1>
    <div class="screenNplayer">
        <table>
            <img class="screen" src="https://poster.gsc.com.my/campaign/default_web.png">
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
                <td class="seat" id="VA01"></td>
                <td class="seat" id="VA02"></td>
                <td class="seat" id="VA03"></td>
                <td class="seat" id="VA04"></td>
                <td class="seat" id="VA05"></td>
                <td class="seat" id="VA06"></td>
                <td class="seat" id="VA07"></td>
                <td class="seat" id="VA08"></td>
                <td class="seat" id="VA09"></td>
                <td class="seat" id="VA10"></td>
                <td class="seat" id="VA11"></td>
                <td class="seat" id="VA12"></td>
            </tr>
            <tr>
                <th>B</th>
                <td class="seat" id="VB01"></td>
                <td class="seat" id="VB02"></td>
                <td class="seat" id="VB03"></td>
                <td class="seat" id="VB04"></td>
                <td class="seat" id="VB05"></td>
                <td class="seat" id="VB06"></td>
                <td class="seat" id="VB07"></td>
                <td class="seat" id="VB08"></td>
                <td class="seat" id="VB09"></td>
                <td class="seat" id="VB10"></td>
                <td class="seat" id="VB11"></td>
                <td class="seat" id="VB12"></td>
            </tr>
            <tr>
                <th>C</th>
                <td class="seat" id="VC01"></td>
                <td class="seat" id="VC02"></td>
                <td class="seat" id="VC03"></td>
                <td class="seat" id="VC04"></td>
                <td class="seat" id="VC05"></td>
                <td class="seat" id="VC06"></td>
                <td class="seat" id="VC07"></td>
                <td class="seat" id="VC08"></td>
                <td class="seat" id="VC09"></td>
                <td class="seat" id="VC10"></td>
                <td class="seat" id="VC11"></td>
                <td class="seat" id="VC12"></td>

            </tr>
            <tr>
                <th>D</th>
                <td class="seat" id="VD01"></td>
                <td class="seat" id="VD02"></td>
                <td class="seat" id="VD03"></td>
                <td class="seat" id="VD04"></td>
                <td class="seat" id="VD05"></td>
                <td class="seat" id="VD06"></td>
                <td class="seat" id="VD07"></td>
                <td class="seat" id="VD08"></td>
                <td class="seat" id="VD09"></td>
                <td class="seat" id="VD10"></td>
                <td class="seat" id="VD11"></td>
                <td class="seat" id="VD12"></td>
            </tr>
            <tr>
                <th>E</th>
                <td class="seat" id="VE01"></td>
                <td class="seat" id="VE02"></td>
                <td class="seat" id="VE03"></td>
                <td class="seat" id="VE04"></td>
                <td class="seat" id="VE05"></td>
                <td class="seat" id="VE06"></td>
                <td class="seat" id="VE07"></td>
                <td class="seat" id="VE08"></td>
                <td class="seat" id="VE09"></td>
                <td class="seat" id="VE10"></td>
                <td class="seat" id="VE11"></td>
                <td class="seat" id="VE12"></td>
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
                <td class="seat" id="A001"></td>
                <td class="seat" id="A002"></td>
                <td class="seat" id="A003"></td>
                <td class="seat" id="A004"></td>
                <td class="seat" id="A005"></td>
                <td class="seat" id="A006"></td>
                <td class="seat" id="A007"></td>
                <td class="seat" id="A008"></td>
                <td class="seat" id="A009"></td>
                <td class="seat" id="A010"></td>
                <td class="seat" id="A011"></td>
                <td class="seat" id="A012"></td>
            </tr>
            <tr>
                <th>B</th>
                <td class="seat" id="B001"></td>
                <td class="seat" id="B002"></td>
                <td class="seat" id="B003"></td>
                <td class="seat" id="B004"></td>
                <td class="seat" id="B005"></td>
                <td class="seat" id="B006"></td>
                <td class="seat" id="B007"></td>
                <td class="seat" id="B008"></td>
                <td class="seat" id="B009"></td>
                <td class="seat" id="B010"></td>
                <td class="seat" id="B011"></td>
                <td class="seat" id="B012"></td>
            </tr>
            <tr>
                <th>C</th>
                <td class="seat" id="C001"></td>
                <td class="seat" id="C002"></td>
                <td class="seat" id="C003"></td>
                <td class="seat" id="C004"></td>
                <td class="seat" id="C005"></td>
                <td class="seat" id="C006"></td>
                <td class="seat" id="C007"></td>
                <td class="seat" id="C008"></td>
                <td class="seat" id="C009"></td>
                <td class="seat" id="C010"></td>
                <td class="seat" id="C011"></td>
                <td class="seat" id="C012"></td>
            </tr>
            <tr>
                <th>D</th>
                <td class="seat" id="D001"></td>
                <td class="seat" id="D002"></td>
                <td class="seat" id="D003"></td>
                <td class="seat" id="D004"></td>
                <td class="seat" id="D005"></td>
                <td class="seat" id="D006"></td>
                <td class="seat" id="D007"></td>
                <td class="seat" id="D008"></td>
                <td class="seat" id="D009"></td>
                <td class="seat" id="D010"></td>
                <td class="seat" id="D011"></td>
                <td class="seat" id="D012"></td>
            </tr>
            <tr>
                <th>E</th>
                <td class="seat" id="E001"></td>
                <td class="seat" id="E002"></td>
                <td class="seat" id="E003"></td>
                <td class="seat" id="E004"></td>
                <td class="seat" id="E005"></td>
                <td class="seat" id="E006"></td>
                <td class="seat" id="E007"></td>
                <td class="seat" id="E008"></td>
                <td class="seat" id="E009"></td>
                <td class="seat" id="E010"></td>
                <td class="seat" id="E011"></td>
                <td class="seat" id="E012"></td>
            </tr>
            <tr>
                <th>F</th>
                <td class="seat" id="F001"></td>
                <td class="seat" id="F002"></td>
                <td class="seat" id="F003"></td>
                <td class="seat" id="F004"></td>
                <td class="seat" id="F005"></td>
                <td class="seat" id="F006"></td>
                <td class="seat" id="F007"></td>
                <td class="seat" id="F008"></td>
                <td class="seat" id="F009"></td>
                <td class="seat" id="F010"></td>
                <td class="seat" id="F011"></td>
                <td class="seat" id="F012"></td>
            </tr>
            <tr>
                <th>G</th>
                <td class="seat" id="G001"></td>
                <td class="seat" id="G002"></td>
                <td class="seat" id="G003"></td>
                <td class="seat" id="G004"></td>
                <td class="seat" id="G005"></td>
                <td class="seat" id="G006"></td>
                <td class="seat" id="G007"></td>
                <td class="seat" id="G008"></td>
                <td class="seat" id="G009"></td>
                <td class="seat" id="G010"></td>
                <td class="seat" id="G011"></td>
                <td class="seat" id="G012"></td>
            </tr>
            <tr>
                <th>H</th>
                <td class="seat" id="H001"></td>
                <td class="seat" id="H002"></td>
                <td class="seat" id="H003"></td>
                <td class="seat" id="H004"></td>
                <td class="seat" id="H005"></td>
                <td class="seat" id="H006"></td>
                <td class="seat" id="H007"></td>
                <td class="seat" id="H008"></td>
                <td class="seat" id="H009"></td>
                <td class="seat" id="H010"></td>
                <td class="seat" id="H011"></td>
                <td class="seat" id="H012"></td>
            </tr>
            <tr>
                <th>I</th>
                <td class="seat" id="I001"></td>
                <td class="seat" id="I002"></td>
                <td class="seat" id="I003"></td>
                <td class="seat" id="I004"></td>
                <td class="seat" id="I005"></td>
                <td class="seat" id="I006"></td>
                <td class="seat" id="I007"></td>
                <td class="seat" id="I008"></td>
                <td class="seat" id="I009"></td>
                <td class="seat" id="I010"></td>
                <td class="seat" id="I011"></td>
                <td class="seat" id="I012"></td>
            </tr>

            <tr>
                <th>J</th>
                <td class="seat" id="J001"></td>
                <td class="seat" id="J002"></td>
                <td class="seat" id="J003"></td>
                <td class="seat" id="J004"></td>
                <td class="seat" id="J005"></td>
                <td class="seat" id="J006"></td>
                <td class="seat" id="J007"></td>
                <td class="seat" id="J008"></td>
                <td class="seat" id="J009"></td>
                <td class="seat" id="J010"></td>
                <td class="seat" id="J011"></td>
                <td class="seat" id="J012"></td>
            </tr>
        </table>
    </div>
    <?php
    $sql = "SELECT * FROM seat GROUP BY SeatID";
    $result = $connection->query($sql);

    while ($row = mysqli_fetch_array($result)) {
        for ($i = 1; $i <= 12; $i++) {
            $seatIDA = sprintf("A%03d", $i);
            $seatIDB = sprintf("B%03d", $i);
            $seatIDC = sprintf("C%03d", $i);
            $seatIDD = sprintf("D%03d", $i);
            $seatIDE = sprintf("E%03d", $i);
            $seatIDF = sprintf("F%03d", $i);
            $seatIDG = sprintf("G%03d", $i);
            $seatIDH = sprintf("H%03d", $i);
            $seatIDI = sprintf("I%03d", $i);
            $seatIDJ = sprintf("J%03d", $i);
            $seatIDVA = sprintf("VA%02d", $i);
            $seatIDVB = sprintf("VB%02d", $i);
            $seatIDVC = sprintf("VC%02d", $i);
            $seatIDVD = sprintf("VD%02d", $i);
            $seatIDVE = sprintf("VE%02d", $i);

            if ($row['SeatID'] == $seatIDVA && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDVA . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDVB && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDVB . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDVC && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDVC . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDVD && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDVD . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDVE && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDVE . '").classList.add("occupied");</script>';
            }
            if ($row['SeatID'] == $seatIDVA && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDVA . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDVB && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDVB . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDVC && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDVC . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDVD && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDVD . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDVE && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDVE . '").classList.add("unoccupied");</script>';
            }

            if ($row['SeatID'] == $seatIDA && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDA . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDB && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDB . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDC && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDC . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDD && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDD . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDE && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDE . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDF && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDF . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDG && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDG . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDH && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDH . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDI && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDI . '").classList.add("occupied");</script>';
            } else if ($row['SeatID'] == $seatIDJ && $row['Status'] == 1) {
                echo '<script>document.getElementById("' . $seatIDJ . '").classList.add("occupied");</script>';
            }
            if ($row['SeatID'] == $seatIDA && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDA . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDB && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDB . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDC && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDC . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDD && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDD . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDE && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDE . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDF && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDF . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDG && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDG . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDH && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDH . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDI && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDI . '").classList.add("unoccupied");</script>';
            } else if ($row['SeatID'] == $seatIDJ && $row['Status'] == 0) {
                echo '<script>document.getElementById("' . $seatIDJ . '").classList.add("unoccupied");</script>';
            }
        }
    }
    ?>
    <form action="" method="POST">
    <a href="newticket.php">Back</a>
    </form>
    <?php include "footerUser.php"; ?>
</body>

</html>