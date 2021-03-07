<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: signlog.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: signlog.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="styles1.css">
</head>
<style>
    .error {
        width: 92%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        background: #f2dede;
        border-radius: 5px;
        text-align: left;
    }
    .success {
        color: #3c763d;
        background: #dff0d8;
        border: 1px solid #3c763d;
        margin-bottom: 20px;
    }
</style>
<body>
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
        <p style="color:#d70040">WELCOME <strong><?php echo $_SESSION['username']; ?>!</strong></p>
    <?php endif ?>
</body>
</html>