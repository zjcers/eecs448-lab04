<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1: Multiplication Table</title>
    <style>
    td.multiplicand {
        font-weight: bold;
    }
    </style>
</head>
<body>
    <h1>Multiplication Table</h1>
    <table>
    <th>
        <?php
        for($i = 1; $i <= 100; $i++) {
            echo "<td class=\"multiplicand\">".$i."</td>\n";
        }
        ?>
    </th>
        <?php
        for($vertical = 1; $vertical <= 100; $vertical++) {
            echo("<tr>");
            echo("<td class=\"multiplicand\">".$vertical."</td>");
            for($horizontal = 1; $horizontal <= 100; $horizontal++) {
                echo("<td>".($vertical*$horizontal)."</td>");
            }
            echo("</tr>");
        }
        ?>
    </table>
</body>
</html>