<?php
session_start();
$questions = [
    "What will be the output of the following code?
    java
    int age = 20;
    if (age >= 18) {
        System.out.println(''You are an adult.'');
    } else {
        System.out.println(''You are a minor.'');
    }" => ["a. You are a minor.", "b. You are an adult.", "c. Compilation error", "d. No output"],
    "What is the purpose of the break statement in a switch case?" => ["a. It is used to repeat the case execution", "b. It is optional and has no effect", "c. It stops the execution of the switch case after a match", "d. It skips the default case"],
    "How many times will the following loop execute?
    java
    for (int i = 0; i < 3; i++) {
        System.out.println(''Hello'');
    }" => ["a. 1", "b. 2", "c. 3", "d. 4"],
    "What is the correct way to declare a while loop?" => ["a. while i < 5 { System.out.println(i); i++; }", "b. while (i < 5) { System.out.println(i); i++; }", "c. while (i < 5) System.out.println(i); i++;", "d. while (i < 5) { i++ System.out.println(i); }"],
    "What happens if the condition in a while loop is always true?" => ["a.   The loop runs infinitely", "b. The loop executes once and stops", "c. The program crashes immediately", "d. The loop never executes"]
];

$_SESSION['answers'] = ['b', 'c', 'c', 'b', 'a']; // Correct answers

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Python</title>
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
        <h2 class="text-center">Quiz - Control Structures</h2>
        <h3 class="text-center">Lesson 3: Control Structures</h3>
        <h3 class="card-text">Instruction: Choose the correct answer for each questions.</h3>

        <div class="progress-container">
    <div class="progress mb-4">
        <div class="progress-bar bg-success" id="progressBar" role="progressbar"></div>
    </div>
</div>

        <form action="javaresult3.php" method="post" id="quizForm">
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
            <a href="viewlesson3.php" class="btn btn-secondary btn-lg">Back</a>
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