<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
}
html, body {
  height: 90%
}

/* Input field styles */
input[type=text], input[type=password], select, textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color: #f2f2f2;
  color: black;
}

/* Error styling for input fields */
input.error, input.error[type=password], select.error, textarea.error {
  border-color: red;
}

/* Label styles */
label {
  padding: 8px 8px 8px 0;
  display: inline-block;
  font-weight: bold;
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

/* Hover effect for submit button */
input[type=submit]:hover {
  background-color: #333;
}

/* Container styles */
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

/* Responsive layout */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

/* Alert styles */
.alert {
  color: red;
  padding: 15px;
  border-radius: 4px;
}

</style>
</head>
<body>
<div class="container">
<h1>LOGIN FORM</h1>
  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
  <?php endif; ?>
  <form method="post" action="<?=base_url('user/login_user')?>">
    <!-- Email input field -->
    <div class="row">
      <div class="col-25">
        <label for="lname">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="email" placeholder="Your Email" class="<?= form_error('email') ? 'error' : '' ?>">
        <?php if(form_error('email')) echo '<div style="color:red">'.form_error('email').'</div>'; ?>
      </div>
    </div>
    <!-- Password input field -->
    <div class="row">
      <div class="col-25">
        <label for="password">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="password" name="password" placeholder="Your Password" class="<?= form_error('password') ? 'error' : '' ?>">
        <?php if(form_error('password')) echo '<div style="color:red">'.form_error('password').'</div>'; ?>
      </div>
    </div>

    <!-- Submit button -->
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
  <!-- Link to signup page -->
  <div>
    <p style="font-size: 16px; font-weight: bold; color: #000; text-stroke: 3px #fff;">
        Don't have an account? Click <a href="<?=base_url('user/signup')?>">here</a>
    </p>
</div>

</div>
</body>
</html>
