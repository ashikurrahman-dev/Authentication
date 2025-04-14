<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Register</h2>
        <form action="#" method="POST" class="space-y-5">
            <div>
                <label class="block mb-1 text-gray-600">Name</label>
                <input type="text" name="name" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>
            <div>
                <label class="block mb-1 text-gray-600">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>
            <div>
                <label class="block mb-1 text-gray-600">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>
            <div>
                <label class="block mb-1 text-gray-600">Confirm Password</label>
                <input type="password" name="retype_password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>
            <button type="submit"
                class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition duration-300">
                Sign In
            </button>
        </form>
        <div class="flex justify-between items-center mt-4 text-sm">
            <a href="http://weblearn.test/authentication/public/login.php" class="text-purple-600 hover:underline">Back to Sign In</a>
            <a href="/forgot-password" class="text-purple-600 hover:underline">Forgot Password?</a>
        </div>
    </div>
</body>

</html>