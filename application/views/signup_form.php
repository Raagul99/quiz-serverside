<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* CSS styles for the form */
/* Universal box model */
* {
  box-sizing: border-box;
}

/* Body styles */
body {
  background-color: #112233; /* Set background color */
  color: white; /* Set text color */
}

/* Input field styles */
input[type=text], input[type=password], select, textarea {
  width: 100%; /* Set width to 100% */
  padding: 8px; /* Add padding */
  border: 1px solid #ccc; /* Add border */
  border-radius: 4px; /* Add border radius */
  resize: vertical; /* Allow vertical resizing */
  background-color: #f2f2f2; /* Set background color */
  color: black; /* Set text color */
}

/* Error styling for input fields */
input.error, input.error[type=password], select.error, textarea.error {
  border-color: red; /* Set border color to red for fields with errors */
}

/* Label styles */
label {
  padding: 8px 8px 8px 0; /* Add padding */
  display: inline-block; /* Display as inline block */
}

/* Submit button styles */
input[type=submit] {
  background-color: black; /* Set background color */
  color: white; /* Set text color */
  padding: 10px 20px; /* Add padding */
  border: none; /* Remove border */
  border-radius: 4px; /* Add border radius */
  cursor: pointer; /* Add cursor pointer */
  float: right; /* Float to right */
}

/* Hover effect for submit button */
input[type=submit]:hover {
  background-color: #333; /* Darken background color on hover */
}

/* Container styles */
.container {
  border-radius: 5px; /* Add border radius */
  background-color: #112233; /* Set background color */
  padding: 20px; /* Add padding */
  margin: 0 auto; /* Center horizontally */
  max-width: 400px; /* Set maximum width */
  margin-top: 50px; /* Add top margin */
}

/* Heading styles */
h1 {
  text-align: center; /* Center align heading */
}

/* Grid column styles */
.col-25 {
  float: left; /* Float left */
  width: 25%; /* Set width */
  margin-top: 6px; /* Add top margin */
}

.col-75 {
  float: left; /* Float left */
  width: 75%; /* Set width */
  margin-top: 6px; /* Add top margin */
}

/* Clear floats */
.row:after {
  content: ""; /* Clear content */
  display: table; /* Display as table */
  clear: both; /* Clear both floats */
}

/* Responsive layout */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%; /* Set width to 100% on smaller screens */
    margin-top: 0; /* Remove top margin */
  }
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json', // Expect JSON response
            success: function(response) {
                if(response.status == 'success') {
                    $('.message').html('<span style="color:green">' + response.message + '</span>');
                } else {
                    $('.message').html('<span style="color:red">' + response.message + '</span>');
                }
            }
        });
    });
});
</script>
</head>
<body>
<h1>Signup Form</h1>
<div class="container">
  <form method="post" action="<?=base_url('user/submit_signup')?>">
    <!-- Name input field -->
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <!-- Input field with conditional class for error highlighting -->
        <input type="text" id="fname" name="user_name" placeholder="Your Name.." class="<?= form_error('user_name') ? 'error' : '' ?>">
        <!-- Error message for name -->
        <?php if(form_error('user_name')) echo '<div style="color:red">'.form_error('user_name').'</div>'; ?>
      </div>
    </div>
    <!-- Email input field -->
    <div class="row">
      <div class="col-25">
        <label for="lname">Email</label>
      </div>
      <div class="col-75">
        <!-- Input field with conditional class for error highlighting -->
        <input type="text" id="lname" name="email" placeholder="Your Email" class="<?= form_error('email') ? 'error' : '' ?>">
        <!-- Error message for email -->
        <?php if(form_error('email')) echo '<div style="color:red">'.form_error('email').'</div>'; ?>
      </div>
    </div>
		<!-- Password input field -->
		<div class="row">
      <div class="col-25">
        <label for="password">Password</label>
      </div>
      <div class="col-75">
        <!-- Input field with conditional class for error highlighting -->
        <input type="password" id="password" name="password" placeholder="Your Password" class="<?= form_error('password') ? 'error' : '' ?>">
        <!-- Error message for password -->
        <?php if(form_error('password')) echo '<div style="color:red">'.form_error('password').'</div>'; ?>
      </div>
    </div>

    <!-- Submit button -->
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
  <!-- Message container -->
  <div class="message"></div>
  <!-- Link to login page -->
  <div>
    <p> Already have an account? Click  <a href="<?=base_url('user/login')?>">here</a></p>
  </div>
</div>
</body>
</html>
