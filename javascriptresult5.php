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
    "Which JavaScript event occurs when the user clicks on an element?" => [
        "options" => ["a. mouseover", "b. keydown", "c. click", "d. load"],
        "explanation" => "The correct event is `click`, which is triggered when the user clicks on an element."
    ],
    "How do you properly add an event listener in JavaScript?" => [
        "options" => ["a. element.addListener('click', function() {})", "b. element.addEventListener('click', function() {})", "c. element.onClick(function() {})", "d. element.listenTo('click', function() {})"],
        "explanation" => "`addEventListener()` is the correct method for adding event listeners in JavaScript."
    ],
    "What is the correct syntax to create a JavaScript class?" => [
        "options" => ["a. function Car() {}", "b. class Car {}", "c. create Car {}", "d. define class Car {}"],
        "explanation" => "To create a class in JavaScript, you use the `class` keyword, e.g., `class Car {}`."
    ],
    "How do you create an object from a JavaScript class?" => [
        "options" => ["a. let obj = new ClassName();", "b. let obj = ClassName.create();", "c. let obj = make ClassName();", "d. let obj = ClassName.new();"],
        "explanation" => "To create an object from a class, you use the `new` keyword, e.g., `let obj = new ClassName();`."
    ],
    "Which concept does encapsulation enforce in JavaScript classes?" => [
        "options" => ["a. Using only public properties", "b. Hiding data and exposing access through methods", "c. Creating multiple objects from a class", "d. Preventing any modifications to an object"],
        "explanation" => "Encapsulation enforces the concept of hiding data and exposing access through methods, allowing for controlled access to the class's properties."
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

            <a href="javascriptquiz5.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">🎉 Completed! Great job! 🎉</a>
        </div>
    </div>
</body>
</html>
