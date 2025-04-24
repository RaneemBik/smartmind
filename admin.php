<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .bg-pattern {
            background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0.1) 75%, transparent 75%, transparent);
            background-size: 20px 20px;
        }
        .diagonal-section {
            clip-path: polygon(0 0, 100% 0, 45% 100%, 0% 100%);
        }
    </style>
</head>
<body class="bg-purple-100 h-screen">
    <div class="flex flex-col md:flex-row h-full bg-white">
        <!-- Left Sidebar -->
        <div class="bg-purple-600 text-white p-4 flex flex-col justify-between w-full md:w-1/4 bg-pattern diagonal-section">
            <div></div>
            <div class="flex justify-start items-center mt-auto mb-4 cursor-pointer">
                <i class="fas fa-sign-out-alt"></i>
                <span class="ml-2">Logout</span>
            </div>
        </div>
        <!-- Main Content -->
        <div class="bg-white p-8 w-full md:w-3/4 flex flex-col justify-center">
            <h1 class="text-purple-600 text-2xl font-bold mb-8 text-center justify-center">Admin Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <button class="bg-purple-200 text-purple-600 p-4 rounded-lg">Manage Quizzes</button>
                <button class="bg-purple-200 text-purple-600 p-4 rounded-lg">Manage Problem-Solving Tests</button>
                <button class="bg-purple-200 text-purple-600 p-4 rounded-lg">Manage Levels</button>
                <button class="bg-purple-200 text-purple-600 p-4 rounded-lg">Manage Users</button>
                <button class="bg-purple-200 text-purple-600 p-4 rounded-lg col-span-1 md:col-span-2">Manage Admins</button>
            </div>
        </div>
    </div>
</body>
</html>