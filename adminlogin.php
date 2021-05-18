<?php
session_start();
include("db.php"); //data connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Admin Login</title>
</head>
<body>
<?php
if(isset($_SESSION['name']))
{
    echo "<script type='text/javascript'>alert('You have to logout first!!'); window.location.href='admin_dashboard.php'</script>";

}
else
{
?>
<a href="index.php">    <img class="back" src="css/back.png" alt="" srcset="" width="50" height="48" style="margin:25px 40px;"></a>
    <div class="login-box">

    <h1>Admin Login</h1>
    <form method="post" action="admin/admin_logindata.php">
        <div class="textbox">
         <input type="text" name="name" placeholder="Username" required/>
        </div>
        
        <div class="textbox">
            <input type="password" name="login_pass" placeholder="Admin Password" required/>
        </div>

        <button name="login" type="submit" class="btn btn-secondary">Login</button>
        <p style="color:grey; font-size:14px">Don't have an admin account? Contact Us</p>
    </form>
</div>
<?php
}
?>
</body>
</html>
