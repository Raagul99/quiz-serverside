<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        /* Add a black background color to the top navigation */
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
		h1.welcome-message {
          text-align: center;
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

<div class="topnav">
  <a href="/quiz-serverside-master/user/welcome_page">Welcome</a>
  <a href="/quiz-serverside-master/quiz/viewAddQuiz">Add Quiz</a>
  <a href="/quiz-serverside-master/quiz">Take Quiz</a>
  <a class="active"  href="/quiz-serverside-master/user/history">History</a>
  <a href="/quiz-serverside-master/user/logout">Log Out</a>
</div>

<h1 class="welcome-message">Welcome <?php
$uname = $this->session->user_name;
echo $uname;
?>!</h1>


<br><br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Your Quiz History</h1>
            <table id="history-table" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td>Quiz Title</td>
                        <td>Score</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<p>If you want to select quizzes please click <a href="<?=base_url('quiz')?>">here</a></p>

<script>
    $('#history-table').DataTable({
        ajax: '/quiz-serverside-master/user/history_data'
    });
</script>
</body>
</html>
