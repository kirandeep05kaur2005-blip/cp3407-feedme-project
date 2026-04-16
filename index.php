<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedMe - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fff8f0, #f8f9fa);
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .hero-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            color: #212529;
        }
        .hero-text {
            font-size: 1.2rem;
            color: #6c757d;
        }
        .btn-custom {
            padding: 12px 28px;
            font-size: 1.1rem;
            border-radius: 12px;
        }
        .feature-box {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
            height: 100%;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">🍔 FeedMe</a>
        <div>
            <a href="restaurants.php" class="btn btn-outline-primary">Browse Restaurants</a>
        </div>
    </div>
</nav>

<div class="container hero">
    <div class="row align-items-center w-100">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="hero-card">
                <h1 class="hero-title mb-3">Welcome to FeedMe 🍔</h1>
                <p class="hero-text mb-4">
                    A simple and modern food ordering system where customers can browse restaurants,
                    explore menus, and place orders quickly.
                </p>
                <a href="restaurants.php" class="btn btn-primary btn-custom">View Restaurants</a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="feature-box">
                        <h4>🍕 Easy Browsing</h4>
                        <p class="text-muted mb-0">View available restaurants and quickly choose your favourite food options.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-box">
                        <h4>🛒 Simple Ordering</h4>
                        <p class="text-muted mb-0">Add menu items to your cart with a clean and user-friendly interface.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-box">
                        <h4>⚡ Fast Experience</h4>
                        <p class="text-muted mb-0">Designed to make food ordering fast, simple, and easy to understand.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-box">
                        <h4>💻 Student Project</h4>
                        <p class="text-muted mb-0">Developed as a CP3407 project using PHP, MySQL, Bootstrap, and XAMPP.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>