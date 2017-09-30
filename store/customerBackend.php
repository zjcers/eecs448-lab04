<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Receipt</title>
    <link rel="stylesheet" href="style.css">
    <style>
        th {
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Thank you for your purchase!</h1>
    <hr/>
    <h3>Here is your receipt:</h3>
    <table border="1">
        <tr>
            <th>Item Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php
            $items = array(
                "Banana" => array(
                    "price" => 1.0,
                    "form-name" => "quan-banana"),
                "Apple" => array(
                    "price" => 5.0,
                    "form-name" => "quan-apple"),
                "Grapefruit" => array(
                    "price" => 0.5,
                    "form-name" => "quan-grapefruit"));
            $subtotal = 0.0;
            foreach ($items as $item => $itemProps) {
                //Check to make sure that the item is even in the form
                if (array_key_exists($itemProps["form-name"], $_POST)) {
                    $quan = intval($_POST[$itemProps["form-name"]]);
                    echo $intval;
                    $itemSubtotal = $quan * $itemProps["price"];
                    //if quantity was zero, don't bother making a table row
                    if ($quan > 0) {
                        $subtotal += $itemSubtotal;
                        echo "<tr>\n<td>";
                        echo $item;
                        echo "</td>\n<td>";
                        echo money_format("$%i", $itemProps["price"]);
                        echo "</td>\n<td>";
                        echo $quan;
                        echo "</td>\n<td>";
                        echo money_format("$%i", $itemSubtotal);
                        echo "</td>\n</tr>";
                    }
                }
            }
            $shippingVals = array(
                "free" => array(
                    "price" => 0.0,
                    "name" => "Free 7-day"),
                "overnight" => array(
                    "price" => 50.0,
                    "name" => "Overnight"),
                "3day" => array(
                    "price" => 5.0,
                    "name" => "Three-day")
            );
            $shipping = $shippingVals[$_POST["shipping"]];
        ?>
        <tr>
            <th colspan="3">Subtotal</th>
            <td>
                <?php echo money_format("$%i", $subtotal); ?>
            </td>
        </tr>
        <tr>
            <th colspan="3"><?php echo $shipping["name"] ?> Shipping</th>
            <td>
                <?php echo money_format("$%i", $shipping["price"]); ?>
            </td>
        </tr>
        <tr>
            <th colspan="3">Total Cost</th>
            <td>
                <?php echo money_format("$%i", $subtotal + $shipping["price"]); ?>
            </td>
        </tr>
    </table>
    <p>
        This order was placed by <?php echo $_POST["username"]; ?> (password: <?php echo $_POST["password"]; ?>).
    </p>
</body>
</html>