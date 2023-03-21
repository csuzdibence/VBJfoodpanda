<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodPanda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body onload="loadProducts(); loadCart();">
    <?php include('header.html'); ?>
    <main>
        <div class="termekek" id="termekek">            
        </div>
        <div class="kosar" id="kosar">
            <div class="osszesito"><p id="sumMoney">0</p>Ft</div>
        </div>
    </main>
    <?php include('footer.html'); ?>
    <script src="cart.js"></script>
    <script src="products.js"></script>
</body>
</html>