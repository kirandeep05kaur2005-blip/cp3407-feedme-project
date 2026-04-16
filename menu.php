<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedMe - Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .menu-card {
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
    <h1 class="mb-4">Menu</h1>

    <?php
    if (!isset($_GET['id'])) {
        echo "<div class='alert alert-warning'>No restaurant selected.</div>";
        echo "<a href='restaurants.php' class='btn btn-secondary'>Back to Restaurants</a>";
        exit;
    }

    $id = (int) $_GET['id'];

    $result = $conn->query("SELECT * FROM menu_items WHERE restaurant_id = $id");

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card menu-card p-4 mb-3'>";
            echo "<h4>" . htmlspecialchars($row['name']) . " - $" . number_format($row['price'], 2) . "</h4>";
            echo "<a href='cart.php?add=" . $row['item_id'] . "' class='btn btn-primary mt-3'>Add to Cart</a>";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-info'>No menu items found for this restaurant.</div>";
    }
    ?>

    <a href="restaurants.php" class="btn btn-secondary mt-3">Back to Restaurants</a>
</div>

</body>
</html>