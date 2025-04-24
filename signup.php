<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .background-design {
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, #6b46c1 0%, #805ad5 100%);
            clip-path: polygon(0 0, 0 100%, 100% 100%);
            z-index: -1;
        }
        .background-design::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0.1) 75%, transparent 75%, transparent);
            background-size: 20px 20px;
            opacity: 0.3;
        }
        .zigzag {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                135deg,
                rgba(211, 211, 211, 0.5) 0%,
                rgba(211, 211, 211, 0.5) 0.625%,
                transparent 0.625%,
                transparent 1.25%
            );
            opacity: 0.3;
            z-index: 0;
        }
    </style>
</head>
<body class="bg-gray-100 relative">
    <div class="background-design">
        <div class="zigzag"></div>
    </div>
    <div class="flex flex-col md:flex-row w-full h-full">
        <!-- Left Section -->
        <div class="relative bg-purple-600 p-8 flex flex-col items-center justify-center text-white md:w-1/2">
            <div class="absolute inset-0">
                <div class="zigzag"></div>
            </div>
            <div class="relative z-10 bg-purple-700 bg-opacity-50 p-6 rounded-lg text-center">
                <div class="text-2xl font-bold mb-4">SmartMind:</div>
                <div class="text-lg mb-4">Where logic meets mastery - sign up to sharpen your mind</div>
                <div class="relative">
                <div class="absolute -left-2 -top-2 bg-white p-4 rounded-full">
                        <i class="fas fa-lightbulb text-purple-600 text-4xl"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Section -->
        <div class="p-8 md:w-1/2 flex flex-col justify-center items-center bg-white">
            <h2 class="text-2xl font-bold mb-6 text-center">SIGN UP</h2>
            <form class="w-full max-w-sm" action="registrationAction.php" method="post">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            <i class="fas fa-user"></i> Username
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="txtUsername" placeholder="Username" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            <i class="fas fa-envelope"></i> Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="txtEmail" placeholder="Email" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="dob">
            <i class="fas fa-calendar-alt"></i> Date of Birth
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dob" type="date" name="txtDob" required>
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            <i class="fas fa-lock"></i> Password
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="txtPassword" placeholder="Password" required>
    </div>
    <div class="flex items-center justify-center">
        <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Sign Up Now
        </button>
    </div>
</form>
            <p class="text-center text-gray-600 text-sm mt-4">
                Already have an account? <a href="login.php" class="text-purple-600 hover:text-purple-800">Login</a>
            </p>
            <p class="text-center text-gray-600 text-sm mt-4">
                <a href="index.php" class="text-purple-600 hover:text-purple-800">Back Home</a>
            </p>
        </div>
    </div>
</body>
</html>