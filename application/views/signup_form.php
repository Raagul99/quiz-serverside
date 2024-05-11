<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Signup Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
/* Universal box model */
* {
  box-sizing: border-box;
}

/* Body styles */
body {
  background-image: url('https://www.etoncollege.com/wp-content/uploads/2020/06/shutterstock_1186919464-scaled.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  color: black;
  height: 100%;
}

/* Form container */
.container {
  border-radius: 10px;
  background-color: rgba(0, 0, 0, 0.1);
  padding: 50px;
  margin: 90px auto;
  max-width: 400px;
  backdrop-filter: blur(5px);
}

/* Heading styles */
h1 {
  text-align: center;
  font-weight: bold;
  font-size: 40px;
}

/* Grid column styles */
.col-25, .col-75 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  width: 75%;
}

/* Input field styles */
input[type=text], input[type=password] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color: #f2f2f2;
  color: black;
}

/* Submit button styles */
input[type=submit] {
  background-color: black;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #333;
}

/* Error styling for input fields */
input.error, select.error, textarea.error {
  border-color: red;
}

/* Label styles */
label {
  padding: 8px 8px 8px 0;
  display: inline-block;
  font-weight: bold;
}

/* Responsive layout */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<div class="container">
  <h1>SIGNUP FORM</h1>
  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
  <?php endif; ?>
  <form id="signupForm" method="post" action="<?=base_url('user/submit_signup')?>">
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="user_name" placeholder="Your Name.." class="<?= form_error('user_name') ? 'error' : '' ?>">
        <?php if(form_error('user_name')) echo '<div style="color:red">'.form_error('user_name').'</div>'; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="email" placeholder="Your Email" class="<?= form_error('email') ? 'error' : '' ?>">
        <?php if(form_error('email')) echo '<div style="color:red">'.form_error('email').'</div>'; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="password">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="password" name="password" placeholder="Your Password" class="<?= form_error('password') ? 'error' : '' ?>">
        <?php if(form_error('password')) echo '<div style="color:red">'.form_error('password').'</div>'; ?>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
  <div class="message"></div>
  <div>
    <p style="font-size: 16px; font-weight: bold; color: #000;"> Already have an account? Click  <a href="<?=base_url('user/login')?>">here</a></p>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#signupForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
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

</body>
</html>
