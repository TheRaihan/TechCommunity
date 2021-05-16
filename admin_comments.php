<?php
session_start();
include("db.php"); //data connection
include("user_navbar.php");
if(!isset($_SESSION['name']))
{
    echo "<script type='text/javascript'>alert('You are not Logged in!!'); window.location.href='adminlogin.php'</script>";
}
else{
     if(isset($_POST["add"]))
     {
        $name=$_SESSION['name'];
        $blog_id=$_POST['id'];
        $comment=$_POST['comment'];
        $query="INSERT INTO comments(name,blog_id,comment) VALUES('$name','$blog_id','$comment')";
        $result=mysqli_query($con,$query);
        header("Location:admin_fullpost.php?id=". $blog_id);
      }
    } 
?>
