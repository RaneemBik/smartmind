<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Us - SMART MIND Academy</title>
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
        .star {
            cursor: pointer;
            color: gray;
        }
        .star.hover, .star.selected {
            color: yellow;
        }
    </style>
</head>
<body class="bg-gray-100 relative overflow-hidden">
    <div class="flex space-x-8 px-6 pt-6">
        <a class="text-purple-600 font-bold" href="index.php">HOME</a>
        <a class="text-purple-600 font-bold" href="about.php">ABOUT US</a>
        <a class="text-purple-600 font-bold" href="contact.php">CONTACT US</a>
    </div>

    <main class="container mx-auto px-4 py-16 relative z-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-purple-600">Rate Us</h1>
            <p class="text-lg text-gray-700 mt-2">We value your feedback! Please rate us and leave a comment.</p>
        </div>
        <div class="mt-8 max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
            <form action="submit_rating.php" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">Rating</label>
                    <div class="flex items-center">
                        <span class="star" data-value="1"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="2"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="3"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="4"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="5"><i class="fas fa-star"></i></span>
                    </div>
                    <input type="hidden" id="rating" name="rating" value="0" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">Comment</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="comment" name="comment" rows="4" placeholder="Your comment"></textarea>
                </div>
                <div class="flex flex-col items-center">
                    <button class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 mb-4" type="submit">
                        Send Rating
                    </button>
                </div>
            </form>
        </div>
    </main>
    <div class="background-design"></div>

    <script>
        // Star rating selection
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating');
        const submitButton = document.querySelector('button[type="submit"]');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = star.getAttribute('data-value');
                ratingInput.value = rating;

                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('selected');
                    } else {
                        s.classList.remove('selected');
                    }
                });
            });

            star.addEventListener('mouseover', () => {
                stars.forEach((s, index) => {
                    if (index < star.getAttribute('data-value')) {
                        s.classList.add('hover');
                    } else {
                        s.classList.remove('hover');
                    }
                });
            });

            star.addEventListener('mouseout', () => {
                stars.forEach(s => s.classList.remove('hover'));
            });
        });

        // Prevent submission if no rating is selected
        submitButton.addEventListener('click', (e) => {
            if (parseInt(ratingInput.value) === 0) {
                alert("Please select a star rating before submitting.");
                e.preventDefault();
            }
        });

        // Handle update_rating.php forms (if any exist on the page)
        const updateForms = document.querySelectorAll('form[action="update_rating.php"]');
        updateForms.forEach(form => {
            const updateStars = form.querySelectorAll('.star');
            const updateRatingInput = form.querySelector('input[name="rating"]');

            updateStars.forEach(star => {
                star.addEventListener('click', () => {
                    const rating = star.getAttribute('data-value');
                    updateRatingInput.value = rating;

                    updateStars.forEach((s, index) => {
                        if (index < rating) {
                            s.classList.add('selected');
                        } else {
                            s.classList.remove('selected');
                        }
                    });
                });

                star.addEventListener('mouseover', () => {
                    updateStars.forEach((s, index) => {
                        if (index < star.getAttribute('data-value')) {
                            s.classList.add('hover');
                        } else {
                            s.classList.remove('hover');
                        }
                    });
                });

                star.addEventListener('mouseout', () => {
                    updateStars.forEach(s => s.classList.remove('hover'));
                });
            });
        });
    </script>
</body>
</html>
