<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logic Puzzle Game for Kids</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f3f4f6;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
        }
        #question {
            font-size: 22px;
            margin: 20px;
        }
        .option {
            display: block;
            padding: 10px;
            margin: 5px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
        }
        .option:hover {
            background-color: #2980b9;
        }
        #score {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Logic Puzzle Game</h1>
        <p id="question">Loading...</p>
        <div id="options"></div>
        <p id="score">Score: 0</p>
    </div>

    <script>
        // Game questions
        const questions = [
            { 
                question: "What comes next? 2, 4, 6, __ ?", 
                options: ["7", "8", "9"], 
                answer: "8" 
            },
            { 
                question: "Which shape has three sides?", 
                options: ["Square", "Triangle", "Circle"], 
                answer: "Triangle" 
            },
            { 
                question: "5 + 3 = ?", 
                options: ["7", "8", "9"], 
                answer: "8" 
            },
            { 
                question: "Which is the odd one out? Cat, Dog, Fish, Car", 
                options: ["Cat", "Dog", "Fish", "Car"], 
                answer: "Car" 
            },
            { 
                question: "What is half of 10?", 
                options: ["2", "5", "8"], 
                answer: "5" 
            }
        ];

        let currentQuestion = 0;
        let score = 0;

        function loadQuestion() {
            if (currentQuestion >= questions.length) {
                document.getElementById("question").innerText = "Game Over! Your final score is: " + score;
                document.getElementById("options").innerHTML = "";
                return;
            }

            let q = questions[currentQuestion];
            document.getElementById("question").innerText = q.question;

            let optionsDiv = document.getElementById("options");
            optionsDiv.innerHTML = "";

            q.options.forEach(option => {
                let button = document.createElement("button");
                button.innerText = option;
                button.className = "option";
                button.onclick = function () {
                    if (option === q.answer) {
                        score++;
                    }
                    currentQuestion++;
                    document.getElementById("score").innerText = "Score: " + score;
                    loadQuestion();
                };
                optionsDiv.appendChild(button);
            });
        }

        loadQuestion();
    </script>

</body>
</html>
