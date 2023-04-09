<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit participant seat</title>
        <style>
            .seat {
                width: 50px;
                height: 50px;
                border: 1px solid black;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                cursor: pointer;
            }

            .selected {
                background-color: lightgreen;
                margin: 0 auto;
            }

            .row {
                margin-bottom: 10px;
            }

            label {
                margin-right: 10px;
            }
            body{
                text-align:center;
            }

        </style>
    </head>
    <body>
        <?php
        include"headerAdmin.php"
        ?>
        <h1>Seating Chart Editor</h1>

        <form>
            <div class="row">
                <label>Seat:</label>
                <select id="seat-select">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                </select>

                <select id="number-select">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>

            <div class="row">
                <button type="button" id="save-button" >Save</button>
                <button type="button" id="clear-button">Clear</button>
            </div>
        </form>

        <div id="seats-container">
            <!-- Seats will be added here dynamically -->
        </div>
        <script>
            // Generate seat numbers
            var seatLetters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J"];
            var seatHtml = "";
            for (var i = 0; i < seatLetters.length; i++) {
                var rowHtml = "<div class='row'>";
                rowHtml += "<div class='seat-row'>" + seatLetters[i] + "</div>";
                for (var j = 1; j <= 12; j++) {
                    var seatId = seatLetters[i] + (j < 10 ? "0" : "") + j;
                    rowHtml += "<div class='seat' data-seat-id='" + seatId + "'>" + seatId + "</div>";
                }
                rowHtml += "</div>";
                seatHtml += rowHtml;
            }
            document.getElementById("seats-container").innerHTML = seatHtml;

            // Add click handlers to seats
            var seats = document.getElementsByClassName("seat");
            for (var i = 0; i < seats.length; i++) {
                seats[i].addEventListener("click", function () {
                    var seatId = this.getAttribute("data-seat-id");
                    var isSelected = this.classList.contains("selected");
                    this.classList.toggle("selected");
                    if (isSelected) {
                        // Deselect seat
                        document.getElementById("row-select").value = seatId.substring(0, 1);
                        document.getElementById("seat-select").value = seatId.substring(1, 2);
                        document.getElementById("number-select").value = seatId.substring(2);
                    } else {
                        // Select seat
                        document.getElementById("row-select").value = "";
                        document.getElementById("seat-select").value = "";
                        document.getElementById("number-select").value = "";
                    }
                });
            }

            // Add click handler to save button
            document.getElementById("save-button").addEventListener("click", function () {
                var row = document.getElementById("row-select").value;
                var seat = document.getElementById("seat-select").value;
                var number = document.getElementById("number-select").value;
                var seatId = row + seat + number;
                var selectedSeats = document.getElementsByClassName("selected");
                for (var i = 0; i < selectedSeats.length; i++) {
                    selectedSeats[i].setAttribute("data-seat-id", seatId);
                    selectedSeats[i].textContent = seatId;
                    selectedSeats[i].classList.remove("selected");
                }
                document.getElementById("row-select").value = "";
                document.getElementById("seat-select").value = "";
                document.getElementById("number-select").value = "";
            });

            // Add click handler to clear button
            document.getElementById("clear-button").addEventListener("click", function () {
                var selectedSeats = document.getElementsByClassName("selected");
                for (var i = 0; i < selectedSeats.length; i++) {
                    selectedSeats[i].classList.remove("selected");
                }
                document.getElementById("row-select").value = "";
                document.getElementById("seat-select").value = "";
                document.getElementById("number-select").value = "";
            });
        </script>
    </body>
</html>
