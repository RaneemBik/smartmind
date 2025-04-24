<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Required</title>
    <meta http-equiv="refresh" content="5;url=login.php"> <!-- redirect in 5 seconds -->
    <style>
        body {
            background: linear-gradient(135deg, #a18cd1, #fbc2eb);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            text-align: center;
            padding: 30px 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            backdrop-filter: blur(8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
            max-width: 400px;
            width: 90%;
        }

        h1 {
            margin-bottom: 16px;
        }

        p {
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background-color: #b366ff;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #9933ff;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Hold on! 🔐</h1>
        <p>You must be logged in to take the IQ test.</p>
        <p>Redirecting you to the login page...</p>
        <a href="login.php" class="btn">Go to Login Now</a>
    </div>
</body>
</html>
