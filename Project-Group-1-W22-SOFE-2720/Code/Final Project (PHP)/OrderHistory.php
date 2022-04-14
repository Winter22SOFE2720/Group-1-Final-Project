<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleSheet.css">
    <script src="javaScript.js"></script>
    <?php include 'inventory.php';?>
    <?php 
        $s21_bought = 7 - $s21_stock;
        $charger_bought = 20 - $charger_stock;
        $s21case_bought = 50 - $s21case_stock;
        $woosh_bought = 10 - $woosh_stock;
    ?>
</head>
<body>
    <! use this div for all webpages to for the top bar !>
    <div id="navbar">
        <a href="home.php">Home</a>
        <a href="cart.php">Purchase</a>
        <a href="OrderHistory.php">Order History</a>
        <a href="#contact">Contact</a>
    </div>
      <div id="OrderHistory">
        <h1>Your Orders</h1>
        <form method="post" action="/inventory.php">
        <div id="Order" class="card">
            <br>
            <div id="item1" class="card" style="background-color: white;">
                <h2>Samsung S21</h2>
                <p id="quan1"><?php echo '$'.$s21_price.' &emsp; Quantity:'.$s21_bought; ?></p>
                <input name="refund1" id="s21" type="number" step="1" value="0" min="0" max="<?php echo $s21_bought; ?>" />
            </div>
            <div id="item2" class="card" style="background-color: white;">
                <h2>Wireless Charger</h2>
                <p id="quan2"><?php echo '$'.$charger_price.' &emsp; Quantity:'.$charger_bought; ?></p>
                <input name="refund2" id="charger" type="number" step="1" value="0" min="0" max="<?php echo $charger_bought; ?>" />
            </div>
            <div id="item3" class="card" style="background-color: white;">
                <h2>Samsung S21 Case</h2>
                <p id="quan3"><?php echo '$'.$s21case_price.' &emsp; Quantity:'.$s21case_bought; ?></p>
                <input name="refund3" id="s21case" type="number" step="1" value="0" min="0" max="<?php echo $s21case_bought; ?>" />
            </div>
            <div id="item4" class="card" style="background-color: white;">
                <h2>Woosh! Screen Cleaner</h2>
                <p id="quan4"><?php echo '$'.$woosh_price.' &emsp; Quantity:'.$woosh_bought; ?></p>
                <input name="refund4" id="woosh" type="number" step="1" value="0" min="0" max="<?php echo $woosh_bought; ?>" />
            </div>
            <input type="submit" value="Submit Refund" id="refund"></input>
            <p>Order Status</p>
        </div> 
        </form>

<script type="text/javascript">

    document.getElementById("item1").style.display = "none";
    document.getElementById("item2").style.display = "none";
    document.getElementById("item3").style.display = "none";
    document.getElementById("item4").style.display = "none";

    if(<?php echo $s21_bought ?> >= 1) {
        document.getElementById("item1").style.display = "block";
    }
    if(<?php echo $charger_bought ?> >= 1) {
        document.getElementById("item2").style.display = "block";
    }
    if(<?php echo $s21case_bought ?> >= 1) {
        document.getElementById("item3").style.display = "block";
    }
    if(<?php echo $woosh_bought ?> >= 1) {
        document.getElementById("item4").style.display = "block";
    }

</script>
</body>
</html>