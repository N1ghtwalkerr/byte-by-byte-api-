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

// Java questions and explanations
$questions = [
    "Which of the following is NOT a primitive data type in Java?" => [
        "options" => ["a. int", "b. String", "c. boolean", "d. double"],
        "explanation" => "In Java, `int`, `boolean`, and `double` are primitive data types. `String` is not a primitive data type; it is an object."
    ],
    "What is the correct way to declare an integer variable in Java?" => [
        "options" => ["a. integer age = 25;", "b. int age = 25;", "c. num age = 25;", "d. double age = 25;"],
        "explanation" => "In Java, `int age = 25;` is the correct way to declare an integer variable. The `integer` and `num` data types do not exist in Java."
    ],
    "What will be the output of the following code?\n```java\nboolean isJavaFun = true;\nSystem.out.println(isJavaFun);\n```" => [
        "options" => ["a. true", "b. false", "c. 1", "d. 0"],
        "explanation" => "Since `isJavaFun` is a boolean variable set to `true`, the output will be `true`."
    ],
    "Which is the correct way to declare a floating-point variable in Java?" => [
        "options" => ["a. float price = 10.99;", "b. double price = 10.99;", "c. float price = 10.99f;", "d. int price = 10.99;"],
        "explanation" => "In Java, `float` values must have an `f` at the end (e.g., `float price = 10.99f;`). Otherwise, Java assumes it is a `double`."
    ],
    "What is the correct syntax for declaring a `char` variable?" => [
        "options" => ["a. char grade = ''A'';", "b. char grade = 'A';", "c. char grade = A;", "d. char grade = 'ABC';"],
        "explanation" => "In Java, a `char` must be a single character enclosed in single quotes, e.g., `char grade = 'A';`."
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

            <a href="javaquiz2.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="javaviewlesson3.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
