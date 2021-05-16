<?php
 session_start();
 include("db.php"); //data connection
 if(isset($_POST["delete"]))
 {
    $name=$_POST["name"];
    $user="SELECT * FROM user WHERE name='$name'";
    $result1=mysqli_query($con,$user);
    $num=mysqli_num_rows($result1);
    if($num>0)
    {
        $d_user="DELETE FROM user where name='$name'";
        mysqli_query($con,$d_user);
        $d_post="DELETE FROM blogs where name='$name'";
        mysqli_query($con,$d_post);
        $d_comment="DELETE FROM comments where name='$name'";
        mysqli_query($con,$d_comment);
        $d_likes="DELETE FROM likes where name='$name'";
        mysqli_query($con,$d_likes);
        $d_dislikes="DELETE FROM dislikes where name='$name'";
        mysqli_query($con,$d_dislikes);

    }
 }
 header("Location: all_user.php");
?>