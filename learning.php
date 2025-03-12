<?php
include '../db_connect.php';

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-bottom: 15px;
            background-color: #e3f2fd;
        }

        .card-title {
            font-size: 1.25rem;
            color: #0d47a1;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            background-color: #0d47a1;
            transition: all 0.3s;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #1e88e5;
        }

        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            cursor: pointer;
            font-size: 1.5rem;
            color: #ffffff;
            background: none;
            border: none;
        }

        .content {
            margin-left: 270px;
        }

        .header {
            background-color: #0d47a1;
            color: #ffffff;
            padding: 10px 15px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1200;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
            }

            .sidebar {
                width: 200px;
            }
        }
    </style>
</head>

<body onload="myFunction()">
    <!-- Header -->
<div class="header">
    <div class="d-flex align-items-center">
        <button class="toggle-btn" id="toggle-btn">☰</button>
     </div>
</div>

    <!-- Sidebar Navigation -->
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="#"><br></a></li>
            <li><a href="#"><br></a></li>
            <li><a href="home.php">Home</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="container mt-5 pt-4 content"><br><br>
        <h2 class="text-center mb-4">List of Lectures</h2>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addLessonModal">
            Add Lesson
        </button><br><br>
        <div class="row">

        <!-- Add Lesson Button -->
            <!-- Subject 1 -->
            <?php
												$cart = $conn->query("SELECT * FROM `lesson` ORDER BY lesson_id ASC");
												while($cart_result=$cart->fetch_array()){
			?>									    
            <div class="col-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $cart_result['lesson_name'];?></h5>
                        <p class="card-text"><?php echo $cart_result['lesson_content'];?></p>
                        <a href="view_content.php?lesson_id=<?php echo $cart_result['lesson_id'];?>" class="btn btn-primary btn-sm">View Lessons</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Modal for Adding Lesson -->
    <div class="modal fade" id="addLessonModal" tabindex="-1" role="dialog" aria-labelledby="addLessonModalLabel" aria-hidden="true" style="margin-top:200px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLessonModalLabel">Add New Lesson</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype = "multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <label for="lesson_name">Lesson Name</label>
                            <input type="text" class="form-control" id="lesson_name" name="lesson_name" required>
                        </div>
                        <div class="form-group">
                            <label for="lesson_date">Lesson Content</label>
                            <input type="text" class="form-control" id="lesson_content" name="lesson_content" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_lesson">Add Lesson</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
// Include your database connection file
// Check if form is submitted
if (isset($_POST['add_lesson'])) {
    // Get the form data
    $lesson_name = $_POST['lesson_name'];
    $lesson_content = $_POST['lesson_content'];

    // Validate the input (optional but recommended)
    if (!empty($lesson_name) && !empty($lesson_content)) {
        // Insert the lesson into the database
        $sql = "INSERT INTO lesson (lesson_name, lesson_content,lesson_date) VALUES (?, ?,?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters to prevent SQL injection
            $date = date("F d,Y - H:i:s A",time());
            $stmt->bind_param("sss", $lesson_name, $lesson_content,$date);
            
            // Execute the query
            if ($stmt->execute()) {
																		echo '<script>
																			function myFunction() {
																				swal({
																				title: "Success!",
																				text: "Your Lesson Successfully ADded",
																				icon: "success",
																				type: "success"
																				}).then(function() {
																				window.location = "learning.php";
																			  });}
																		</script>';
            } else {
                
																		echo '<script>
																			function myFunction() {
																				swal({
																				title: "Success!",
																				text: "Your Lesson Failed to Add",
																				icon: "error",
																				type: "error"
																				}).then(function() {
																				window.location = "learning.php";
																			  });}
																		</script>';
            }
        }
    } else {
        echo "All fields are required!";
    }
}

?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggle-btn');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>

</html>
