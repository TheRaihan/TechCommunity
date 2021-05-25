<?php
include("db.php"); //data connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
    <header>
        <h3 class="logo">PaperBack</h3>
        <nav class="">
            <ul class="nav__links">
                <li><a href="#">Services</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        <span>
            <a class="cta" href=adminlogin.php><button>ADMIN</button></a>
            <a class="cta" href=userlogin.php><button>USER</button></a>
        </span>
      
    </header>

    <section id="banner">
        <h2>PaperBack</h2>
        <p>A Community Site for Tech Geeks of East West University</p>
        <ul>
            <a href="register.php"><button class="butt">Register</button></a>
        </ul>
    </section>


</body>
</html>