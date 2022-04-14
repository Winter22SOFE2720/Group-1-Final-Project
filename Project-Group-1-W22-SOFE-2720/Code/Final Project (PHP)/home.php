<!DOCTYPE html>
<html>
<head>
<title>Home</title> 
<link rel="stylesheet" href="styleSheet.css">
<?php include 'inventory.php';?>

</head>
<body>
<! use this div for all webpages to for the top bar !>
<div id="navbar">
    <a href="home.php">Home</a>
    <a href="cart.php">Purchase</a>
    <a href="OrderHistory.php">Order History</a>
    <a href="#contact">Contact</a>
  </div>
    
<div id="welcome">
  <h1>Great deals today!</h1>
</div>
<div class="card">
  <img src="./Photos/1.jpg" alt="Samsung S21" style="width:100%">
  <h1>Samsung S21</h1>
  <p class="price">$<?php echo $s21_price; ?></p>
  <p id="stock1"><?php echo $s21_stock; ?> left</p>
  <p>Meet Galaxy S21 5G</p>
  <p><button onclick="location.href = 'cart.php';">Purchase</button></p>
</div>

<div class="card">
    <img src="./Photos/2.jpg" alt="wireless" style="width:100%">
    <h1>Wireless Charger</h1>
    <p class="price">$<?php echo $charger_price; ?></p>
    <p id="stock2"><?php echo $charger_stock; ?> left</p>
    <p>Charge your phone wirelessly</p>
    <p><button onclick="location.href = 'cart.php';">Purchase</button></p>
</div>

<div class="card">
    <img src="./Photos/3.jpg" alt="Samsung S21 Case" style="width:100%">
    <h1>Samsung S21 Case</h1>
    <p class="price">$<?php echo $s21case_price; ?></p>
    <p id="stock3"><?php echo $s21case_stock; ?> left</p>
    <p>Galaxy S21 Case</p>
    <p><button onclick="location.href = 'cart.php';">Purchase</button></p>
</div>

<div class="card">
    <img src="./Photos/4.jpg" alt="woosh" style="width:100%">
    <h1>Woosh! Screen Cleaner</h1>
    <p class="price">$<?php echo $woosh_price; ?></p>
    <p id="stock4"><?php echo $woosh_stock; ?> left</p>
    <p>Keep your screen clean!</p>
    <p><button onclick="location.href = 'cart.php';">Purchase</button></p>
</div>

</body>
    
</html>
