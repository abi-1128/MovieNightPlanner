<?php
// Start session if needed and connect to database (if any)
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Night Planner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #1c1c1c;
            color: #fff;
        }
        .hero {
            padding: 100px 0;
            text-align: center;
            background: url('assets/movie_bg.jpg') center/cover no-repeat;
            color: white;
        }
        .btn-custom {
            background-color: #ff4c60;
            color: white;
        }
        .btn-custom:hover {
            background-color: #e04354;
        }
        .features {
            padding: 50px 20px;
            background-color: #2c2c2c;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">🎬 Movie Night Planner</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="planner.php">Plan a Night</a></li>
                    <li class="nav-item"><a class="nav-link" href="MovieList.php">Browse Movies</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">WishList</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">Favourites</a></li>
                    <li class="nav-item"><a class="nav-link" href="index1.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center justify-content-center flex-column">
        <h1 class="display-4">Your Ultimate Movie Night Starts Here</h1>
        <p class="lead">Plan, invite, and enjoy movie nights with your favorite people.</p>
        <a href="planner.php" class="btn btn-lg btn-custom mt-3">Start Planning</a>
    </section>

    <!-- Features Section -->
    <section class="features text-center">
        <div class="container">
            <h2 class="mb-4">Why Use Movie Night Planner?</h2>
            <div class="row">
                <div class="col-md-4">
                    <h4>🎥 Movie Suggestions</h4>
                    <p>Find movies based on mood, genre, or ratings.</p>
                </div>
                <div class="col-md-4">
                    <h4>👥 Invite Friends</h4>
                    <p>Create private movie nights and send invites.</p>
                </div>
                <div class="col-md-4">
                    <h4>🗓️ Smart Scheduler</h4>
                    <p>Find the perfect time that works for everyone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-4 bg-dark">
        <p class="mb-0">&copy; <?php echo date("Y"); ?> Movie Night Planner. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
