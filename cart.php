<?php
include 'config.php';
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$message = "";

// Add item to cart
if (isset($_GET['add'])) {
    $_SESSION['cart'][] = (int) $_GET['add'];
}

// Place order
if (isset($_POST['place_order'])) {
    if (count($_SESSION['cart']) > 0) {
        $total = 0;

        // calculate total
        foreach ($_SESSION['cart'] as $item_id) {
            $result = $conn->query("SELECT * FROM menu_items WHERE item_id = $item_id");
            if ($result && $row = $result->fetch_assoc()) {
                $total += $row['price'];
            }
        }

        // for now use user_id = 1
        $user_id = 1;

        // insert into orders
        $conn->query("INSERT INTO orders (user_id, total) VALUES ($user_id, $total)");
        $order_id = $conn->insert_id;

        // insert into order_items
        foreach ($_SESSION['cart'] as $item_id) {
            $result = $conn->query("SELECT * FROM menu_items WHERE item_id = $item_id");
            if ($result && $row = $result->fetch_assoc()) {
                $price = $row['price'];
                $conn->query("INSERT INTO order_items (order_id, item_id, quantity) VALUES ($order_id, $item_id, 1)");
            }
        }

        $_SESSION['cart'] = [];
        $message = "Order placed successfully!";
    } else {
        $message = "Your cart is empty.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedMe - Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .cart-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">🍔 FeedMe</a>
        <div>
            <a href="restaurants.php" class="btn btn-outline-secondary me-2">Restaurants</a>
            <a href="cart.php" class="btn btn-primary">Cart</a>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="mb-4">Your Cart</h1>

    <?php if ($message != "") { ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>

    <?php
    $total = 0;

    if (count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $item_id) {
            $result = $conn->query("SELECT * FROM menu_items WHERE item_id = $item_id");

            if ($result && $row = $result->fetch_assoc()) {
                echo "<div class='card cart-card p-3 mb-3'>";
                echo "<p class='mb-0'><strong>" . htmlspecialchars($row['name']) . "</strong> - $" . number_format($row['price'], 2) . "</p>";
                echo "</div>";
                $total += $row['price'];
            }
        }

        echo "<h3 class='mt-4'>Total: $" . number_format($total, 2) . "</h3>";
    ?>
        <form method="post">
            <button type="submit" name="place_order" class="btn btn-success mt-3">Place Order</button>
        </form>
    <?php
    } else {
        echo "<div class='alert alert-info'>Your cart is empty.</div>";
    }
    ?>

    <a href="restaurants.php" class="btn btn-secondary mt-3">Back to Restaurants</a>
    <a href="orders.php" class="btn btn-outline-dark">Orders</a>
</div>

</body>
</html>