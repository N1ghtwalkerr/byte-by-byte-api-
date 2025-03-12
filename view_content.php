<?php
include('../db_connect.php');

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
            <h4 class="ml-3 mb-0" style="margin-left:20px;"><br><br></h4>
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
                                                $lesson_id = $_GET['lesson_id'];
												$cart = $conn->query("SELECT * FROM `lesson_content` WHERE `lesson_id`='$lesson_id' ORDER BY lesson_id ASC");
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
                    <h5 class="modal-title" id="addLessonModalLabel">Add New Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype = "multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <label for="lesson_name">Content Name</label>
                            <input type="text" class="form-control" id="lesson_name" name="lesson_name" required>
                            <input type="hidden" class="form-control" id="lesson_id" name="lesson_id" required value="<?php echo $_GET['lesson_id'];?>">
                        </div>
                        <div class="form-group">
                            <label for="lesson_date">Content Description</label>
                            <textarea class="form-control" id="lesson_desc" name="lesson_desc" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lesson_date">Content Video Link</label>
                            <input type="text" class="form-control" id="lesson_video" name="lesson_video" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_content">Add Content</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
// Include your database connection file
// Check if form is submitted
if (isset($_POST['add_content'])) {
    // Get the form data
    $lesson_id = $_POST['lesson_id'];
    $lesson_name = $_POST['lesson_name'];
    $lesson_content = $_POST['lesson_desc'];
    $lesson_video = $_POST['lesson_video'];

    // Validate the input (optional but recommended)
    if (!empty($lesson_name) && !empty($lesson_content)) {
        // Insert the lesson into the database
        $sql = "INSERT INTO lesson_content (lesson_id,lesson_name, lesson_content,lesson_video) VALUES (?,?,?,?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters to prevent SQL injection
            $stmt->bind_param("ssss", $lesson_id, $lesson_name,$lesson_content,$lesson_video);
            
            // Execute the query
            if ($stmt->execute()) {
																		echo '<script>
																			function myFunction() {
																				swal({
																				title: "Success!",
																				text: "Your Content Successfully Added",
																				icon: "success",
																				type: "success"
																				}).then(function() {
																				window.location = "view_content.php?lesson_id='.$lesson_id.'";
																			  });}
																		</script>';
            } else {
                
																		echo '<script>
																			function myFunction() {
																				swal({
																				title: "Success!",
																				text: "Your Content Failed to Add",
																				icon: "error",
																				type: "error"
																				}).then(function() {
																				window.location = "view_content.php?lesson_id='.$lesson_id.'";
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
