<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Styles -->
    <style>
        /* Set page background */
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

        /* Top navigation bar styles */
        .topnav {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for navbar */
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

        /* Welcome message styles */
        h1.welcome-message {
            text-align: center;
        }
    </style>

    <!-- External Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>

<!-- Top Navigation Bar -->
<div class="topnav">
    <a href="/CI/user/welcome_page">Welcome</a>
    <a href="/CI/quiz/viewAddQuiz">Add Quiz</a>
    <a href="/CI/quiz">Take Quiz</a>
    <a class="active" href="/CI/user/history">History</a>
    <a href="/CI/user/logout">Log Out</a>
</div>

<!-- Welcome Message -->
<h1 class="welcome-message">Welcome <?php echo $this->session->user_name; ?>!</h1>

<!-- Quiz History Table -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Your Quiz History</h1>
            <table id="history-table" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Quiz Title</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Link to Select Quizzes -->
<p>If you want to select quizzes please click <a href="<?=base_url('quiz')?>">here</a></p>

<!-- JavaScript -->
<script>
    // Initialize DataTable for history table
    $('#history-table').DataTable({
        ajax: '/CI/user/history_data'
    });
</script>
</body>
</html>
