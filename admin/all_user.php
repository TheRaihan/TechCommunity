<?php
session_start();
include("../db.php"); //data connection
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
        
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/nav.css">
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
    <body >
    <br>
    <h1 class="container ">USER LIST</h1>
    <br>
 
<?php
$query="SELECT * from user";
$result=mysqli_query($con,$query);
while ($row = mysqli_fetch_array($result))
{   $id=$row["id"];
    $name=$row["name"];
    $email=$row['email'];
    $image=$row['image'];
?>

<div class="container" align="center">

        </div>
    <div class="container">
    <div class="row align-items-center; data">
        <div class="col-2">
             <img class="image"src="../images/<?php echo $image;?>"width="150px" height="150px">
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
</div>
<hr style="width:100%">
<?php
}
echo "<a class='btn btn-secondary' href=admin_dashboard.php style=\"margin-left: 41%; margin-bottom:10%\">Back To ADMIN Dashboard</a>";

}
include("../footer.php");
?>

</body>
</html>



