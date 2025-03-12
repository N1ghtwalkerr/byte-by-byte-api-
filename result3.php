<?php
session_start();
if (!isset($_POST['answers'])) {
    die("Invalid Access");
}

$correctAnswers = $_SESSION['answers'];
$userAnswers = $_POST['answers'];
$score = 0;
$totalQuestions = count($correctAnswers);

// Explanations for each question
$explanations = [
    "The correct keyword to define a function in Python is 'def'.",
    "The function 'greet()' prints the statement 'Hello, welcome to Python!'.",
    "Parameters allow functions to accept inputs, making them dynamic and reusable.",
    "The function 'add(5,3)' returns 8 because it performs addition.",
    "A lambda function is a small anonymous function created using the 'lambda' keyword."
];

// Sample questions for review
$questions = [
    "What is the keyword used to define a function in Python?" => ["a. func", "b. define", "c. def", "d. function"],
    "What will be the output of the following code?\n```python\ndef greet():\n    print('Hello, welcome to Python!')\ngreet()\n```" => ["a. Hello, welcome to Python!", "b. greet()", "c. Syntax Error", "d. None of the above"],
    "What is the purpose of parameters in a function?" => ["a. To print values", "b. To pass inputs to a function", "c. To create a loop", "d. To exit the function"],
    "What will be the output of the following code?\n```python\ndef add(a, b):\n    return a + b\nresult = add(5, 3)\nprint(result)\n```" => ["a. 5", "b. 3", "c. 8", "d. Error"],
    "What is a lambda function?" => ["a. A function defined using the `lambda` keyword", "b. A type of loop", "c. A special variable", "d. A function that can only return numbers"]
];

// Calculate score
foreach ($correctAnswers as $index => $correct) {
    if (isset($userAnswers[$index]) && $userAnswers[$index] === $correct) {
        $score++;
    }
}

$percentage = ($score / $totalQuestions) * 100;
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
            max-width: 700px;
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
                foreach ($questions as $question => $options) {
                    echo "<li class='list-group-item'><strong>Q" . ($index + 1) . ":</strong> " . nl2br($question) . "<br>";
                    
                    foreach ($options as $key => $option) {
                        $letter = chr(97 + $key);
                        $isCorrect = ($letter === $correctAnswers[$index]);
                        $isUserAnswer = isset($userAnswers[$index]) && $userAnswers[$index] === $letter;

                        echo "<span class='" . ($isCorrect ? "correct" : ($isUserAnswer ? "incorrect" : "")) . "'>";
                        echo ($isCorrect ? "✔ " : ($isUserAnswer ? "✘ " : "")) . "$letter) $option";
                        echo "</span><br>";
                    }
                    
                    echo "<br><strong>Correct Answer: " . strtoupper($correctAnswers[$index]) . "</strong><br>";
                    echo "<em>Explanation: " . $explanations[$index] . "</em>";
                    echo "</li>";
                    $index++;
                }
                ?>
            </ul>

            <a href="quiz3.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="viewlesson4.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
