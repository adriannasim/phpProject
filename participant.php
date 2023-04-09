<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Participant Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            color: black;

        }

        tr:nth-child(odd) {
            background-color: white;
            color: black;
        }

        th {
            background-color: #4CAF50;
            color: black;
        }

        body {
            background-color: black;
            color: white;
        }

        a {
            display: inline-block;
            outline: none;
            cursor: pointer;
            font-size: 14px;
            line-height: 1;
            border-radius: 300px;
            transition-property: background-color, border-color, color, box-shadow, filter;
            transition-duration: .3s;
            border: 1px solid transparent;
            letter-spacing: 2px;
            min-width: 160px;
            text-transform: uppercase;
            white-space: normal;
            font-weight: 700;
            text-align: center;
            padding: 16px 14px 18px;
            color: #616467;
            box-shadow: inset 0 0 0 2px #616467;
            background-color: white;
            text-decoration: none;
        }

        a:hover {
            transition-duration: 0.5s;
            color: black;
            background-color: #9999ff;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <h1>Participant Table For Valorant</h1>
    <table>
        <thead>
            <tr>
                <td> Team Name : </td>
            </tr>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Player1</td>
                <td>player1@example.com</td>
                <td>012-4567890</td>
            </tr>
            <tr>
                <td>Player 2</td>
                <td>player 2@example.com</td>
                <td>012-4567891</td>
            </tr>
            <tr>
                <td>Player 3</td>
                <td>player 3@example.com</td>
                <td>012-4567892</td>
            </tr>
            <tr>
                <td>Player 4 </td>
                <td>player 4@example.com</td>
                <td>012-4567893</td>
            </tr>
            <tr>
                <td>Player 5 </td>
                <td>player 5@example.com</td>
                <td>012-4567894</td>
            </tr>
        </tbody>
    </table>
    <a href="Event_List.php">Back</a>
</body>

</html>