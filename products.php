<?php 
    $conn = new mysqli("localhost", "root", "", "foodpanda", 3306);
    $sqlQuery = "SELECT * FROM products";
    $result = $conn->query($sqlQuery);
    $products = $result->fetch_all();
    $conn->close();
    $responseText = "";


    foreach($products as $product)
    {
        $name = $product[1];
        $price = $product[2];
        $imagePath = $product[3];
        $id = $product[0];

        $responseText = $responseText."<div class=\"termek\" id=\"$name\">
                <img src=\"$imagePath\">
                <div class=\"termekSzoveg\">
                    <p class=\"azonosito\">$id</p>
                    <p class=\"termekNev\">$name</p>
                    <p class=\"ar\">$price</p>
                    <button onclick=\"addToCart(document.getElementById('$name'))\">+</button>
                </div>
            </div>";
    }
    echo $responseText;

?>