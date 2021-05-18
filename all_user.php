<?php
session_start();
include("db.php"); //data connection
include("admin_main_navbar.php");
if(!$_SESSION['name'])
{
    echo "<script type='text/javascript'>alert('You are not Logged in!!'); window.location.href='adminlogin.php'</script>";
}
else
{
?>
<html>
    <head>
        <div class="container" align="center">

            <h1>USER LIST</h1>
            <br>
            <br>
        </div>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav.css">

    </head>
    <body>


        <!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>       
</body>
</html>
<?php
$query="SELECT * from user";
$result=mysqli_query($con,$query);
while ($row = mysqli_fetch_array($result))
{   $id=$row["id"];
    $name=$row["name"];
    $email=$row['email'];
    $image=$row['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .back{
                background-color: whitesmoke;
                }
        .data{

            padding: 20px;
            background-color:white;
            width:100%;
        }
    </style>
    
</head>
<body class="back">
    <div class="container">
    <div class="row align-items-center; data">
    <div class="col-2">
    <img class="image"src="profiles/<?php echo $image;?>"width="150px" height="150px">
    </div>
    <div class="col-4">
        <br>
        <br>
        <br>
    <h5>Username: <?php echo $name;?></h5>
    </div>
    <div class="col-3">
    <br>
        <br>
        <br>
    <h6><?php echo $email;?></h6>
    </div>
    <div class="col-3">
    <br>
        <br>
        <br>
           <form method="post" action="delete_user.php">
               <input type="hidden" name="name" value="<?php echo $name;?>">
            <button type="submit" name="delete"  class="btn btn-danger">DELETE USER</a>
        </form>
    </div>
</div>

<hr style="width:100%">

</body>
</html>
<?php
}
echo "<a class='btn btn-secondary' href=admin_dashboard.php>Back To ADMIN Dashboard</a>";
}
?>


