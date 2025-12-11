<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>
        <form  method="POST">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="Username" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="Password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex justify-between items-center">
                <input type="submit" value="Login" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
                <a href="#" class="text-sm text-blue-500 hover:text-blue-700">Forgot Password?</a>
            </div>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Don't have an account? <a href="Register.php" class="text-blue-500 hover:text-blue-700">Sign up</a></p>
        </div>
    </div>
    <?php
session_start();
$conn = new mysqli("localhost", "root", "", "movieplanner");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    if($Username == 'admin' && $Password == 'admin@123')
    {
        header("Location: AdminDashboard.php"); 
        exit(); 
    }
    else 
    {
        $stmt = $conn->prepare("SELECT Password FROM User WHERE Username = ?");
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($Password == $row['Password']) {
                header("Location: index2.php"); 
                exit(); 
            } else {
                echo "<script>alert('Invalid Password');</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }
        $stmt->close();
    }
}
$conn->close();
?>

</body>
</html>
