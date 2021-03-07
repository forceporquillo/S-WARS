<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login/SignUp</title>
    <link rel="stylesheet" type="text/css" href="styles1.css">
</head>
<body>
<div class="sign">
    <div class="container" id="container">
    <div class="form-container sign-up-container">
        <form method="post" action="">
            <h1>Create Account</h1>
            <br>
            <input type="text" name="username" required="" placeholder="Username" oninvalid="this.setCustomValidity('Username is required')"
                   oninput="setCustomValidity('')" value="<?php echo $username; ?>">
            <input type="email" name="email" required="" placeholder="Email" oninvalid="this.setCustomValidity('Email is required')"
                   oninput="setCustomValidity('')" value="<?php echo $email; ?>">
            <input type="password" id ="password" name="password_1" required="" placeholder="Password" oninvalid="this.setCustomValidity('Password is required')"
                   oninput="setCustomValidity('')">
            <input type="password" id ="confirm_password" name="password_2" required="" placeholder="Confirm Password">
            <br> <br>
            <?php include('errors.php'); ?>
            <button type="submit" class="btn" name="reg_user">Register</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form method="post" action="">
            <h1>Log In</h1>
            <br>
            <input type="text" name="username" required="" placeholder="Username" oninvalid="this.setCustomValidity('Username is required')"
                   oninput="setCustomValidity('')">
            <input type="password" name="password" required="" placeholder="Password" oninvalid="this.setCustomValidity('Password is required')"
                   oninput="setCustomValidity('')">
            <br> <br>
            <?php include('errors.php'); ?>
            <button type="submit" class="btn" name="login_user">Log In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>Log in to continue to your account.</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <img src="pics/signin.png" height="200" width="200" style="margin-top:-50px;">
                <h1>Hello, Friend!</h1>
                <p>Not a member yet? Create your account!</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    const password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });
    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>








