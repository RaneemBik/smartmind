<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - SMART MIND Academy</title>
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
            <a class="text-purple-600 font-bold" href="about.php">ABOUT US</a>
            <a class="text-purple-600 font-bold" href="rateus.php">RATE US</a>
        </div>
</div>
    <main class="container mx-auto px-4 py-16 relative z-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-purple-600">Contact Us</h1>
            <p class="text-lg text-gray-700 mt-2">We'd love to hear from you! Please fill out the form below to get in touch.</p>
        </div>
        <div class="mt-8 max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
        <form action="process_contact.php" method="POST">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
        <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Your name" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
        <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Your email" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Message</label>
        <textarea name="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" rows="4" placeholder="Your message" required></textarea>
    </div>
    <div class="flex flex-col items-center">
        <button class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 mb-4" type="submit">
            Send Message
        </button>
        <a href="index.php" class="text-purple-600 hover:text-purple-800">Back</a>
    </div>
</form>

        </div>
    </main>
    <div class="background-design"></div>
</body>
</html>