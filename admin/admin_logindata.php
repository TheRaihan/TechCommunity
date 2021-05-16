<?php
session_start(); // session starts
include("../db.php");// database connection
if(isset($_POST["login"]))
{
    $name=$_POST["name"]."_admin";
    $pass=$_POST["login_pass"];
    $query1="SELECT * FROM admin WHERE name='$name' AND password='$pass'";
    $result1=mysqli_query($con, $query1);
    $num1=mysqli_num_rows($result1);
    if($num1>0)
    {
        while($row= mysqli_fetch_assoc($result1))
        {
            $id=$row['id'];
            $name=$row['name'];
            $_SESSION['id']=$id;
            $_SESSION['name']=$row['name'];
            $_SESSION['pass']=$row['password'];

        }
            header("Location:../admin_dashboard.php");

    }
    else
    {
       echo "<script type='text/javascript'>alert('Wrong Password!Try again.'); window.location.href='../adminlogin.php'</script>"; 
    }
}
?>