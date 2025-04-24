<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - SMART MIND Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .background-design {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, #6b46c1 0%, #805ad5 100%);
            clip-path: polygon(100% 0, 100% 100%, 0 100%);
            z-index: -1;
        }
        .background-design::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0.1) 75%, transparent 75%, transparent);
            background-size: 20px 20px;
            opacity: 0.3;
        }
    </style>
</head>
<body class="bg-gray-100 relative overflow-hidden">
<div class="flex justify-center items-center p-4 relative z-10">
        <div class="flex space-x-8">
            <a class="text-purple-600 font-bold" href="index.php">HOME</a>
            <a class="text-purple-600 font-bold" href="contact.php">CONTACT US</a>
            <a class="text-purple-600 font-bold" href="rateus.php">RATE US</a>
        </div>
</div>
    <main class="container mx-auto px-4 py-16 relative z-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-purple-600">About Us</h1>
            <p class="text-lg text-gray-700 mt-2">Welcome to SMART MIND Academy, your ultimate destination for logic training and cognitive enhancement.</p>
        </div>
        <div class="mt-8 max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-purple-600">Our Mission</h2>
                <p class="text-gray-700 mt-2">At SMART MIND Academy, we aim to provide the best tools and resources to help you improve your logical thinking and problem-solving skills. Our platform offers a variety of exercises and challenges designed to stimulate your mind and enhance your cognitive abilities.</p>
            </div>
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-purple-600">Why Choose Us?</h2>
                <p class="text-gray-700 mt-2">We believe that everyone has the potential to improve their logic and reasoning skills. Our carefully curated content is suitable for all ages and skill levels, ensuring that you can find the right challenges to match your needs. Join us and start your journey towards a sharper mind today!</p>
            </div>
            <p class="text-center text-gray-600 text-sm mt-4">
                <a href="profile.php" class="text-purple-600 hover:text-purple-800">Back Home</a>
            </p>
        </div>
    </main>
    <div class="background-design"></div>
</body>
</html>