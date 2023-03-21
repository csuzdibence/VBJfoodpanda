<?php 
    session_start();
    if (isset($_GET["id"]))
    {
        $id = $_GET["id"];
        // Ha még nincs kosár, hozzuk létre
        if (!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"] = array();
        }
        // Ha még nincs adott termék a kosárban
        // Legyen egy darab belőle
        if (!isset($_SESSION["cart"][$id]))
        {
            $_SESSION["cart"][$id] = 1;
        }
        else 
        {
            // Ha már van ilyen termék
            $_SESSION["cart"][$id]++;
        }
    }
    var_dump($_SESSION["cart"]);
?>