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
    "What is the correct way to define a method in Java?" => [
        "options" => ["a. function greet(name) { System.out.println(''Hello, '' + name); }", "b. void greet(String name) { System.out.println(''Hello, '' + name); }", "c. public static void greet(String name) { System.out.println(''Hello, '' + name); }", "d. method greet(String name) { System.out.println(''Hello, '' + name); }"],
        "explanation" => "The correct syntax for defining a method in Java is `public static void greet(String name) { ... }`."
    ],
    "What is the output of the following code?
    java
    public static void greet(String name) {
        System.out.println(''Hello, '' + name);
    }

    public static void main(String[] args) {
        greet(''John'');
    }" => [
        "options" => ["a. Hello, John", "b. Hello, name", "c. ''Hello, John''", "d. Compilation error"],
        "explanation" => "The correct output is `Hello, John`, since the method prints the string concatenated with the argument passed."
    ],
    "What is method overloading?" => [
        "options" => ["a. Writing multiple methods with the same name but different parameter lists", "b. Defining methods with the same name in different classes", "c. Calling a method multiple times in a loop", "d. Writing a method inside another method"],
        "explanation" => "Method overloading in Java refers to defining multiple methods with the same name but different parameter lists."
    ],
    "Which of the following method calls will invoke the following method?
    java
    public static void add(int a, int b) {
        System.out.println(a + b);
    }" => [
        "options" => ["a. add(5, 10);", "b. add(5.5, 2.5);", "c. add(''5'', ''10'');", "d. add();"],
        "explanation" => "The correct method call is `add(5, 10)` since the method expects two integer arguments."
    ],
    "What will be the output of the following code?
    java
    public static void add(double a, double b) {
        System.out.println(a + b);
    }

    public static void add(int a, int b) {
        System.out.println(a + b);
    }

    public static void main(String[] args) {
        add (5, 2.5);
    }" => [
        "options" => ["a.   7.5", "b. 7", "c. Compilation error", "d. None of the above"],
        "explanation" => "This will cause a compilation error because the method `add(int a, int b)` expects both arguments to be integers, and `add(5, 2.5)` is trying to pass a double."
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result - Functions/Methods in Java</title>
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
                <div class="alert alert-success">🎉 Perfect Score! Well done! 🎉</div>
            <?php else: ?>
                <div class="alert alert-warning">Nice job! You can review your answers below. Keep improving! 😊</div>
            <?php endif; ?>

            <h5 class="mt-4">Answer Review</h5>
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

            <a href="javaquiz4.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="javaviewlesson5.php" class="btn mt-3" style="background-color: green; color: white;">Next Lesson</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">Home</a>
        </div>
    </div>
</body>
</html>
