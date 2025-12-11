<?php
$conn = new mysqli("localhost", "root", "", "movieplanner");

// Search
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM Movie WHERE Title LIKE '%$search%' ORDER BY MovieID DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
        <a href="logout.php" class="text-red-600 underline">Logout</a>
    </div>

    <form method="GET" class="mb-4 flex">
        <input type="text" name="search" placeholder="Search movies..." value="<?= $search ?>"
               class="border px-3 py-2 rounded-l w-full">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700">Search</button>
        <a href="export_movies.php" class="ml-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Export CSV</a>
    </form>
    <a href="Add_movie.php" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 mb-4 inline-block">Add Movie</a>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Movies Gallery</h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <?php if (!empty($row['Poster'])): ?>
    <img src="data:image/jpeg;base64,<?= base64_encode($row['Poster']) ?>" 
         alt="<?= htmlspecialchars($row['Title']) ?>"
         class="w-full h-48 object-cover">
<?php else: ?>
    <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-gray-500">No Image</div>
<?php endif; ?>

            <div class="p-4">
                <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($row['Title']) ?></h2>
                <p class="text-sm text-gray-600 mb-1"><strong>Genre:</strong> <?= htmlspecialchars($row['Genre']) ?></p>
                <p class="text-sm text-gray-600 mb-1"><strong>Duration:</strong> <?= $row['Duration'] ?> min</p>
                <p class="text-sm text-gray-700 mb-2"><strong>Description:</strong> <?= nl2br(htmlspecialchars($row['Description'])) ?></p>
                <div class="flex justify-between">
                    <a href="edit_movie.php?id=<?= $row['MovieID'] ?>" class="text-blue-500 hover:underline">Edit</a>
                    <a href="delete_movie.php?id=<?= $row['MovieID'] ?>"
                       onclick="return confirm('Are you sure you want to delete this movie?');"
                       class="text-red-500 hover:underline">Delete</a>
                </div>
            </div>
        </div>
        <?php endwhile ?>
    </div>
</body>
</html>
