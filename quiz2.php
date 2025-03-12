<?php
session_start();
$questions = [
    "What is a variable in programming?" => ["a. A fixed value that cannot change", "b. A name that stores data in memory", "c. A mathematical operation", "d. A type of loop"],
    "Which of the following is an example of a string in Python?" => ["a. ''Hello, World!''", "b. 25", "c. 14", "d. True"],
    "What is the difference between an integer and a float" => ["a. Integers have decimal points, while floats do not", "b. Floats have decimal points, while integers do not", "c. Both are the same data type", "d. Integers can store text, but floats cannot"],
    "What will be the output of the following Python code?
    ```python
    x = 10
    y = ''10''
    print(x + int(y))
    ```" => ["a. ''1010''", "b.  20", "c. 10", "d. Error"],
    "Which of the following correctly declares a variable in Python" => ["a. `var x = 10;`", "b. `int x = 10;`", "c. `x = 10`", "d. `x: int = 10;`"]
];

$_SESSION['answers'] = ['b', 'a', 'b', 'b', 'c']; // Correct answers

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Variables & Data Types</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, rgb(183, 204, 255), rgb(183, 204, 255));
            font-family: Arial, sans-serif;
        }
        .quiz-container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgb(82, 251, 211);
            z-index: 1000;
            padding: 10px 0;
            box-shadow: 0px 4px 6px rgba(248, 248, 248, 0.1);
        }
        .progress {
            height: 20px;
            width: 80%;
            margin: auto;
        }
        .content {
            margin-top: 60px;
        }
        .form-check {
            padding: 10px;
            border-radius: 8px;
            transition: 0.3s;
            background-color: rgb(255, 255, 255);
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        .form-check:hover {
            background-color: rgb(103, 248, 95);
        }
        input[type="radio"]:checked + label {
            font-weight: bold;
            color: rgb(0, 0, 0);
            background: rgb(103, 248, 95);
            padding: 5px 10px;
            border-radius: 5px;
        }
        .btn-submit {
            font-size: 1.3rem;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Quiz - Variables & Data Types</h2>
        <h3 class="text-center">Lesson 2: Variables & Data Types - Understanding variables, strings, integers, and floats.</h3>
        <h3 class="card-text">Instruction: Choose the correct answer for each questions.</h3>

        <div class="progress-container">
    <div class="progress mb-4">
        <div class="progress-bar bg-success" id="progressBar" role="progressbar"></div>
    </div>
</div>

        <form action="result2.php" method="post" id="quizForm">
            <?php $index = 0; ?>
            <?php foreach ($questions as $question => $options): ?>
                <div class="container mt-5 content">
                    <h5><?php echo ($index + 1) . ". " . nl2br($question); ?></h5>
                    <?php foreach ($options as $key => $option): ?>
                        <div class="form-check" onclick="selectOption('<?php echo $index; ?>', '<?php echo chr(97 + $key); ?>')">
                            <input class="form-check-input" type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo chr(97 + $key); ?>" required hidden>
                            <label class="form-check-label"><?php echo $option; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php $index++; ?>
            <?php endforeach; ?>

            <!-- Submit and Back Button -->
            <div class="d-flex justify-content-center mt-4">
            <a href="viewlesson2.php" class="btn btn-secondary btn-lg">Back</a>
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
    </div>

    <script>
        function selectOption(index, value) {
            let radios = document.getElementsByName("answers[" + index + "]");
            radios.forEach(radio => {
                if (radio.value === value) {
                    radio.checked = true;
                }
            });

            let totalQuestions = <?php echo count($questions); ?>;
            let answered = document.querySelectorAll('input[type="radio"]:checked').length;
            let progress = (answered / totalQuestions) * 100;
            document.getElementById("progressBar").style.width = progress + "%";
        }
    </script>
</body>
</html>