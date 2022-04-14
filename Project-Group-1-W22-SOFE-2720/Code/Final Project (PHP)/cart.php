<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleSheet.css">
    <?php include 'inventory.php';?>
    <script src="javaScript.js"></script>
</head>
<body>
    <! use this div for all webpages to for the top bar !>
    <div id="navbar">
        <a href="home.php">Home</a>
        <a href="cart.php">Purchase</a>
        <a href="OrderHistory.php">Order History</a>
        <a href="#contact">Contact</a>
    </div>
    <div id="Cart" class = "row">
        <h1>Your Cart</h1>
        <div id="Items" class="column">
            <h2>Items</h2>
            <form method="post" action="/inventory.php">
                <div id="class1" class="card" style="background-color: white;">
                    <h3>Samsung S21</h3>
                    <p class="price">$<?php echo $s21_price; ?></p>
                    <p id="quan1">Quantity remaining: <?php echo $s21_stock; ?> </p>
                    <input name="button1" id="s21" type="number" step="1" value="0" min="0" max="<?php echo $s21_stock; ?>" onchange="checkPrice()" />
                </div>
                <div id="class2" class="card" style="background-color: white;">
                    <h3>Wireless Charger</h3>
                    <p class="price">$<?php echo $charger_price; ?></p>
                    <p id="quan2">Quantity remaining: <?php echo $charger_stock; ?> </p>
                    <input name="button2" id="charger" type="number" step="1" value="0" min="0" max="<?php echo $charger_stock; ?>" onchange="checkPrice()" />
                </div>
                <div id="class3" class="card" style="background-color: white;">
                    <h3>Samsung S21 Case</h3>
                    <p class="price">$<?php echo $s21case_price; ?></p>
                    <p id="quan3">Quantity remaining: <?php echo $s21case_stock; ?> </p>
                    <input name="button3" id="s21case" type="number" step="1" value="0" min="0" max="<?php echo $s21case_stock; ?>" onchange="checkPrice()" />
                </div>
                <div id="class4" class="card" style="background-color: white;">
                    <h3>Woosh! Screen Cleaner</h3>
                    <p class="price">$<?php echo $woosh_price; ?></p>
                    <p id="quan4">Quantity remaining: <?php echo $woosh_stock; ?> </p>
                    <input name="button4" id="woosh" type="number" step="1" value="0" min="0" max="<?php echo $woosh_stock; ?>" onchange="checkPrice()" />
                </div>
            </div>
            </div>
            <div id="Checkout" class="column">
                <h2>Checkout</h2>
                <div class="card">
                <p id="subtotal">Sub-Total &emsp; = &emsp; $<?php $sub_total ?> </p>
                <p id="taxes">Taxes &emsp; = &emsp; $<?php $taxes ?> </p>
                <p id="total">Total &emsp; = &emsp; $<?php $total ?> </p>
                <input type="submit" value="CHECKOUT" id="checkout"></input>
                </div>
            </div>
        </form>
    </div>

<script type="text/javascript">
   

    function checkPrice() {
        let s21s = parseFloat(document.getElementById('s21').value);
        let chargers = parseFloat(document.getElementById('charger').value);
        let s21cases = parseFloat(document.getElementById('s21case').value);
        let wooshs = parseFloat(document.getElementById('woosh').value);

        let subTotal = parseFloat(((s21s*899.99) + (chargers*19.99) + (s21cases*9.99) + (wooshs*25.99)).toFixed(2));
        let taxes = parseFloat((subTotal*0.13).toFixed(2));
        let total = (subTotal + taxes).toFixed(2);

        document.getElementById('subtotal').innerHTML = "Sub-Total &emsp; = &emsp; $" + subTotal;
        document.getElementById('taxes').innerHTML = "Taxes &emsp; = &emsp; $" + taxes;
        document.getElementById('total').innerHTML = "Total &emsp; = &emsp; $" + total;
    }
</script>

</body>
</html>