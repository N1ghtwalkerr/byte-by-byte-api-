<?php
// Start a session (optional, in case you need it later)
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#007BFF">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Byte-By-Byte Coding Tutorial Mobile App</title>

    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #007BFF, #00C6FF);
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        /* Glassmorphism Effect */
        .welcome-container {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            padding: 40px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1.5s ease-out;
            width: 60%;
        }

        /* Moving Title */
        .moving-title {
            font-size: 40px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .moving-title span {
            display: inline-block;
            animation: marquee 10s linear infinite;
        }

        /* Marquee Keyframes */
        @keyframes marquee {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(-100%);
            }
        }

        /* Keyframes for Fade-in Effect */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Button */
        .start-btn {
            background: linear-gradient(135deg, #ffffff, #f1f1f1);
            color: #007BFF;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .start-btn:hover {
            background: #ffffff;
            color: #0056b3;
            transform: scale(1.05);
        }

        /* Install Button */
        #installButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 8px;
            display: none; /* Hidden by default */
        }

        /* Developer Credit */
        .developer-credit {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: bold;
        }

        /* Programming Image */
        .programming-img {
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
            animation: fadeIn 1.5s ease-out;
        }
    </style>
</head>
<body>

    <div class="welcome-container">
        <img src="https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExc2NtY3IzOWZwaWFmajZsdmkyNmpnenQ3MjQ2ZWRzMWZyeWo3bGN0YyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/ua7vVw9awZKWwLSYpW/giphy.gif" 
             alt="Programming Animation" class="programming-img">
        <h1 class="moving-title"><span>Welcome to Byte-By-Byte Coding Tutorial Mobile App</span></h1>
        <p>Enhance your coding skills with our interactive lessons.</p>
        <button class="start-btn" onclick="startApp()">Get Started</button>
    </div>

    <button id="installButton">Install App</button>

    <div class="developer-credit">Developed by: Nikki Latag</div>

    <script>
        function startApp() {
            window.location.href = 'home.php'; // Redirect to another page
        }

        // Register the Service Worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('sw.js')
            .then(registration => {
                console.log('✅ Service Worker registered with scope:', registration.scope);
            })
            .catch(error => {
                console.error('❌ Service Worker registration failed:', error);
            });
        }

        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', (event) => {
            event.preventDefault();
            deferredPrompt = event;
            console.log("👍 Install prompt saved.");

            // Show the install button
            const installButton = document.getElementById("installButton");
            if (installButton) {
                installButton.style.display = "block";

                installButton.addEventListener("click", () => {
                    if (deferredPrompt) {
                        deferredPrompt.prompt();
                        deferredPrompt.userChoice.then(choiceResult => {
                            if (choiceResult.outcome === 'accepted') {
                                console.log('✅ User accepted the install');
                                installButton.style.display = "none"; // Hide after install
                            } else {
                                console.log('❌ User dismissed the install');
                            }
                            deferredPrompt = null; // Reset prompt
                        });
                    }
                });
            }
        });

        // Hide install button if PWA is already installed
        window.addEventListener('appinstalled', () => {
            console.log("🎉 PWA installed!");
            document.getElementById("installButton").style.display = "none";
        });

        // Check if PWA is already installed
        if (window.matchMedia('(display-mode: standalone)').matches) {
            console.log("📱 PWA is already installed");
            document.getElementById("installButton").style.display = "none";
        }
    </script>

</body>
</html>
