<?php
session_start();

if (!isset($_POST['answers'])) {
    die("Invalid Access");
}

$correctAnswers = $_SESSION['answers'];
$userAnswers = $_POST['answers'];
$score = 0;
$totalQuestions = count($correctAnswers);

// Calculate score
foreach ($correctAnswers as $index => $correct) {
    if (isset($userAnswers[$index]) && $userAnswers[$index] === $correct) {
        $score++;
    }
}

$percentage = ($score / $totalQuestions) * 100;

// Sample questions and explanations (ensure these match your quiz questions dynamically)
$questions = [
    "What is the correct syntax to declare a function in JavaScript?" => [
        "options" => ["a. function myFunction() {}", "b. def myFunction() {}", "c. function = myFunction {}", "d. create function myFunction() {}"],
        "explanation" => "The correct syntax to declare a function is `function myFunction() {}`."
    ],
    "What will `return` do inside a function?" => [
        "options" => ["a. Stop the function and return a value", "b. Print a value to the console", "c. Restart the function execution", "d. Store a value in memory"],
        "explanation" => "`return` stops the function execution and sends a value back to the caller."
    ],
    "Which of the following is the correct syntax for an arrow function?" => [
        "options" => ["a. const add = function(a, b) { return a + b; }", "b. function add(a, b) => a + b;", "c. const add = (a, b) => a + b;", "d. let add(a, b) { return a + b; }"],
        "explanation" => "The correct syntax for an arrow function is `const add = (a, b) => a + b;`."
    ],
    "What will be logged to the console?\n\n```js\nlet age = 18;\nif (age >= 18) {\n    console.log('Adult');\n} else {\n    console.log('Minor');\n}\n```" => [
        "options" => ["a. Minor", "b. Adult", "c. Undefined", "d. Error"],
        "explanation" => "Since `age` is 18, it will log 'Adult' to the console."
    ],
    "How many times will this loop execute?\n\n```js\nfor (let i = 1; i <= 5; i++) {\n    console.log(i);\n}\n```" => [
        "options" => ["a. 4 times", "b. 5 times", "c. 6 times", "d. Infinite times"],
        "explanation" => "The loop will execute 5 times because `i` runs from 1 to 5."
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: Arial, sans-serif; font-size: 18px; }
        .result-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .correct { color: green; }
        .incorrect { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <div class="result-container text-center">
            <h2>Quiz Result</h2>
            <h4>Your Score: <?php echo "$score / $totalQuestions"; ?> (<?php echo round($percentage, 2); ?>%)</h4>
            
            <?php if ($score === $totalQuestions): ?>
                <div class="alert alert-success">🎉 Perfect Score! Great job! 🎉</div>
            <?php else: ?>
                <div class="alert alert-warning">You can try again to get a perfect score! 😊</div>
            <?php endif; ?>

            <h5 class="mt-4">Review Answers</h5>
            <ul class="list-group text-left">
                <?php
                $index = 0;
                foreach ($questions as $question => $data) {
                    echo "<li class='list-group-item'><strong>Q" . ($index + 1) . ":</strong> " . nl2br($question) . "<br>";

                    foreach ($data["options"] as $key => $option) {
                        $letter = chr(97 + $key);
                        $isCorrect = ($letter === $correctAnswers[$index]);
                        $isUserAnswer = isset($userAnswers[$index]) && $userAnswers[$index] === $letter;

                        echo "<span class='" . ($isCorrect ? "correct" : ($isUserAnswer ? "incorrect" : "")) . "'>";
                        echo ($isCorrect ? "✔ " : ($isUserAnswer ? "✘ " : "")) . "$letter) $option";
                        echo "</span><br>";
                    }

                    // Display Correct Answer
                    echo "<br><strong>Correct Answer: " . strtoupper($correctAnswers[$index]) . "</strong>";

                    // Display Explanation
                    echo "<br><em>Explanation: " . $data["explanation"] . "</em>";

                    echo "</li>";
                    $index++;
                }
                ?>
            </ul>

            <a href="javascriptquiz3.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="javascriptviewlesson4.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
