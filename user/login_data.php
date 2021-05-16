<?php
session_start(); // session starts
include("../db.php");// database connection
if(isset($_POST["login"]))
{
    $name=$_POST["name"];
    $pass=$_POST["login_pass"];
    $e_pass= md5($pass);
    $query1="SELECT * FROM user WHERE name='$name' && password='$e_pass'";
    $result1=mysqli_query($con, $query1);
    $num1=mysqli_num_rows($result1);
    if($num1>0)
    {
        while($row= mysqli_fetch_assoc($result1))
        {
            $id=$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $password=$row['password'];
            $image=$row['image'];

            $_SESSION['id']=$id;
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            $_SESSION['password']=$password;
            $_SESSION['image']=$image;

        }
        // if(isset($_POST['remember']))
        // {
        //     setcookie($name,$password, time()+3600*24);
            
        // }
            header("Location:../dashboard.php");

    }
    else
    {
       echo "<script type='text/javascript'>alert('Wrong Password!Try again.'); window.location.href='../userlogin.php'</script>"; 
    }
}
?>