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

// Sample questions and explanations
$questions = [
    "What is a variable in programming?" => [
        "options" => ["a. A fixed value that cannot change", "b. A name that stores data in memory", "c. A mathematical operation", "d. A type of loop"],
        "explanation" => "A variable is a name that stores data in memory for later use."
    ],
    "Which of the following is an example of a string in Python?" => [
        "options" => ["a. 'Hello, World!'", "b. 25", "c. 14", "d. True"],
        "explanation" => "Strings in Python are enclosed in quotes, such as 'Hello, World!'."
    ],
    "What is the difference between an integer and a float?" => [
        "options" => ["a. Integers have decimal points, while floats do not", "b. Floats have decimal points, while integers do not", "c. Both are the same data type", "d. Integers can store text, but floats cannot"],
        "explanation" => "Floats have decimal points, while integers do not."
    ],
    "What will be the output of the following Python code?\n x = 10\n y = '10'\n print(x + int(y))" => [
        "options" => ["a. '1010'", "b. 20", "c. 10", "d. Error"],
        "explanation" => "The string '10' is converted to an integer using int(y), so x + int(y) results in 20."
    ],
    "Which of the following correctly declares a variable in Python?" => [
        "options" => ["a. var x = 10;", "b. int x = 10;", "c. x = 10", "d. x: int = 10;"],
        "explanation" => "Python variables are declared simply as x = 10."
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

            <a href="quiz2.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="viewlesson3.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
