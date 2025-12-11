<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Movie Night Planner</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #1c1c1e;
      color: white;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .hero-section {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      background-image: url('assets/movie-bg.jpg'); /* optional background */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      backdrop-filter: blur(4px);
    }
    .overlay {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 3rem;
      border-radius: 1rem;
    }
    .btn-custom {
      background-color: #f39c12;
      border: none;
    }
    .btn-custom:hover {
      background-color: #e67e22;
    }
  </style>
</head>
<body>

  <div class="hero-section">
    <div class="overlay">
      <h1 class="display-4 fw-bold">🎬 Movie Night Planner</h1>
      <p class="lead mb-4">Plan the perfect movie night with your friends, from films to snacks!</p>
      <div class="d-flex justify-content-center gap-3">
        <a href="Form.php" class="btn btn-custom btn-lg">Login</a>
        <a href="Register.php" class="btn btn-outline-light btn-lg">Sign Up</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
