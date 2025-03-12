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
    "What is a class in Java?" => [
        "options" => ["a. A built-in function in Java", "b. A blueprint for creating objects", "c. A variable that stores values", "d. A type of loop"],
        "explanation" => "A class in Java is a blueprint for creating objects."
    ],
    "What will be the output of the following code?
    java
    public class Car {
        String model = 'Honda';
    
    public void drive() {
        System.out.println('Driving a ' + model);
        }
    }

    public class Main {
        public static void main(String[] args) {
            Car myCar = new Car();
            myCar.drive();
        }
    }" => [
        "options" => ["a. Driving a Honda", "b. Driving a Car", "c. Compilation error", "d. No output"],
        "explanation" => "The correct output is `Driving a Honda` because the object `myCar` of class `Car` invokes the `drive` method."
    ],
    "What is the main purpose of encapsulation in Java?" => [
        "options" => ["a. To make variables accessible from anywhere", "b. To hide implementation details and protect data", "c. To create multiple classes in one file", "d. To allow direct modification of variables"],
        "explanation" => "Encapsulation is used to hide the implementation details and protect the data by making fields private and providing public getter and setter methods."
    ],
    "What access modifier should be used to restrict direct access to class variables?" => [
        "options" => ["a. public", "b. private", "c. protected", "d. default"],
        "explanation" => "The `private` modifier should be used to restrict direct access to class variables."
    ],
    "What is the correct way to access a private variable in an encapsulated class?
    java
    public class Person {
        private String name;

    // Fill in the blanks
    _______ String getName() {
       return name;
    }

    _______ void setName(String newName) {
       this.name = newName;
    }
}" => [
        "options" => ["a. public for both methods", "b. private for both methods", "c. protected for both methods", "d. No methods are needed"],
        "explanation" => "To access private variables, the methods should be `public` so that they can be accessed outside the class."
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

            <a href="javaquiz5.php" class="btn mt-3" style="background-color: red; color: white;">Try Again</a>
            <a href="home.php" class="btn mt-3" style="background-color: blue; color: white;">🎉 Completed! Great job! 🎉</a>
        </div>
    </div>
</body>
</html>
