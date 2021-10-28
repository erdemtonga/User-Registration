<?php include 'controllers/authController.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <title>Forgot Password</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth login">
        <h3 class="text-center form-title">Recover your password </h3>
        <form action="forgot_password.php" method="post">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control form-control-lg" >
          </div>
          
          <div class="form-group">
            <button type="submit" name="forgot-password" class="btn btn-lg btn-block">Reset your password</button>
          </div>
		  <p>
		  Please enter your email adress you used to signup on this site and we will assist you in recovering your password.
		  
		  </p>

<?php if (count($errors) > 0): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>
        </form>
        
      </div>
    </div>
  </div>
</body>
</html>