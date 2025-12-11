<?php
$conn = new mysqli("localhost", "root", "", "movieplanner");

$sql = "CREATE TABLE IF NOT EXISTS Movie (
    MovieID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    Genre VARCHAR(100),
    Description TEXT,
    Duration INT,
    Poster LONGBLOB
)";
if ($conn->query($sql) === TRUE) {
    echo "✅ Movie table created successfully!";
} else {
    echo "❌ Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];

    // Read uploaded image
    $poster = file_get_contents($_FILES['poster']['tmp_name']);

    // Prepare and insert
    $posterData = ''; // Initialize as placeholder
    $stmt = $conn->prepare("INSERT INTO Movie (Title, Genre, Description, Duration, Poster) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssib", $title, $genre, $description, $duration, $posterData);
    $posterData = $poster;
    $stmt->send_long_data(4, $poster);
    $stmt->execute();

    header("Location: AdminDashboard.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-3xl font-bold mb-6">Add New Movie</h1>
    <form method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md max-w-md mx-auto">
    <input type="text" name="title" placeholder="Movie Title" class="w-full border px-3 py-2 mb-4 rounded" required><br><br>
    <input type="text" name="genre" placeholder="Genre" class="w-full border px-3 py-2 mb-4 rounded"><br><br>
    <textarea name="description" placeholder="Description" class="w-full border px-3 py-2 mb-4 rounded"></textarea><br><br>
    <input type="number" name="duration" placeholder="Duration (mins)" class="w-full border px-3 py-2 mb-4 rounded" required><br><br>
    <input type="file" name="poster" class="w-full border px-3 py-2 mb-4 rounded" required><br><br>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add Movie</button>
	<a href="AdminDashboard.php" class="ml-4 text-blue-600 underline">Back to Dashboard</a>
</form>
</body>
</html>