<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleSheet.css">
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
    
    <?php

        //connect to databse
	    $host = "localhost";
        $database = "princip_project";
        $user = "root";
        $pass = "";

        $conn = mysqli_connect($host, $user, $pass, $database);

        if(mysqli_connect_errno()){
            die ("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
        } 

        //retrieve all prices
        $sql1 = 'SELECT item_price FROM inventory';
        $retval1 = mysqli_query($conn, $sql1);

        $prices = mysqli_fetch_all($retval1, MYSQLI_ASSOC);
        
        $s21_price =  htmlspecialchars($prices[0]['item_price']);
        $charger_price =  htmlspecialchars($prices[1]['item_price']);
        $s21case_price =  htmlspecialchars($prices[2]['item_price']);
        $woosh_price =  htmlspecialchars($prices[3]['item_price']);

        //retrieve all stock counts
        $sql2 = 'SELECT item_quantity FROM inventory';
        $retval2 = mysqli_query($conn, $sql2);

        $stock = mysqli_fetch_all($retval2, MYSQLI_ASSOC);
        
        $s21_stock =  htmlspecialchars($stock[0]['item_quantity']);
        $charger_stock =  htmlspecialchars($stock[1]['item_quantity']);
        $s21case_stock =  htmlspecialchars($stock[2]['item_quantity']);
        $woosh_stock =  htmlspecialchars($stock[3]['item_quantity']);

        //retrieve amount purchased from cart.php form
        $s21_bought = isset($_POST['button1']) ? $_POST['button1'] : 0;
        $charger_bought = isset($_POST['button2']) ? $_POST['button2'] : 0;
        $s21case_bought = isset($_POST['button3']) ? $_POST['button3'] : 0;
        $woosh_bought = isset($_POST['button4']) ? $_POST['button4'] : 0;

        //calculate prices to display
        $sub_total = round(($s21_bought * $s21_price) + ($charger_bought * $charger_price) + ($s21case_bought * $charger_price) + ($woosh_bought * $woosh_price), 2);
        $taxes = round(($sub_total*0.13), 2);
        $total = $sub_total + $taxes;
        
        //update stock counts from purchase
        $s21_newstock = $s21_stock - $s21_bought;
        $charger_newstock = $charger_stock - $charger_bought;
        $s21case_newstock = $s21case_stock - $s21case_bought;
        $woosh_newstock = $woosh_stock - $woosh_bought;

        $update_stock = 'UPDATE `inventory` SET `item_quantity` = CASE `item_num` WHEN 1 THEN '.$s21_newstock.' WHEN 2 THEN '.$charger_newstock.' WHEN 3 THEN '.$s21case_newstock.' WHEN 4 THEN '.$woosh_newstock.' END WHERE `item_num` BETWEEN 1 AND 4';
        $update1 = mysqli_query($conn, $update_stock);

        //echo successful purchase
        echo "<h1 style='padding-top: 75px; text-align: center;'>Transaction Successful! Use The Navbar Above To Continue Shopping!</h1>";

        //handle refund
        $s21_refund = isset($_POST['refund1']) ? $_POST['refund1'] : 0;
        $charger_refund = isset($_POST['refund2']) ? $_POST['refund2'] : 0;
        $s21case_refund = isset($_POST['refund3']) ? $_POST['refund3'] : 0;
        $woosh_refund = isset($_POST['refund4']) ? $_POST['refund4'] : 0;

        //update stock counts from refund
        $s21_refund_stock = $s21_newstock + $s21_refund;
        $charger_refund_stock = $charger_newstock + $charger_refund;
        $s21case_refund_stock = $s21case_newstock + $s21case_refund;
        $woosh_refund_stock = $woosh_newstock + $woosh_refund;

        $update_refund = 'UPDATE `inventory` SET `item_quantity` = CASE `item_num` WHEN 1 THEN '.$s21_refund_stock.' WHEN 2 THEN '.$charger_refund_stock.' WHEN 3 THEN '.$s21case_refund_stock.' WHEN 4 THEN '.$woosh_refund_stock.' END WHERE `item_num` BETWEEN 1 AND 4';
        $update2 = mysqli_query($conn, $update_refund);
        
        //close connection to database
        mysqli_close($conn);
        
    ?>
</body>
</html>