<!DOCTYPE html>
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
<body>
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
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="home.php" style="font-size: 22px; font-weight: bold;">Home</a></li>
        <li><a href="view.php" style="font-size: 22px; font-weight: bold;">Introduction to Python</a></li>
        <li><a href="viewlesson1.php">Lesson 1: Python Basics</a></li>
        <li><a href="viewlesson2.php">Lesson 2: Variables & Data Types</a></li>
        <li><a href="viewlesson3.php">Lesson 3: Functions</a></li>
        <li><a href="viewlesson4.php">Lesson 4: Loops</a></li>
        <li><a href="viewlesson5.php">Lesson 5: Conditional Statements</a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="javascriptview.php" style="font-size: 22px; font-weight: bold;">JavaScript Fundamentals</a></li>
        <li><a href="javascriptviewlesson1.php">Lesson 1: Introduction to JavaScript</a></li>
        <li><a href="javascriptviewlesson2.php">Lesson 2: JavaScript Variables, Data Types, and Operators</a></li>
        <li><a href="javascriptviewlesson3.php">Lesson 3: Functions and Control Flow</a></li>
        <li><a href="javascriptviewlesson4.php">Lesson 4: DOM Manipulation</a></li>
        <li><a href="javascriptviewlesson5.php">Lesson 5: JavaScript Events</a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#javaview.php" style="font-size: 22px; font-weight: bold;">Java Programming</a></li>
        <li><a href="javaviewlesson1.php">Lesson 1: Java Programming</a></li>
        <li><a href="javaviewlesson2.php">Lesson 2: Variables and Data Type</a></li>
        <li><a href="javaviewlesson3.php">Lesson 3: Control Structures</a></li>
        <li><a href="javaviewlesson4.php">Lesson 4: Functions/Methods in Java</a></li>
        <li><a href="javaviewlesson5.php">Lesson 5: Introduction to Object-Oriented Programming (OOP)</a></li>
    </ul>
</div>

    <!-- Content -->
    <div class="container mt-5 pt-4 content">
        <h3 class="text-center mb-4">Lesson 2: Variables and Data Types</h3>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                        <!-- Video: Primitive Data Types -->
                        <div class="text-align-left mt-3 mb-3">
                        <h6 class="card-title">What is a Variable?</h6>
                        <p class="card-text">A variable is a container that holds data in Java. It must have:</p>
                        <pre class="card-text">
1. A data type (defines the kind of data it can store).
2. A name (identifier).
3. An assigned value (optional but recommended).
                         </pre>   
                            
                        <h6 class="card-title">Primitive Data Types</h6>
                        <pre class="card-text">
Data Type	            Size	                Description
int	                     4 bytes	        Stores whole numbers.
double	                 8 bytes	        Stores decimal numbers.
char	                 2 bytes	        Stores single characters.
boolean	                 1 bit	            Stores true or false values.
long	                 8 bytes	        Stores large whole numbers.
float	                 4 bytes	        Stores decimal numbers (less precise than double).
byte	                 1 byte	            Stores small whole numbers (-128 to 127).
short	                 2 bytes	        Stores medium-range whole numbers (-32,768 to 32,767).
</pre>
                           
                        <h6 class="card-title">Example: Declaring and Assigning Primitive Data Types</h6>
                     
                        <pre class="card-text">  
                            public class PrimitiveTypesExample {
                                public static void main(String[] args) {
                                    int age = 25;
                                    double salary = 50000.50;
                                    char grade = 'A';
                                    boolean isActive = true;
                                    long population = 7800000000L;
                                    float temperature = 36.5f;
                                    byte smallNumber = 100;
                                    short mediumNumber = 2000;
                            
                                    System.out.println("Age: " + age);
                                    System.out.println("Salary: " + salary);
                                    System.out.println("Grade: " + grade);
                                    System.out.println("Active: " + isActive);
                                    System.out.println("Population: " + population);
                                    System.out.println("Temperature: " + temperature);
                                    System.out.println("Byte value: " + smallNumber);
                                    System.out.println("Short value: " + mediumNumber);
                                }
                            }                                                  
    </pre>

                        <iframe width="1090" height="400" src="https://www.youtube.com/embed/WQ7mvQFSmYc" frameborder="0" allowfullscreen></iframe>
                        </div>

                        
                        <h6 class="card-title">String and Other Object Types</h6>
                        <p class="card-text">Unlike primitive data types, `String` is an object type that stores sequences of characters.</p>
                        
                        <h6 class="card-title">Declaring and Using Strings</h6>
                        <pre class="card-text">

public class StringExample {
    public static void main(String[] args) {
        String name = "John";
        String message = "Hello, " + name + "!";
                            
        System.out.println(message);
    }
}
</pre>

                        <!-- Video: Primitive Data Types -->
                        <div class="text-align-left mt-3 mb-3">
                        <h6 class="card-title">Variable Naming Rules and Best Practices</h6>
                        <p class="card-text">✔ Rules:</p>
                        <p class="card-text">• Must start with a letter, `_`, or `$` (not a number).</p>
                        <p class="card-text">• Cannot be a Java keyword (`int`, `class`, `public`, etc.).</p>
                        <p class="card-text">• Case-sensitive (`Age` and `age` are different).</p>
                        <iframe width="1110" height="400" src="https://www.youtube.com/embed/AxRyiI30zns" frameborder="0" allowfullscreen></iframe>
                        </div>
                        
                        <!-- Start Quiz and Back Button -->
<div class="d-flex justify-content-center mt-4">
    <a href="javaviewlesson2.php" class="btn btn-secondary btn-lg">Back</a>
    <a href="javaquiz2.php" class="btn btn-primary btn-lg">Start Quiz</a>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</script>

<!-- Chatbot Button -->
<button id="chatbot-toggle" class="chatbot-btn">💬</button>

<!-- Chatbot Container -->
<div id="chatbot-container" class="chatbot-container">
    <div class="chatbot-header">
        <span>AI Chatbot</span>
        <button id="chatbot-close">&times;</button>
    </div>
    <div id="chatbot-messages" class="chatbot-messages"></div>
    <div class="chatbot-input-container">
        <input type="text" id="chatbot-input" placeholder="Ask a question..." />
        <button id="chatbot-send">➤</button>
    </div>
</div>

<style>
    .chatbot-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #0d47a1;
        color: white;
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 24px;
        cursor: pointer;
    }
    .chatbot-container {
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 300px;
        background: white;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        display: none;
        flex-direction: column;
    }
    .chatbot-header {
        background: #0d47a1;
        color: white;
        padding: 10px;
        display: flex;
        justify-content: space-between;
    }
    .chatbot-messages {
        height: 250px;
        overflow-y: auto;
        padding: 10px;
    }
    .chatbot-input-container {
        display: flex;
        border-top: 1px solid #ddd;
    }
    .chatbot-input-container input {
        flex: 1;
        border: none;
        padding: 10px;
    }
    .chatbot-input-container button {
        background: #0d47a1;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }
</style>

<script>
    document.getElementById("chatbot-toggle").addEventListener("click", function() {
        document.getElementById("chatbot-container").style.display = "flex";
    });

    document.getElementById("chatbot-close").addEventListener("click", function() {
        document.getElementById("chatbot-container").style.display = "none";
    });

    document.getElementById("chatbot-send").addEventListener("click", function() {
        sendMessage();
    });

    document.getElementById("chatbot-input").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            sendMessage();
        }
    });

    function sendMessage() {
        let input = document.getElementById("chatbot-input").value;
        if (input.trim() === "") return;

        // Append User Message
        appendMessage("You: " + input);

        // Send Question to PHP
        fetch("chatbot.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ question: input })
        })
        .then(response => response.text())
        .then(answer => appendMessage("AI: " + answer))
        .catch(error => appendMessage("AI: Sorry, I couldn't understand."));
        
        document.getElementById("chatbot-input").value = "";
    }

    function appendMessage(message) {
        let chatbox = document.getElementById("chatbot-messages");
        let div = document.createElement("div");
        div.textContent = message;
        chatbox.appendChild(div);
        chatbox.scrollTop = chatbox.scrollHeight;
    }
</script>
</body>
</html>
