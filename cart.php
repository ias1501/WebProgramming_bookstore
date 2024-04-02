<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <div class="container">
        <h1>Shopping Cart</h1>
        <?php
        session_start();
        if (!empty($_SESSION['user'])) {
            if (!empty($_POST['title']) && !empty($_POST['price'])) {
                $_SESSION['cart'][] = ['title' => $_POST['title'], 'price' => $_POST['price']];
            }

            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    echo "<div class='item'>";
                    echo "<h2>{$item['title']}</h2>";
                    echo "<p>Price: $ {$item['price']}</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }
            echo "<a href='index.php'>Continue Shopping</a>";
        } else {
            echo "<p>Please login to view your cart.</p>";
        }
        ?>
    </div>
</body>
</html>
