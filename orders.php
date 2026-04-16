<?php
include 'config.php';

$result = $conn->query("
    SELECT o.order_id, o.total
    FROM orders o
    ORDER BY o.order_id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Your Orders</h1>

    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card p-3 mb-3'>";
            echo "<h5>Order #" . $row['order_id'] . "</h5>";
            echo "<p>Total: $" . $row['total'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No orders found.</p>";
    }
    ?>

    <a href="restaurants.php" class="btn btn-secondary">Back</a>
</div>

</body>
</html>