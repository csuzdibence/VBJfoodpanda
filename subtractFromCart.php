<?php
    session_start();
    if (isset($_SESSION["cart"]) && isset($_GET["name"]))
    {
        $name = $_GET["name"];
        $conn = new mysqli("localhost", "root", "", "foodpanda");
        $sqlQuery = "SELECT id FROM products WHERE name =\"{$name}\";";
        $result = $conn->query($sqlQuery);
        $product = $result->fetch_row();
        $id = $product[0];
        echo var_dump($_SESSION["cart"]) . "Id:".$id;
        echo $sqlQuery;
        if (isset($_SESSION["cart"][$id]))
        {
            $quantity = $_SESSION["cart"][$id];
            
            if ($quantity > 1)
            {
                $_SESSION["cart"][$id]--;
            }
            
            if ($quantity == 1)
            {
                unset($_SESSION["cart"][$id]);
            }
        }
    }

?>