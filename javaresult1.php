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
    "What type of programming language is Java?" => [
        "options" => ["a. Procedural", "b. Object-Oriented", "c. Functional", "d. Markup"],
        "explanation" => "Java is an Object-Oriented programming language, meaning it is based on the concept of objects and classes."
    ],
    "What does the phrase 'Write Once, Run Anywhere' mean in Java?" => [
        "options" => ["a. Java code only runs on Windows", "b. Java programs can run on any platform with a JVM", "c. Java programs need to be rewritten for each operating system", "d. Java runs only on mobile devices"],
        "explanation" => "Java programs can run on any platform with a Java Virtual Machine (JVM), making them platform-independent."
    ],
    "Which tool is required to compile and run Java programs?" => [
        "options" => ["a. JDK (Java Development Kit)", "b. JVM (Java Virtual Machine)", "c. HTML", "d. Python"],
        "explanation" => "The JDK (Java Development Kit) contains tools needed to develop, compile, and run Java programs."
    ],
    "What is the correct syntax for printing 'Hello, Java!' in Java?" => [
        "options" => ["a. print('Hello, Java!');", "b. console.log('Hello, Java!');", "c. System.out.println('Hello, Java!');", "d. echo('Hello, Java!');"],
        "explanation" => "In Java, `System.out.println('Hello, Java!');` is the correct syntax for printing output."
    ],
    "Which of the following is an IDE commonly used for Java development?" => [
        "options" => ["a. Eclipse", "b. Visual Studio Code", "c. IntelliJ IDEA", "d. All of the above"],
        "explanation" => "All of the options listed (Eclipse, VS Code, IntelliJ IDEA) are commonly used IDEs for Java development."
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

            <a href="javaquiz1.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="javaviewlesson2.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
