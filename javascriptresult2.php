<?php
session_start();
if (!isset($_POST['answers'])) {
    die("Invalid Access");
}

$correctAnswers = $_SESSION['answers']; // Correct answers stored in session
$userAnswers = $_POST['answers']; // User answers submitted via POST
$score = 0;
$totalQuestions = count($correctAnswers);

// Calculate score
foreach ($correctAnswers as $index => $correct) {
    if (isset($userAnswers[$index]) && $userAnswers[$index] === $correct) {
        $score++;
    }
}

$percentage = ($score / $totalQuestions) * 100;

// JavaScript questions and explanations
$questions = [
    "Which keyword is used to declare a variable that can be reassigned?" => [
        "options" => ["a. var", "b. let", "c. const", "d. function"],
        "explanation" => "In JavaScript, `let` is used to declare variables that can be reassigned."
    ],
    "Which of the following is NOT a JavaScript data type?" => [
        "options" => ["a. String", "b. Number", "c. Boolean", "d. Character"],
        "explanation" => "JavaScript does not have a `Character` data type; instead, it uses `String`."
    ],
    "What is the result of `5 + '5'` in JavaScript?" => [
        "options" => ["a. 10", "b. '55'", "c. 55", "d. Error"],
        "explanation" => "In JavaScript, when adding a number and a string, the result will be a concatenated string, so `5 + '5'` results in `'55'`."
    ],
    "Which operator is used to compare both value and type?" => [
        "options" => ["a. ==", "b. ===", "c. !=", "d. >="],
        "explanation" => "`===` is used in JavaScript to compare both value and type."
    ],
    "What will `console.log(typeof [1, 2, 3]);` output?" => [
        "options" => ["a. array", "b. object", "c. list", "d. number"],
        "explanation" => "In JavaScript, arrays are considered objects, so `typeof [1, 2, 3]` will output `object`."
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result - JavaScript</title>
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

            <a href="javascriptquiz2.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="javascriptviewlesson3.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
