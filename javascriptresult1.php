<?php
session_start();
if (!isset($_POST['answers'])) {
    die("Invalid Access");
}

$correctAnswers = $_SESSION['answers']; // Correct answers stored in session
$userAnswers = $_POST['answers']; // User's submitted answers
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
    "What is JavaScript mainly used for?" => [
        "options" => ["A) Styling web pages", "B) Making web pages interactive", "C) Storing data in a database", "D) Compiling programs"],
        "explanation" => "JavaScript is mainly used for making web pages interactive, like adding dynamic content."
    ],
    "Which of the following is NOT a valid way to include JavaScript in an HTML file?" => [
        "options" => ["A) Using an external . js file", "B) Inside a < script > tag", "C) Inside a < style > tag", "D) As an inline event handler"],
        "explanation" => "The < style > tag is used for CSS, not JavaScript."
    ],
    "Which statement is used to display output in the browser console?" => [
        "options" => ["A) console.log ( )", "B) print ( )", "C) display ( )", "D) document.write ( "],
        "explanation" => "The correct syntax for displaying output in the console is 'console.log ( )'."
    ],
    "Where should you place the < script > tag to ensure JavaScript runs after the HTML loads?" => [
        "options" => ["A) Inside the < head > tag", "B) At the beginning of < body >", "C) At the end of < body >", "D) Inside the < title > tag"],
        "explanation" => "Placing the < script > tag at the end of < body > ensures the JavaScript runs after the HTML loads."
    ],
    "Which of the following is the correct syntax for an external JavaScript file?" => [
        "options" => ["A) < script src='script.js' >< /script >", "B) < script href='script.js' >< /script >", "C) < link rel='script' href='script.js' >", "D) < js file='script.js' >< /js >"],
        "explanation" => "To include an external JavaScript file, you should use '< script src='script.js' >< /script >'."
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
            <h2>JavaScript Quiz Result</h2>
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
                        $letter = chr(97 + $key); // Get the letter (a, b, c, d)
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

            <a href="javascriptquiz1.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="javascriptviewlesson2.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
