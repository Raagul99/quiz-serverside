<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        /* Add a black background color to the top navigation */
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
        }

        label {
          padding: 12px 0;
          display: inline-block;
        }

        input[type=submit] {
          background-color: #000;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: right;
        }

        input[type=submit]:hover {
          background-color: #333;
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
  <a class="active"  href="/CI/quiz/viewAddQuiz">Add Quiz</a>
  <a href="/CI/quiz">Take Quiz</a>
  <a href="/CI/user/home">History</a>
  <a href="/CI/user/logout">Log Out</a>
</div>

<h3>Hey <?php
$uname = $this->session->user_name;
$last_id = $this->session->last_id;
echo $uname;
?>!</h3>

<h3>Create Quiz</h3>

<div class="container">
  <form name="myForm">
    <div class="row">
      <div class="col-25">
        <label for="topic" >Topic</label>
      </div>
      <div class="col-75">
        <input required type="text" id="topic" name="topic" placeholder="Quiz Topic">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="diffi">Difficulty</label>
      </div>
      <div class="col-75">
        <select name="q-difficulty" id="q-difficulty"> 
          <option value="Easy">Easy</option>
          <option value="Medium">Medium</option> 
          <option value="Hard">Hard</option> 
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="score">Scoring System (per question)</label>
      </div>
      <div class="col-75">
        <input type="number" min="1" max="10" id="q-score" name="q-score" value="1">
      </div>
    </div>  
    <br>
    <div class="row">
      <input type="submit" value="Create" id="create">
    </div>
  </form>
</div>

<script>
  $(document).ready(function() {
    $("#create").click(function(event) {
      event.preventDefault();

      let x = document.forms["myForm"]["topic"].value;
      if (x == "") {
        alert("Topic must be filled out");
        return false;
      }


      var quiz_topic = $("input#topic").val();  
      var quiz_difficulty = $("select#q-difficulty").val();
      var quiz_scoringsystem = parseInt($("input#q-score").val()); 

      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>quiz/addQuiz",  
        dataType: 'JSON',
        data: {
          quiz_topic: quiz_topic,
          quiz_difficulty: quiz_difficulty,
          quiz_scoringsystem: quiz_scoringsystem
        },
        success: function(data) {
          console.log(quiz_topic, quiz_difficulty, quiz_scoringsystem);
          $("#data").load(location.href + " #data");
          var redirectUrl = "http://localhost/CI/quiz/viewAddQuestion";
          window.location.href = redirectUrl;
        }
      });
    });
  });
</script>
</body>
</html>