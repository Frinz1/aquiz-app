<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url("logoooo.jpg");
        background-size: cover;
        background-position: center;
    }

    nav {
        background-color: black;
        position: fixed;
        top: 0;
        width: 100%;
        padding: 15px 0;
        z-index: 1000;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.3s, padding 0.3s;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }

    nav.scrolled {
        background-color: rgba(51, 51, 51, 0.9);
        padding: 10px 0;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
    }

    nav ul li {
        margin: 0 15px;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        padding: 5px 10px;
        border-radius: 5px;
        transition: all 0.3s;
    }

    nav ul li a:hover {
        background-color: #ff9933;
        color: white;
    }

    nav img {
        margin-left: 20px;
        height: 50px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    section {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-top: 80px;
    }

    h1 {
        color: white;
        text-align: center;
        font-size: 3em;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        margin-bottom: 20px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .quiz-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .quiz-item {
        background-color: #ff9933;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
    }

    .quiz-item h2 {
        color: white;
        margin-top: 0;
    }

    .quiz-item p {
        color: white;
        margin-bottom: 20px;
    }

    .quiz-item .btn {
        background-color: white;
        color: #ff9933;
    }

    .quiz-item .btn:hover {
        background-color: #f0f0f0;
    }

    /* Video banner styling */
    .video-banner {
        position: relative;
        width: 100%;
        height: 60vh;
        overflow: hidden;
    }

    .video-banner video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: blur(5px);
    }

    .video-content-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.4);
        border-radius: 10px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    .btn {
        padding: 15px 30px;
        font-size: 1.2em;
        background-color: #ff9933;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #e67e00;
    }

    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        z-index: 0;
    }
    </style>
</head>

<body>
    <nav id="navbar">
        <img src="logo.jpg" alt="Logo">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#available-quizzes">Available Quizzes</a></li>
        </ul>
    </nav>

    <section class="video-banner">
        <video autoplay muted loop>
            <source src="video1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="video-overlay"></div>

        <div id="home" class="video-content-container">
            <div class="video-content">
                <h1 id="dynamic-text">Test your knowledge, beat the clock, and conquer the quiz!</h1>
                <div style="text-align: center;">
                    <a href="#quiz" class="btn">Start Quiz</a>
                </div>
            </div>
        </div>
    </section>

    <section id="available-quizzes" class="container">
        <h1>Available Quizzes</h1>
        <div class="quiz-grid">
            <div class="quiz-item">
                <h2>Quiz Title 1</h2>
                <p>Number of Questions: 10</p>
                <a href="#" class="btn">Start Quiz</a>
            </div>
            <div class="quiz-item">
                <h2>Quiz Title 2</h2>
                <p>Number of Questions: 10</p>
                <a href="#" class="btn">Start Quiz</a>
            </div>
            <div class="quiz-item">
                <h2>Quiz Title 3</h2>
                <p>Number of Questions: 10</p>
                <a href="#" class="btn">Start Quiz</a>
            </div>
            <div class="quiz-item">
                <h2>Quiz Title 4</h2>
                <p>Number of Questions: 10</p>
                <a href="#" class="btn">Start Quiz</a>
            </div>
        </div>
    </section>

    <script>
    // Array of messages to cycle through
    const messages = [
        "Test your knowledge, beat the clock, and conquer the quiz!",
        "Unlock Knowledge, One Question at a Time!",
        "Challenge Your Mind, Beat the Clock, Win the Quiz!",
        "Ready, Set, Quiz! Prove What You Know"
    ];

    let currentIndex = 0;
    const dynamicText = document.getElementById('dynamic-text');

    // Function to change the text every 3 seconds
    function changeText() {
        currentIndex = (currentIndex + 1) % messages.length;
        dynamicText.textContent = messages[currentIndex];
    }

    // Change text every 3 seconds
    setInterval(changeText, 3000);

    document.querySelector('#home .btn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('available-quizzes').scrollIntoView({
            behavior: 'smooth'
        });
    });

    // Smooth scrolling for navigation links
    document.querySelectorAll('nav a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    </script>
</body>

</html>