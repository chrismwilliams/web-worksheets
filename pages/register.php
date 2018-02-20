<?php 

if (isset($_POST['email']) || isset($_POST['password'])) {
  if (!$_POST['email'] || !$_POST['password']) {
    $error = "Please enter an email and password";
  }

  if (!$error) {
    require_once 'classes/users.classes.php';

    $usersObj = new users($db);
    $createUser = $usersObj->registerUser($_POST['email'], $_POST['password']);

    if ($createUser) {
      $to = $_POST['email'];
      $subject = "Welcome to our TODO List";

      $message = "
      <html>
        <head>
          <title>Welcome to our TODO list</title>
        </head>
        <body>
          <p>Welcome to our todo list application</p>
        </body>
      </html>      
      ";

      // content-type of email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html:charset=UTF-8" . "\r\n";
      $headers .= "From: <me@student.worc.ac.uk>" . "\r\n";

      mail($to, $subject, $message, $headers);

      echo "<script> window.location.assign('index.php?p=registersuccess'); </script>";
    }
  }

}
?>

<div class="container">
  <h1>Register</h1>
  <form action="index.php?p=register" method="post">
    <?php 
    if ($error) {
      echo
        '<div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        ' . $error . ' 
      </div>';
    }
    ?>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-default">Register</button>
  </form>
</div>