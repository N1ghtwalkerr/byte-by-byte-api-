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
    "What will be the output of this code?\n    x = 8\n    if x 902 == 0:\n        print('even')" => [
        "options" => ["a. Even", "b. Odd", "c. Error", "d. No output"],
        "explanation" => "There is a syntax error in 'if x 902 == 0'. The correct syntax should use an operator like '%' for modulus checking."
    ],
    "Which of the following is NOT a valid comparison operator in Python?" => [
        "options" => ["a. ==", "b. !=", "c. <>", "d. <="],
        "explanation" => "The '<>' operator was used in older Python versions but is now invalid. '!=' should be used instead."
    ],
    "What is the purpose of the not operator in Python?" => [
        "options" => ["a. It inverts the truth value of a condition", "b. It checks for inequality", "c. It is used for looping", "d. It always returns true"],
        "explanation" => "The 'not' operator negates the boolean value of an expression (e.g., 'not True' becomes False)."
    ],
    "What will be the output of this code?\n    x = 10\n    y = 5\n    if x > 5 and y < 10:\n        print('condition met')" => [
        "options" => ["a. condition met", "b. no output", "c. error", "d. none of the above"],
        "explanation" => "The condition 'x > 5 and y < 10' is True, so the output will be 'condition met'."
    ],
    "Which of the following statements is true about Python's if-elif-else statements?" => [
        "options" => ["a. You can have only one elif in an if-elif-else structure", "b. The else block is mandatory", "c. The if condition must always be a boolean expression", "d. Python uses switch-case instead of if-elif-else"],
        "explanation" => "The 'if' condition must always evaluate to a boolean value. Python does not have a switch-case structure like some other languages."
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
        body { background-color: #f8f9fa; }
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

            <a href="quiz5.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">🎉 Completed! Great job! 🎉</a>
        </div>
    </div>
</body>
</html>
