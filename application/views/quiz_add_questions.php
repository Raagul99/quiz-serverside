<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        /* Top navigation bar */
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

        /* Page background */
        body {
            background: url('https://wallpapercave.com/wp/wp9081316.jpg') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(1px); /* applying blur effect */
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        /* Center align the welcome message */
        h3 {
          text-align: center;
        }

        /* Form container */
        .container {
          margin: 0 auto;
          width: 50%;
          padding: 20px;
          background-color: rgba(0, 0, 0, 0.5); /* semi-transparent background */
          border-radius: 5px;
        }

        /* Form inputs */
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

        input[type=submit], input[type=button]#complete {
          background-color: #000;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: right;
        }

        input[type=submit]:hover, input[type=button]#complete:hover {
          background-color: #333;
        }

        /* Clear floats */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        /* Responsive design */
        @media screen and (max-width: 600px) {
          .container {
            width: 100%;
          }
        }
    </style>

    <!-- External libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>
    
</head>
<body>

<!-- Top Navigation -->
<div class="topnav">
  <a href="/CI/user/welcome_page">Welcome</a>
  <a class="active" href="/CI/quiz/viewAddQuiz">Add Quiz</a>
  <a href="/CI/quiz">Take Quiz</a>
  <a href="/CI/user/history">History</a>
  <a href="/CI/user/logout">Log Out</a>
</div>

<!-- Welcome Message -->
<h3>Hey <?php $uname = $this->session->user_name; echo $uname; ?>!</h3>

<!-- Create MCQ Form -->
<h3>Create MCQ For Quiz no <?php $last_id = $this->session->last_id; echo $last_id; ?></h3>

<div class="container">
 <form name="myForm">

 <div id="inputs">
    <div class="row">
      <div class="col-25">
      <label for="topic">Question number</label>
      </div>
      <div class="col-75">
        <input type="text" id="qno" name="qno" readonly>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
      <label for="topic">Question</label>
      </div>
      <div class="col-75">
        <input type="text" id="topic" name="topic" placeholder="Your Question Here">
      </div>
    </div>
		
    <!-- Options -->
    <div class="row">
      <div class="col-25">
      <label for="topic">Option 1</label>
      </div>
      <div class="col-75">
        <input type="text" id="opt1" name="opt1" placeholder="Option 1">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
      <label for="topic" id="lbl2">Option 2</label>
      </div>
      <div class="col-75">
        <input type="text" id="opt2" name="opt2" placeholder="Option 2">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
      <label for="topic" id="lbl3">Option 3</label>
      </div>
      <div class="col-75">
        <input type="text" id="opt3" name="opt3" placeholder="Option 3">
      </div>
    </div>
    <!-- Answer -->
    <div class="row">
      <div class="col-25">
      <label for="topic">Answer</label>
      </div>
      <div class="col-75">
        <input type="text" id="ans" name="ans" placeholder="Answer">
      </div>
    </div>
</div>
    
<br>

    <!-- Create and Complete Buttons -->
    <div class="row" id="sbtn">
      <input type="submit" value="Create" id="create">
    </div>
    <div class="row">
      <input type="button" value="Complete" id="complete" style="display: none;" >
    </div>
  </form>

  <!-- Create message -->
  <p id="createmsg"></p>

</div>


<script>

  $(document).ready(function() {
    var num = 1;
    $("input#qno").val(num); 

    // Create button click event
	  $("#create").click(function(event) {
		  event.preventDefault();

      // Form validation
      let q = document.forms["myForm"]["topic"].value;
      let opt1 = document.forms["myForm"]["opt1"].value;
      let opt2 = document.forms["myForm"]["opt2"].value;
      let opt3 = document.forms["myForm"]["opt3"].value;
      let ans = document.forms["myForm"]["ans"].value;

      if (q == "") {
        alert("Question must be filled out");
        return false;
      }
      else if (opt1 == "" || opt2 == "" || opt3 == "" || ans == "" ){
        alert("All options must be filled out");
        return false;
      }
     
      var q_num = $("input#qno").val();
      var quiz_id = <?php echo json_encode($last_id); ?>;
		  var question_text = $("input#topic").val();  
	    var question_option_1 = $("input#opt1").val();
	    var question_option_2 = $("input#opt2").val();
	    var question_option_3 = $("input#opt3").val();
	    var question_answer = $("input#ans").val(); 

      // AJAX request to add question
      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>quiz/addQuestion",	
        dataType: 'JSON',
        data: {quiz_id: quiz_id, q_num: q_num,  question_text: question_text, question_option_1: question_option_1, question_option_2: question_option_2, question_option_3: question_option_3, question_answer: question_answer },
        
        success: function(data) {
          $("#data").load(location.href + " #data");

          // Clear input fields
          $("input#topic").val(""); 
          $("input#opt1").val(""); 
          $("input#opt2").val("");
          $("input#opt3").val("");
          $("input#ans").val("");

          // Increment question number
          ++num;
          $("input#qno").val(num); 
          // Hide form after 10 questions
          if (num>9){
            $("div#sbtn").hide();
            $("input#complete").show();
          }

        }
      });

  
	  });

    // Complete button click event
    $("#complete").click(function(event) {

      $("#data").load(location.href + " #data");
      alert("The questions has been added! Thank You!");
     
      var redirectUrl2 = "http://localhost/CI/quiz/viewWelcomePage";
      window.location.href = redirectUrl2;

    });

  });

  // Backbone Model and View
  $(document).ready(function() {
     var Create = Backbone.Model.extend({
       url: function () {
         var link = "<?php echo base_url(); ?>quiz/addQuestion?q_num=" + this.get("q_num");
         return link;
       },
       defaults: {
         q_num:null,
         quiz_id: null,
         question_text: null,
         question_option_1: null,
         question_option_2: null,
         question_option_3: null,
         question_answer: null
         }
     });
     
     var createModel = new Create();
     
     var DisplayView = Backbone.View.extend({
       el: ".container", 
       model: createModel,
       initialize: function () {
         this.listenTo(this.model,"sync change",this.gotdata);
       },
       
       events: {
         "click #create" : "getdata"
       },
       
       getdata: function (event) {
         var q_num = $('input#qno').val();
         this.model.set({q_num: q_num});
         this.model.fetch();
       },
       
       gotdata: function () {
         $('#createmsg').html('Question number  ' + this.model.get('q_num') +  ' has been created').show().fadeOut(5000);
       }
     });
     
     var displayView = new DisplayView();
     
    });
   
</script>

</body>
</html>
