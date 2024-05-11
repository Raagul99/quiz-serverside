<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Review</title>
    
    <!-- Styling -->
    <style>
        /* Add a black background color to the top navigation */
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

        /* Center the welcome message */
        h3 {
            text-align: center;
        }

        /* Center the form */
        .container {
            margin: 0 auto;
            width: 50%;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }

        /* Style the form inputs */
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
            background-color: #000; /* Adjust button background color */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover, input[type=button]:hover {
            background-color: #333; /* Adjust button hover background color */
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
<a href="/quiz-serverside-master/user/welcome_page">Welcome</a>
  <a href="/quiz-serverside-master/quiz/viewAddQuiz">Add Quiz</a>
  <a class="active"  href="/quiz-serverside-master/quiz">Take Quiz</a>
  <a href="/quiz-serverside-master/user/history">History</a>
  <a href="/quiz-serverside-master/user/logout">Log Out</a>
</div>

<!-- Welcome Message -->
<h3>Hey <?php echo $this->session->user_name; ?>!</h3>

<!-- Review Form -->
<h3 id="h3">Leave a Review</h3>
<label id="hid" style="display: hidden;"> Thank you for Your Review! Please Head Back to Home!</label>
<div class="container" id="cont">
    <form>
        <div class="row">
            <div class="col-25">
                <label for="topic">Write a review</label>
            </div>
            <div class="col-75">
                <input type="text" id="review" name="review">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="tlimit">Rating out of 5</label>
            </div>
            <div class="col-75">
                <select name="rating" id="rating"> 
                    <option value="1">1</option> 
                    <option value="2">2</option> 
                    <option value="3">3</option> 
                    <option value="4">4</option>  
                    <option value="5">5</option>  
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Submit" id="create">
        </div>
    </form>
</div>

<!-- JavaScript -->
<script>
    $(document).ready(function() {
        $("#create").click(function(event) {
            event.preventDefault();
            var review = $("input#review").val();  
            var rating = $("select#rating").val();  

            // Hide form elements and display a thank you message
            $("div#cont").hide();
            $("h3#h3").hide();
            $("label#hid").show();

            // AJAX request to submit review data
            $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>quiz/addReview",	
                dataType: 'JSON',
                data: {review: review, rating: rating}
            });
        });
    });
</script>
</body>
</html>
