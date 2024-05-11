<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Platform</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            background: url('https://wallpapercave.com/wp/wp9081316.jpg') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(1px);
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
        }
        .topnav {
            background-color: rgba(0, 0, 0, 0.5); /* semi-transparent background for navbar */
            overflow: hidden;
        }
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        .topnav a.active {
            background-color: #000000;
            color: white;
        }
        .welcome-message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            font-size: 40px;
            animation: changeColor 5s infinite; /* Apply animation for color change */
        }
        @keyframes changeColor {
            0% { color: #ff0000; } /* Red */
            25% { color: #00ff00; } /* Green */
            50% { color: #0000ff; } /* Blue */
            75% { color: #ffff00; } /* Yellow */
            100% { color: #ff00ff; } /* Magenta */
        }        
        .intro {
            background-color: rgba(0, 0, 0, 0.5); /* semi-transparent background for intro */
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); /* semi-transparent background for containers */
            border-radius: 50px;
            padding: 10px;
            margin: 10px auto;
            max-width: 600px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }
        .container h2 {
            margin-bottom: 20px;
            color: #fff;
            text-align: center;
        }
        .container p {
            color: #fff;
            text-align: center;
        }
        .container .btn {
            display: block;
            margin: 20px auto;
            max-width: 200px;
            color: #000;
            border-radius: 20px;
            background-color: #7DF9FF;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<div class="topnav">
  <a class="active" href="/quiz-serverside-master/user/welcome_page">Welcome</a>
  <a href="/quiz-serverside-master/quiz/viewAddQuiz">Add Quiz</a>
  <a href="/quiz-serverside-master/quiz">Take Quiz</a>
  <a href="/quiz-serverside-master/user/history">History</a>
  <a href="/quiz-serverside-master/user/logout">Log Out</a>
</div>

<!-- Welcome Message Section -->
<div class="intro">
    <h1 class="welcome-message">Welcome, <?php echo $this->session->user_name; ?>!</h1>
    <p>Welcome to our quiz platform! Here you can expand your knowledge and challenge yourself with various quizzes. Get started by adding your own quiz or taking one from our collection. Have fun!</p>
</div>

<!-- Add Quiz Section -->
<div class="container">
  <h2>Add Quiz</h2>
  <p>Here you can add a new quiz.</p>
  <a href="/quiz-serverside-master/quiz/viewAddQuiz" class="btn btn-primary">Go to Add Quiz</a>
</div>

<!-- Take Quiz Section -->
<div class="container">
  <h2>Take Quiz</h2>
  <p>Ready to test your knowledge? Take a quiz now!</p>
  <a href="/quiz-serverside-master/quiz" class="btn btn-primary">Go to Take Quiz</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
