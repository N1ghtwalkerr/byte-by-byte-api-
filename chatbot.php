<?php

// Load lesson data (can be from a database or an array)
$lessons = [
    "python basics" => "Python is an easy-to-learn programming language used for web development, AI, and more.",
    "variables" => "Variables store data values. In Python, you declare variables without specifying a type.
name = ''Alice'' # String

age = 25 # Integer

height = 5.6 # Float

is_student = True # Boolean.",
    "Python Functions" => "Functions help organize and reuse code. They allow you to write a block of code once and call it multiple times.

Defining a Function
A function is created using the def keyword

Example
def greet():
    print(''Hello, welcome to Python!'')

greet()  # Calling the function


Output: Hello, welcome to Python!",
"Function with Parameters" => "Functions can take parameters (inputs) to make them more flexible

Example:
def greet(name):
    print(f''Hello, {name}!'')

greet(''Alice'')


Output: Hello, Alice!",
"Function with Return Value" => "A function can return a value using the return keyword.

Example:
<\def add(a, b):
    return a + b

result = add(5, 3)
print(result)


Output: 8",
"Default Parameter Values" => "You can set default values for parameters.

Example:
def greet(name=''Guest''):
    print(f''Hello, {name}!'')

greet()  # Uses default value
greet(''Bob'')  # Uses provided value


Output:
Hello, Guest!
Hello, Bob!",
"Lambda Functions" => "A lambda function is a one-line anonymous function.

Example:
square = lambda x: x * x
print(square(4))

Output: 16",
"Types of Functions" => "Functions can be classified into different types based on their behavior and usage. 1. Built-in Functions, 2. User-defined Functions and 3. Recursive Functions",
"Built-in Functions" => "These are functions provided by the programming language, such as print() in Python or System.out.println() in Java.",
"User-defined Functions" => "These are functions created by the programmer to perform specific tasks.",
"Recursive Functions" => "A recursive function is a function that calls itself within its definition. It is useful for solving problems like factorial calculation and Fibonacci series.

Python Example:
def factorial(n):
   if n == 0:
       return 1
   else:
       return n * factorial(n - 1)
                        
print(factorial(5))  # Output: 120
Java Example
public class Main {:
   static int factorial(int n) {
       if (n == 0) {
           return 1;
       } else {
           return n * factorial(n - 1);
       }
   }
                        
   public static void main(String[] args) {
       System.out.println(factorial(5)); // Output: 120
   }
}",
    "Introduction Of Loops" => "Loops in Python are used to execute a block of code multiple times. Python provides two primary loop types: for loops and while loops. Loops are fundamental structures in programming that allow us to execute a block of code multiple times. Instead of writing repetitive code, loops help automate tasks, making programs more efficient and manageable. The two most commonly used loops are for and while loops.",
    "Use of Loops" => "• Reduce repetitive code.

• Automate tasks efficiently.

• Improve code readability and maintainability.",
"For Loops" => "The for loop is used for iterating over a sequence (such as a list, tuple, dictionary, or range).

Python Example
# Using a for loop to print numbers 1 to 5
for i in range(1, 6):
    print(i)
```
Java Example
public class Main {
   public static void main(String[] args) {
       // Using a for loop to print numbers 1 to 5
       for (int i = 1; i <= 5; i++) {
           System.out.println(i);
       }
   }
}",
"While Loops" => "A while loop is used when the number of iterations is unknown, and the loop continues running as long as a specified condition is True.

Python Example
# Using a while loop to print numbers 1 to 5
 i = 1
while i <= 5:
    print(i)
    i += 1
Java Example
public class Main {
   public static void main(String[] args) {
       int i = 1;
       // Using a while loop to print numbers 1 to 5
       while (i <= 5) {
           System.out.println(i);
               i++;
       }
   }
}",
"Loop Control Statements" => "Loop control statements modify the normal flow of loops. 1. Break Statement, 2. Continue Statement, 3. Nested Loops",
"Break Statement" => "Used to exit a loop prematurely when a certain condition is met.

Python Example
for i in range(1, 6):
    if i == 3:
        break
print(i)  # Output: 1 2
                        
Example with `break`:
Java Example
public class Main {
    public static void main(String[] args) {
        for (int i = 1; i <= 5; i++) {
            if (i == 3) {
                break;<
            }
            ystem.out.println(i); // Output: 1 2
        }
    }
}",
"Continue Statement" => "Skips the current iteration and moves to the next one.



                        
Python Example


                        
for i in range(1, 6):
    if i == 3:
       continue
    print(i)  # Output: 1 2 4 5

    
                        
Java Example


                        
public class Main {
   public static void main(String[] args) {
       for (int i = 1; i <= 5; i++) {
           if (i == 3) {
               continue;
           }
           System.out.println(i); // Output: 1 2 4 5
       }
   }
}",
"Nested Loops" => "A nested loop is a loop inside another loop.

Python Example
for i in range(1, 4):
   for j in range(1, 4):
       print(f''({i}, {j})'')
                        
                        
Java Example


                        
public class Main {
   public static void main(String[] args) {
       for (int i = 1; i <= 3; i++) {
           for (int j = 1; j <= 3; j++) {
               System.out.println(''('' + i + '', '' + j + '')'');
           }
       }
   }
}",
    "conditional statements" => "Conditional statements in Python allow a program to make decisions based on conditions. These conditions evaluate to either True or False, and the program executes different blocks of code accordingly.",
    "Types of Conditional Statements" => "• if Statement - Runs a block of code only if the condition is true.

• if-else Statement - Runs one block if the condition is true, and another block if it is false.

• if-elif-else Statement - Checks multiple conditions, executing different blocks of code depending on which condition is met.",
"The if Statement" => "The if statement evaluates a condition. If it's true, the indented code runs.

Syntax
python
Copy
Edit
if condition:
    # Code block runs if condition is true
                        
Example
python
Copy
Edit
x = 10
if x > 5:
    print(''x is greater than 5'')
Output:

csharp
Copy
Edit
x is greater than 5",
"The if-else Statement" => "If the condition is false, the else block executes.

Syntax
python
Copy
Edit
if condition:
    # Runs if condition is true
else:
    # Runs if condition is false
                        
Example
python
Copy
Edit
x = 3
if x > 5:
    print(''x is greater than 5'')
else:
    print(''x is not greater than 5'')
Output:

csharp
Copy
Edit
x is not greater than 5",
"The if-elif-else Statement" => "Use this when checking multiple conditions.

Syntax


if condition1:
    # Runs if condition1 is true
elif condition2:
    # Runs if condition2 is true
else:
    # Runs if all conditions are false
Example

grade = 85

if grade >= 90:
    print(''A'')
elif grade >= 80:
    print(''B'')
else:
    print(''C'')
Output: B",
"Logical Operators in Conditional Statements" => "Python allows logical operators to combine conditions:

and → Returns True if both conditions are True
or → Returns True if at least one condition is True
not → Inverts a boolean value
                        
Example
python
x = 10
y = 5

if x > 5 and y < 10:
    print(''Both conditions are met'')
Output:

sql
Both conditions are met",

    "JavaScript" => "JavaScript is a high-level, interpreted programming language that allows developers to add interactivity to web pages. Unlike HTML (which defines structure) and CSS (which styles elements), JavaScript makes pages dynamic by enabling real-time updates, animations, event handling, and more.",
    
    "dom manipulation" => "''DOM Manipulation'' JavaScript allows you to change HTML and CSS dynamically using the DOM.",
    "oop" => "Object-Oriented Programming (OOP) organizes code into classes and objects.",
    "java methods" => "Methods in Java define reusable blocks of code inside a class.",
    "Setting the Data Type" => "In Python, the data type is set when you assign a value to a variable:

    Example                                               Data Type
x = ''Hello World''                                         str
x = 20                                                      int
x = 20.5                                                    float
x = 1j                                                      complex
x = [''apple'', ''banana'', ''cherry'']                     list",
"Python do" => "• Python can be used on a server to create web applications.

• Python can be use alongside software to create workflows.

• Python can connect to database systems. It can also read and modify files.

• Python can be used to handle big data and perform complex mathematics.

• Python can be used for rapid prototyping, or for production-ready software development.",
"Why Python" => "• Python works on different platforms (Windows, Mac, Linux, Raspberry Pi, etc).

• Python has a simple syntax similar to the English language.

• Python has syntax that allows developers to write programs with fewer lines than some other programming languages.

• Python runs on an interpreter system, meaning that code can be executed as sonn as it is written. This means that prototyping can be very quick.

• Python can be treated in a procedural way, an object-oriented way or a functional way.",
"Setting Up Python" => "To start coding in Python, you need to install Python on your computer. You can download it from python.org. After installation, you can write Python code using an IDE like VS Code, PyCharm, or Jupyter Notebook.",
"Writing Your First Python Program" => "In Python, you can write and execute code directly. Let’s start with the classic Hello, World! program:

print(''Hello, World!'')",
"Writing Your First Python Program Explanation" => "• print() is a built-in function that displays text on the screen.

• ''Hello, World!'' is a string (a sequence of characters enclosed in quotes).",
"Comments in python" => "Comments help explain code and are ignored by the Python interpreter.

# This is a comment

print(''Comments are useful!'')",
"Taking User Input" => "Python allows you to take user input using the input() function.

name = input(''Enter your name: '')

print(''Hello, '' 1+ name + ''!'')",
"Basic Arithmetic Operations" => "Python supports basic mathematical operations:

x = 10

y = 3

sum_result = x + y # Addition

sub_result = x - y # Subtraction

mul_result = x * y # Multiplication

div_result = x / y # Division

print(sum_result, sub_result, mul_result, div_result)",
"Python Data Types " => "Built-in Data Types, Getting the Data Type, Setting the Specific Data Type,",
"Built-in Data Types" => "In programming, data type is an important concept. Variables can store data of different types, and different types can do different thins.

Python has the following data types built-in by default, in these categories:

Text Type:        str
Numeric Type:     int, float, complex
Sequence Type:    list, tuple, range
Mapping Type:     dict
Set Types:        set, frozenset
Boolean Type:     bool
Binary Types:     bytes, bytearray, memoryview
None Type:        NoneType",
"Getting the Data Type" => "You can get the data type of any object by using the type() function:

Example
Print the data type of the variable x:

x = 5

print(type(x))",
"Setting the Specific Data Type" => "If you want to specify the data type, you can use the following constructor functions:

Example                                                Data Type
x = str()''Hello World''()                             str
x = int(20)                                            int
x = float(20.5)                                        float
x = complex(1j)                                        complex
x = list((''apple'', ''banana'', ''cherry''))          list",
"Python NUmbers" => "TThere are three numeric types in Python:

• int

• float

• complex

Variables of numeric types are created when you assign a value to them:

Example
x = 1             # int
y = 2.8           # float
z = 1j            # complex
To verify the type of any object in Python, use the type() function:

Example
print(type(x))
print(type(y))
print(type(z))",
"Int" => "Int, or integer, is a whole number, positive or negative without decimals, of unlimited length.

Example
Integers:

x = 1            
y = 35656222554887711        
z = -3255522

print(type(x))
print(type(y))
print(type(z))",
"Float" => "Float, or ''floating point number'' is a number, positive or negative, containing one or more decimals.

Example
Floats:

x = 1.10
y = 1.0
z = 35.59

print(type(x))
print(type(y))
print(type(z))
Float can also be scientific numbers with an ''e'' to indicate the power of 10.

Example
Floats:

x = 35e3
y = 12E4
z = -87.7e100

print(type(x))
print(type(y))
print(Type(z))",
"Complex" => "Complex numbers are written with a ''j'' as the imaginary part:

Example
Complex:

x = 35e3
y = 12E4
z = -87.7e100

print(type(x))
print(type(y))
print(Type(z))",
"Stringsx" => "String in python are surrounded by either single quotation marks, or double quotation marks.

'hello' is the same as ''hello''.

You can display a string literal with the print() function:

Example
  
print(''Hello'')
print(''Hello'')",
"String Format" => "As we learned in the Python Variables chapter, we cannot combine strings and numbers like this:

Example
  
age = 36
txt = My name is John, I am '' + age
print(txt)",
"String Methods" => "Python has a set of built-in methods you can use on strings.

  
Method                                 Description
count()                                Returns the number of times a specified value occurs in a String
endswith()                             Returns true if the string ends with the specified value
center()                               Returns a centered string
index()                                Searches the string for a specified value and returns the position of where it was found
join()                                 Joins the elements of an iterable to the end of the String
lower()                                Converts a string into lower case
replace()                              Returns a string where a specified value is replaced with a scpecified value
title()                                Converts the first character of each word to upper case
upper()                                Converts a string into upper case",
""

     
];

// Function to find the closest matching lesson
function findClosestLesson($question, $lessons) {
    $question = strtolower(trim($question));
    $bestMatch = "I couldn't find an exact answer, but try checking the lessons.";
    
    // Check if the question contains specific keywords like "loops", "OOP", or "DOM manipulation"
    if (strpos($question, 'loop') !== false) {
        return $lessons['loops'];  // Ensuring the correct lesson is matched here
    } elseif (strpos($question, 'oop') !== false) {
        return $lessons['oop'];
    } elseif (strpos($question, 'dom') !== false) {
        return $lessons['dom manipulation'];
    }

    // If no exact match found, use similarity matching
    $highestSimilarity = 0;
    foreach ($lessons as $key => $answer) {
        $keyLower = strtolower($key);
        
        // Check exact match
        if ($question === $keyLower) {
            return $answer;
        }
        
        // Check similarity using similar_text
        similar_text($question, $keyLower, $percent);
        
        // Also check edit distance using levenshtein()
        $editDistance = levenshtein($question, $keyLower);
        $score = $percent - ($editDistance * 2); // Weighted score
        
        if ($score > $highestSimilarity) {
            $highestSimilarity = $score;
            $bestMatch = $answer;
        }
    }
    return $bestMatch;
}

// Get user input
$data = json_decode(file_get_contents("php://input"), true);
$question = isset($data['question']) ? $data['question'] : '';

// Find the best answer
$response = findClosestLesson($question, $lessons);

// Return response in JSON format
header('Content-Type: application/json');
echo $response;

?>
