<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet"/>
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
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #6b46c1 0%, #805ad5 100%);
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
    </style>
    <script>
        let timerInterval;
        let seconds = 0;
        let minutes = 0;
        let hours = 0;
        let currentQuestionIndex = 0;
        let questions = [];

        function startTimer() {
            timerInterval = setInterval(() => {
                seconds++;
                if (seconds === 60) {
                    seconds = 0;
                    minutes++;
                }
                if (minutes === 60) {
                    minutes = 0;
                    hours++;
                }
                document.getElementById('timer').innerText = 
                    (hours < 10 ? '0' + hours : hours) + ':' + 
                    (minutes < 10 ? '0' + minutes : minutes) + ':' + 
                    (seconds < 10 ? '0' + seconds : seconds);
            }, 1000);
        }

        function handleOptionClick(selectedOption) {
            if (!timerInterval) {
                startTimer();
            }
            const question = questions[currentQuestionIndex];
            if (selectedOption === question.answer) {
                console.log("Correct answer!");
            } else {
                console.log("Incorrect answer. The correct answer was: " + question.answer);
            }
            nextQuestion();
        }

        function nextQuestion() {
            if (currentQuestionIndex < questions.length - 1) {
                currentQuestionIndex++;
                displayQuestion();
            } else {
                alert("Test completed!");
                // Optionally, redirect to a results page or show results here
            }
        }

        function displayQuestion() {
            const questionContainer = document.getElementById('question-container');
            const question = questions[currentQuestionIndex];
            questionContainer.innerHTML = `
                <h3 class="text-lg text-blue-600">Question ${currentQuestionIndex + 1}/${questions.length}</h3>
                <p class="text-blue-600 text-center mb-4">${question.question}</p>
                <div class="grid grid-cols-2 gap-4">
                    ${JSON.parse(question.options).map(option => `
                        <button class="bg-gray-200 text-gray-700 rounded-lg py-2" onclick="handleOptionClick('${option}')">${option}</button>
                    `).join('')}
                </div>
            `;
        }

        function startTest() {
            // Fetch 25 random questions from the database
            fetchQuestions();
        }

        function fetchQuestions() {
            fetch(`http://localhost:3000/questions/random?count=25`) // Update with your actual API endpoint
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    questions = data; // Assuming the API returns an array of questions
                    currentQuestionIndex = 0;
                    displayQuestion();
                })
                .catch(error => {
                    console.error('Error fetching questions:', error);
                    alert('Failed to load questions. Please try again later.');
                });
        }

        window.onload = function() {
            document.getElementById('start-button').onclick = startTest;
        };
    </script>
</head>
<body class="relative">
    <div class="background-design"></div>
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-3xl relative">
            <div class="text-center">
                <h1 class="text-2xl font-bold text-blue-600">IQ TEST</h1>
                <h2 class="text-xl text-blue-600">CHECK YOUR LEVEL</h2>
                <button id="start-button" class="bg-purple-600 text-white py-2 px-4 rounded-full mt-4">Start Test</button>
            </div>
            <div class="flex justify-center my-4">
                <div class="bg-gray-200 text-gray-700 rounded-full px-4 py-2" id="timer">00:00:00</div>
            </div>
            <div id="question-container" class="bg-white p-6 rounded-lg shadow-md"></div>
        </div>
    </div>
</body>
</html>