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
        <h2 class="text-center mb-4">JavaScript Fundamentals</h2>
        <h3 class="text-center mb-4">Lesson 4 - DOM Manipulation</h3>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                        <!-- Video: Changing Text Content, Changing HTML Content -->
                        <div class="text-align-left mt-3 mb-3">
                        <h6 class="card-title">1. Changing Text Content</h6>
                        <p class="card-text">Use `innerText` or `textContent` to modify text.</p>
                        
                        <h6 class="card-title">Example:</h6>
                        <pre class="card-text">
let title = document.getElementById("main-title");
title.innerText = "Updated Title";
                            
</pre>



                        <h6 class="card-title">2. Changing HTML Content</h6>
                        <p class="card-text">Use `innerHTML` to modify HTML inside an element.</p>
                        
                        <h6 class="card-title">Example:</h6>
                        <pre class="card-text">    
let div = document.getElementById("content");
div.innerHTML = "< h2 >New Heading< /h2 >";
                                            
</pre>

<iframe width="1090" height="400" src="https://www.youtube.com/embed/hDN5IGUv3Yw" frameborder="0" allowfullscreen></iframe>
    </div> 

                        <!-- Video: Changing Styles -->
                        <div class="text-align-left mt-3 mb-3">
                        <h6 class="card-title">3. Changing Styles</h6>
                        <p class="card-text">Modify an element’s style using `.style` property.</p>
                        
                        <h6 class="card-title">For Loop</h6>
                        <p class="card-text">A `for` loop is used when the number of iterations is known.</p>
                        <h6 class="card-title">Example:</h6>
                        <pre class="card-text">   
title.style.color = "blue";
title.style.fontSize = "24px";
                                                   
</pre>

<iframe width="1090" height="400" src="https://www.youtube.com/embed/mWWMq11wIW4" frameborder="0" allowfullscreen></iframe>
    </div> 

                        <!-- Video: Creating and Appending Elements -->
                        <div class="text-align-left mt-3 mb-3">
                        <h6 class="card-title">Creating and Appending Elements</h6>
                        <p class="card-text">We can create new elements and add them to the DOM dynamically using `document.createElement()` and `appendChild()`.</p>
                        <h6 class="card-title">Example:</h6>
                        <pre class="card-text">
let newPara = document.createElement("p");
newPara.innerText = "This is a new paragraph.";
document.body.appendChild(newPara);
                            
</pre>
                        
<iframe width="1090" height="400" src="https://www.youtube.com/embed/XMjs2jQ9SXU" frameborder="0" allowfullscreen></iframe>
    </div> 

    
                        <h6 class="card-title">Handling Events in the DOM</h6>
                        <p class="card-text">JavaScript can listen for user interactions such as clicks, key presses, and mouse movements using event listeners.</p>
                        <h6 class="card-title">Example of adding a click event:</h6>
                        <pre class="card-text">
let button = document.getElementById("myButton");
button.addEventListener("click", function() {
    alert("Button clicked!");
});
                                                    
</pre>

                        <h6 class="card-title">Hands-on Activity</h6>

                        <pre class="card-text">
1. Add a button that changes the text of a `< p >` when clicked.
2. Dynamically add a new `< li >` item to an existing list.
3. Change the background color of a `div` when hovered over.
                                                          
</pre>
                        <h6 class="card-title">Example:</p>
                        <pre class="card-text">
let button = document.getElementById("changeTextBtn");
button.addEventListener("click", function() {
    let paragraph = document.getElementById("text");
    paragraph.innerText = "Text changed!";
});
                                                
</pre>

                        <!-- Start Quiz and Back Button -->
<div class="d-flex justify-content-center mt-4">
    <a href="javascriptviewlesson4.php" class="btn btn-secondary btn-lg">Back</a>
    <a href="javascriptquiz4.php" class="btn btn-primary btn-lg">Start Quiz</a>
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

                        