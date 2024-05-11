<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
/* Global styles */
* {
  box-sizing: border-box;
}

/* Form input styles */
input[type=text], input[type=password], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

/* Label styles */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Button styles */
input[type=submit], input[type=button] {
  background-color: #000;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Button hover styles */
input[type=submit]:hover, input[type=button]:hover {
  background-color: #333;
}

/* Container styles */
.container {
  border-radius: 5px;
  background-color:rgba(0, 0, 0, 0.5);
  padding: 20px;
}

/* Column styles */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Top navigation styles */
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

/* Set page background color */
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
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
<!-- Top Navigation -->
<div class="topnav">
  <a href="/quiz-serverside-master/user/welcome_page">Welcome</a>
  <a href="/quiz-serverside-master/quiz/viewAddQuiz">Add Quiz</a>
  <a class="active"  href="/quiz-serverside-master/quiz">Take Quiz</a>
  <a href="/quiz-serverside-master/user/history">History</a>
  <a href="/quiz-serverside-master/user/logout">Log Out</a>
</div>

<!-- Main Content -->
<div class="container">
    <!-- Quiz Table -->
    <div class="row">
        <div class="col">
            <h1>Please Choose a Quiz to Start</h1>
            <table id="quiz-table" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td>Quiz ID</td>
                        <td>Quiz Title</td>
                        <td>Quiz Difficulty</td>
                        <td>Scoring System</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Quiz Selection Form -->
<div class="container">
    <form method="post" action="<?=base_url('quiz/getReview')?>">
        <div class="row">
            <div class="col-25">
                <label for="topic">Please select the quiz ID to continue</label>
            </div>
            <div class="col-75">
                <input type="text" id="quiz_id" name="quiz_id" required>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Submit" id="submit">
        </div>
    </form>
</div>
</body>
</html>
<script>
    // Initialize DataTable
    $('#quiz-table').DataTable( {
        ajax: '/quiz-serverside-master/quiz/quiz_data'
    } );
</script>
