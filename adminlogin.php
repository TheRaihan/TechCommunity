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

 <!--bootstrap js-->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>   
</body>
</html>
