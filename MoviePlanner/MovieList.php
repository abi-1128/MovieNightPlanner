<?php
$conn = new mysqli("localhost", "root", "", "movieplanner");

// Search
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM Movie WHERE Title LIKE '%$search%' ORDER BY MovieID DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradient {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }
        .animated-gradient {
            background: linear-gradient(-45deg, #6a11cb, #2575fc, #ff416c, #ff4b2b);
            background-size: 300% 300%;
            animation: gradient 15s ease infinite;
        }
        .glass {
            background-color: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>
<body class="min-h-screen animated-gradient text-white">

    <div class="container mx-auto px-4 py-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
            <h1 class="text-4xl font-extrabold drop-shadow-lg">🎬 Recommended Movies</h1>
            <form method="GET" class="flex mt-4 sm:mt-0">
                <input type="text" name="search" placeholder="Search movies..." value="<?= htmlspecialchars($search) ?>"
                    class="border border-gray-300 text-black rounded-l px-4 py-2 w-full sm:w-64 focus:outline-none focus:ring focus:border-blue-300">
                <button type="submit"
                    class="bg-blue-700 text-white px-4 py-2 rounded-r hover:bg-blue-800 transition">Search</button>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="glass rounded-2xl shadow-xl hover:shadow-2xl transition overflow-hidden text-black">
                <?php if (!empty($row['Poster'])): ?>
                    <img src="data:image/jpeg;base64,<?= base64_encode($row['Poster']) ?>" 
                         alt="<?= htmlspecialchars($row['Title']) ?>"
                         class="w-full h-48 object-cover">
                <?php else: ?>
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                <?php endif; ?>

                <div class="p-4">
                    <h2 class="text-xl font-bold text-white"><?= htmlspecialchars($row['Title']) ?></h2>
                    <p class="text-sm text-white"><strong>Genre:</strong> <?= htmlspecialchars($row['Genre']) ?></p>
                    <p class="text-sm text-white"><strong>Duration:</strong> <?= $row['Duration'] ?> min</p>
                    <p class="text-sm text-white mt-2"><strong>Description:</strong><br> <?= nl2br(htmlspecialchars($row['Description'])) ?></p>
                    <a href="#" class="text-blue-500 font-extrabold hover:underline mt-2">View Details</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

</body>
</html>
