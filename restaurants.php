<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedMe - Restaurants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar-brand {
            font-weight: 700;
        }
        .page-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #212529;
        }
        .page-subtitle {
            color: #6c757d;
        }
        .restaurant-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 22px rgba(0,0,0,0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            height: 100%;
        }
        .restaurant-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 26px rgba(0,0,0,0.12);
        }
        .restaurant-top {
            height: 120px;
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
        }
        .restaurant-body h3 {
            font-size: 1.5rem;
            font-weight: 700;
        }
        .badge-custom {
            font-size: 0.9rem;
            padding: 8px 12px;
            border-radius: 50px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand" href="index.php">🍔 FeedMe</a>
        <div>
            <a href="index.php" class="btn btn-outline-secondary me-2">Home</a>
            <a href="cart.php" class="btn btn-primary">Cart</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center mb-5">
        <h1 class="page-title">Explore Restaurants</h1>
        <p class="page-subtitle">Choose from our available restaurants and view their menu items.</p>
    </div>

    <div class="row g-4">
        <?php
        $result = $conn->query("SELECT * FROM restaurants");

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-md-6 col-lg-6">
                <div class="card restaurant-card">
                    <div class="restaurant-top"></div>
                    <div class="card-body restaurant-body p-4">
                        <h3 class="mb-2"><?php echo htmlspecialchars($row['name']); ?></h3>
                        <span class="badge bg-success badge-custom mb-3">
                            <?php echo htmlspecialchars($row['cuisine']); ?>
                        </span>
                        <p class="text-muted mb-4">
                            <?php echo htmlspecialchars($row['description']); ?>
                        </p>
                        <a href="menu.php?id=<?php echo $row['restaurant_id']; ?>" class="btn btn-success w-100">
                            View Menu
                        </a>
                    </div>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>No restaurants found.</p>";
        }
        ?>
        <a href="orders.php" class="btn btn-outline-dark">Orders</a>
    </div>
</div>

</body>
</html>