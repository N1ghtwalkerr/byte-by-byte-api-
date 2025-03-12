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
    "Which method is used to select an element by its `id`?" => [
        "options" => ["a. document.querySelector('#id')", "b. document.getElementById('id')", "c. document.getElementsByClassName('id')", "d. document.querySelectorAll('#id')"],
        "explanation" => "The correct method is `document.getElementById('id')`."
    ],
    "What does `innerText` do?" => [
        "options" => ["a. Changes the HTML structure of an element", "b. Changes the text content of an element", "c. Changes the CSS styles of an element", "d. Appends a new child element"],
        "explanation" => "`innerText` modifies the text content of an element."
    ],
    "Which JavaScript method is used to create a new element dynamically?" => [
        "options" => ["a. document.createElement()", "b. document.appendChild()", "c. document.innerHTML()", "d. document.querySelector()"],
        "explanation" => "`document.createElement()` is used to create new elements dynamically."
    ],
    "What is the purpose of `appendChild()` in JavaScript?" => [
        "options" => ["a. Selects an existing element in the DOM", "b. Adds a new element as a child of an existing element", "c. Removes an element from the DOM", "d. Changes the style of an element"],
        "explanation" => "`appendChild()` adds a new element as a child of an existing element."
    ],
    "Which event listener would be used to detect when a button is clicked?" => [
        "options" => ["a. button.addEventListener('hover', function() {...})", "b. button.addEventListener('click', function() {...})", "c. button.addEventListener('keypress', function() {...})", "d. button.addEventListener('load', function() {...})"],
        "explanation" => "`button.addEventListener('click', ...)` detects when a button is clicked."
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

            <a href="javascriptquiz4.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="javascriptviewlesson5.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
