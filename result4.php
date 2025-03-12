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
    "What will be the output of the following code:\n    for i in range(2,10,2)\n    print(i,end='''')" => [
        "options" => ["a. 2 3 4 5 6 7 8 9", "b. 2 4 6 8", "c. 2 4 6 8 10", "d. 1 3 5 7 9"],
        "explanation" => "The loop iterates from 2 to 10 with a step of 2, printing 2, 4, 6, and 8."
    ],
    "Identify the correct syntax for a while loop:" => [
        "options" => ["a. while x > 0 then:", "b. while x > 0:", "c. while (x>0)", "d. while x > 0 do"],
        "explanation" => "In Python, the correct syntax for a while loop is 'while condition:'."
    ],
    "What does the break statement do in a loop?" => [
        "options" => ["a. skips the next iteration", "b. ends the loop completely", "c. skips the current iteration and continues to the next", "d. restarts the loop"],
        "explanation" => "The 'break' statement completely terminates the loop execution."
    ],
    "How many times will the loop execute?\n    x = 0\n    while x < 3\n    y = '10'\n    print('Hello')\n    x += 1" => [
        "options" => ["a. 0", "b. 3", "c. infinite times", "d. 2"],
        "explanation" => "The loop will execute 3 times because 'x' starts at 0 and increments by 1 until it reaches 3."
    ],
    "What is the output of the following code:\n    for i in range(3)\n    for j in range(2)\n    print('i,j')" => [
        "options" => ["a. (0,0)(0,1)(1,0)(1,1)(2,0)(2,1)", "b. (0,1)(1,2)(2,3)", "c. (0,0)(1,1)(2,2)", "d. (0,0)(1,0)(2,0)"],
        "explanation" => "This nested loop runs three outer iterations and two inner iterations, producing (0,0), (0,1), (1,0), (1,1), (2,0), and (2,1)."
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

            <a href="quiz4.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="viewlesson5.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
