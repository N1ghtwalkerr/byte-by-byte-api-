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
    "What year was Python released?" => [
        "options" => ["a. 1991", "b. 1989", "c. 1995", "d. 2000"],
        "explanation" => "Python was officially released in 1991 by Guido van Rossum."
    ],
    "Who is the creator of Python?" => [
        "options" => ["a. Tim Berners-Lee", "b. Guido Van Rossum", "c. Dennis Ritchie", "d. James Gosling"],
        "explanation" => "Guido van Rossum created Python and released it in 1991."
    ],
    "Which of the following is the correct syntax to output 'Hello, World!' in Python?" => [
        "options" => ["a. print('Hello, World!')", "b. echo('Hello, World!')", "c. System.out.println('Hello, World!')"],
        "explanation" => "Python uses the `print()` function to display output, so the correct syntax is `print('Hello, World!')`."
    ],
    "Which operator is used for exponentiation in Python?" => [
        "options" => ["a. ^", "b. **", "c. ''", "d. %"],
        "explanation" => "In Python, `**` is the exponentiation operator (e.g., `2 ** 3` results in `8`)."
    ],
    "What will the following code print?\n x = 10\ny = 3\nprint(x/y)" => [
        "options" => ["a. 3", "b. 3.33", "c. 3.0", "d. 3.333333333333"],
        "explanation" => "In Python, division `/` always returns a float. `10 / 3` results in `3.333333333333`."
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

            <a href="quiz1.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="viewlesson2.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
