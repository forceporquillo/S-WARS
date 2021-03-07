<!DOCTYPE html>
<html lang="en">
<head>
    <title>S-WARS</title>
    <link rel="stylesheet" type="text/css" href="styles1.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap');
        * {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: "Montserrat", sans-serif;
        }
        .nav-container {
            width: 100%;
            height: 100vh;
        }
        .navbar {
            width: 300px;
            height: 100%;
            background-color:#fff;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25),
            0 10px 10px rgba(0,0,0,0.22);
            position: fixed;
            top: 0;
            right: -300px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: right 0.8s cubic-bezier(1, 0, 0, 1);
        }
        .change {
            right: 0;
        }
        .hamburger-menu {
            width: 35px;
            height: 30px;
            position: fixed;
            top: 50px;
            right: 50px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }
        .line {
            width: 100%;
            height: 3px;
            background-color:#d70040;
            transition: all 0.8s;
        }
        .change .line-1 {
            transform: rotateZ(-405deg) translate(-8px, 6px);
        }
        .change .line-2 {
            opacity: 0;
        }
        .change .line-3 {
            transform: rotateZ(405deg) translate(-8px, -6px);
        }
        .nav-list {
            text-align: center;
        }
        .nav-item {
            list-style: none;
            margin: 25px;
        }
        .nav-link {
            text-decoration: none;
            font-size: 20px;
            color:#d70040;
            font-weight: 600;
            letter-spacing: 1px;
            font-family:'Nunito Sans',sans-serif;
            text-transform: uppercase;
            position: relative;
            padding: 3px 0;
        }
        .nav-link::before,
        .nav-link::after {
            content: "";
            width: 100%;
            height: 2px;
            background-color:#d70040;
            position: absolute;
            left: 0;
            transform: scaleX(0);
            transition: transform 0.5s;
        }
        .nav-link::after {
            bottom: 0;
            transform-origin: right;
        }
        .nav-link::before {
            top: 0;
            transform-origin: left;
        }
        .nav-link:hover::before,
        .nav-link:hover::after {
            transform: scaleX(1);
        }
    </style>
</head>
<body>
<div class="nav-container">
    <nav class="navbar">
        <div class="hamburger-menu">
            <div class="line line-1"></div>
            <div class="line line-2"></div>
            <div class="line line-3"></div>
        </div>
        <ul class="nav-list">
            <li class="nav-item">
                <?php include('notification.php') ?>
            </li>
            <br>
            <li class="nav-item">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Overview</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Menu</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Ratings and Review</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Reservation</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Pricing</a>
            </li>
            <br> <br>
            <li class="nav-item">
                <button style="background-color: transparent;
                border-color:#d70040;"><a href="notification.php?logout='1'" style="color:#d70040">LOG OUT</a></button>
            </li>
        </ul>
    </nav>
    <img src="pics/samgyup.jpg">
</div>
    <script type="text/javascript">
    const menuIcon = document.querySelector(".hamburger-menu");
    const navbar = document.querySelector(".navbar");

    menuIcon.addEventListener("click", () => {
    navbar.classList.toggle("change");
    });
    </script>
</body>
</html>