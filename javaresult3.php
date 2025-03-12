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
    "What will be the output of the following code?
    java
    int age = 20;
    if (age >= 18) {
        System.out.println(''You are an adult.'');
    } else {
        System.out.println(''You are a minor.'');
    }" => [
        "options" => ["a. You are a minor.", "b. You are an adult.", "c. Compilation error", "d. No output"],
        "explanation" => "The correct output is `You are an adult.` because the value of `age` is 20, which is greater than or equal to 18."
    ],
    "What is the purpose of the break statement in a switch case?" => [
        "options" => ["a. It is used to repeat the case execution", "b. It is optional and has no effect", "c. It stops the execution of the switch case after a match", "d. It skips the default case"],
        "explanation" => "The `break` statement is used to stop the execution of the switch case after a match has been found."
    ],
    "How many times will the following loop execute?
    java
    for (int i = 0; i < 3; i++) {
        System.out.println(''Hello'');
    }" => [
        "options" => ["a. 1", "b. 2", "c. 3", "d. 4"],
        "explanation" => "The loop will execute 3 times, printing `Hello` 3 times."
    ],
    "What is the correct way to declare a while loop?" => [
        "options" => ["a. while i < 5 { System.out.println(i); i++; }", "b. while (i < 5) { System.out.println(i); i++; }", "c. while (i < 5) System.out.println(i); i++;", "d. while (i < 5) { i++ System.out.println(i); }"],
        "explanation" => "The correct syntax is `while (i < 5) { System.out.println(i); i++; }`."
    ],
    "What happens if the condition in a while loop is always true?" => [
        "options" => ["a. The loop runs infinitely", "b. The loop executes once and stops", "c. The program crashes immediately", "d. The loop never executes"],
        "explanation" => "If the condition in a `while` loop is always true, the loop will run infinitely, unless it is interrupted."
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

            <a href="javaquiz3.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="javaviewlesson4.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
