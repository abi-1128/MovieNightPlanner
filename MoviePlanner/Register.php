<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body
  class="bg-cover bg-center bg-no-repeat min-h-screen flex justify-center items-center"
  style="background-color:rgba(6, 6, 6, 0.87);"
>
  <div class="w-full max-w-md bg-white/20 backdrop-blur-md p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center mb-6 text-white">Register</h2>
    <form method="POST">
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-white">Username</label>
        <input type="text" id="username" name="Username"
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 bg-white/50 text-black" required>
      </div>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-white">Email</label>
        <input type="email" id="email" name="Email"
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 bg-white/50 text-black" required>
      </div>
        <div class="mb-4">
        <label for="ctime" class="block text-sm font-medium text-white">Created Time</label>
        <input type="datetime-local" id="ctime" name="Ctime"
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 bg-white/50 text-black" required>
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-white">Password</label>
        <input type="password" id="password" name="Password"
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 bg-white/50 text-black" required>
      </div>
      <div class="mb-4">
        <label for="cpassword" class="block text-sm font-medium text-white">Repeat-Password</label>
        <input type="password" id="cpassword" name="Cpassword"
          class="mt-1 block w-full px-4 py-2 border border-white-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 bg-white/50 text-black" required>
      </div>
      <div class="flex justify-between items-center gap-4">
  <div class="w-1/2">
    <button type="submit"
      class="w-full bg-zinc-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-200">
      Register
    </button>
  </div>
  <div class="w-1/2">
  <button type="button"
  onclick="window.location.href='index1.php'"
  class="w-full bg-zinc-500 text-white py-2 px-4 rounded-lg kkkkkkkkkhover:bg-red-600 transition duration-200">
  Back
</button>

  </div>
</div>

    </form>
  </div>
  <?php
$conn = new mysqli("localhost", "root", "", "movieplanner");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Username   = $_POST['Username'];
    $Email      = $_POST['Email'];
    $Password   = $_POST['Password'];
    $Cpassword  = $_POST['Cpassword'];
    if ($Password !== $Cpassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        $event_time = $_POST['Ctime'];
        $event_time = date('Y-m-d H:i:s', strtotime($event_time));
        $stmt = $conn->prepare("INSERT INTO User (Username, Email, Password, Ctime) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssss", $Username, $Email, $Password, $event_time);
        if ($stmt->execute()) {
            echo "<script>alert('You are successfully registered!');</script>";
        } else {
            echo "<script>alert('Execute failed: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    }
}

$conn->close();
?>


</body>
</html>