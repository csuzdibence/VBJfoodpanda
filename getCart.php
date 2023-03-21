<?php 
    $cartHtml = "";
    session_start();
    if (isset($_SESSION["cart"]))
    {
        $conn = new mysqli("localhost", "root", "", "foodpanda");
        $sumPrice = 0;
        foreach ($_SESSION["cart"] as $id => $quantity)
        {
            $sqlQuery = "SELECT * FROM products WHERE ID = {$id};";
            $result = $conn->query($sqlQuery);
            $product = $result->fetch_all();
            $name = $product[0][1];
            $price = $product[0][2];
            $sumPrice += ($price * $quantity);
            $cartHtml = $cartHtml.
            "<div class=\"kosarElem\"><p>{$name}</p><p>{$price}</p><p class=\"darab\">{$quantity}</p><button onclick=\"subtractFromCart('{$name}')\">-</button></div>";
        }
        $conn->close();
        $summaryHtml = "<div class=\"osszesito\"><p id=\"sumMoney\">{$sumPrice}</p>Ft</div>";
        echo $summaryHtml.$cartHtml;
    }
?>