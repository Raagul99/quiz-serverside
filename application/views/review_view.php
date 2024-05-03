<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        /* Styling for top navigation */
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

        /* Style the container */
        .container {
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0.5); /* semi-transparent background for container */
            padding: 20px;
            margin-top: 20px; /* Add margin to separate from the previous element */
        }

        /* Style form inputs */
        input[type=text], input[type=password], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            background-color: #333; /* Adjust input background color */
            color: #fff; /* Adjust input text color */
        }

        label {
            padding: 12px 0;
            display: inline-block;
        }

        input[type=submit], input[type=button] {
            background-color: #333; /* Adjust button background color */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover, input[type=button]:hover {
            background-color: #555; /* Adjust button hover background color */
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 100%;
            }
        }
    </style>

    <!-- JavaScript and CSS libraries -->
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
    <a href="/CI/user/welcome_page">Welcome</a>
    <a href="/CI/quiz/viewAddQuiz">Add Quiz</a>
    <a class="active" href="/CI/quiz">Take Quiz</a>
    <a href="/CI/user/history">History</a>
    <a href="/CI/user/logout">Log Out</a>
</div>

<!-- Displaying user's name and quiz ID -->
<h1>Welcome <?php $uname = $this->session->user_name; echo $uname; ?>!
    the reviews for quiz number <?php $quiz_id = $this->session->userdata('quiz_id'); echo $quiz_id; ?> are
</h1>

<br>
<br>

<!-- Container for displaying quiz reviews -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Quiz Reviews</h1>
            <table id="review-table" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <td>User</td>
                    <td>Rating</td>
                    <td>Comments</td>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Continue button form -->
<div class="container">
    <form method="post" action="<?=base_url('quiz/quizDisplay')?>">
        <div class="row">
            <input type="submit" value="Continue" id="submit">
        </div>
    </form>
</div>
</body>

<script>
    // Initialize DataTable for quiz reviews
    $('#review-table').DataTable({
        ajax: '/CI/quiz/viewreviewData'
    });
</script>
</html>
