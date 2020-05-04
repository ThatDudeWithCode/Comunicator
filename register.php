<?php
require 'includes/config.php';
require 'includes/register_handler.php';
require 'includes/login_handler.php';
?>
<!doctype html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="author" content="Tristan Elliott">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Social Media Networking Website">
    <meta name="keywords" content="Social Media, Website, HTML, CSS, JAVASCRIPT">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Communicator - Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body class="login-register-bg">



<?php

if(isset($_POST['register_button'])){
    echo'<script>
    $(document).ready(function () {
        $("#first").hide();
        $("#second").show();
    });
</script>';
}

?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="comm-brand">Communicator</h1>
                    <h3>Login</h3>
                    <hr>
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <label for="log_email">Email Address</label>
                            <input type="email" name="log_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="log_password">Password</label>
                            <input type="password" name="log_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login_button" class="btn btn-custom" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1>Register</h1>
                    <hr>
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <label for="reg_fname">First Name</label>
                            <input type="text" class="form-control" name="reg_fname" placeholder="First Name" value="<?php if(isset($_SESSION['reg_fname'])){echo $_SESSION['reg_fname'];} ?>" required>
                            <?php if(in_array("Your first name must be between 2 and 255 characters", $error_array)) echo "Your first name must be between 2 and 255 characters"; ?>
                        </div>
                        <div class="form-group">
                            <label for="reg_lname">Last Name</label>
                            <input type="text" class="form-control" name="reg_lname" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname'])){echo $_SESSION['reg_lname'];} ?>" required>
                            <?php if(in_array("Your last name must be between 2 and 255 characters", $error_array)) echo "Your last name must be between 2 and 255 characters"; ?>
                        </div>
                        <div class="form-group">
                            <label for="reg_email">Email</label>
                            <input type="email" class="form-control" name="reg_email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])){echo $_SESSION['reg_email'];} ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="reg_email2">Confirm Email</label>
                            <input type="email" class="form-control" name="reg_email2" placeholder="Confirm Email" value="<?php if(isset($_SESSION['reg_email2'])){echo $_SESSION['reg_email2'];} ?>" required>
                            <?php if(in_array("Email already in use", $error_array)) echo "Email already in use"; ?>
                        </div>
                        <div class="form-group">
                            <label for="reg_password">Password</label>
                            <input type="password" class="form-control" name="reg_password" placeholder="Password" required>
                            <?php if(in_array("Your password must be between 8 and 255 characters", $error_array)) echo "Your password must be between 8 and 255 characters"; ?>
                        </div>
                        <div class="form-group">
                            <label for="reg_password2">Confirm Password</label>
                            <input type="password" class="form-control" name="reg_password2" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register_button" class="btn btn-custom" value="Register">
                        </div>
                        <?php if(in_array("You are registered and can now login!", $error_array)) echo "You are registered and can now login!"; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
