<?php 
require("../includes/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md text-center">
    <h1 class="text-3xl font-bold text-purple-700 mb-4">Welcome!</h1>

    <!-- Name and Email -->
    <div class="mb-6">
      <p class="text-gray-700 text-lg"><strong>Name:</strong> <?= $_SESSION['user']['name'] ?></p>
      <p class="text-gray-600 text-lg"><strong>Email:</strong> <?= $_SESSION['user']['email'] ?></p>
    </div>

    <!-- Logout Button -->
    <form action="<?= BASE_URL; ?>controller/logoutController.php" method="POST">
      <!-- CSRF token if in Laravel -->
      <button type="submit"
              class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition duration-300">
        Logout
      </button>
    </form>
  </div>

</body>
</html>
