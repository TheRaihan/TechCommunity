<?php
session_start();
include("db.php"); //data connection
include("user_navbar.php");
if(!isset($_SESSION['name']))
{
    echo "<script type='text/javascript'>alert('You are not Logged in!!'); window.location.href='userlogin.php'</script>";
}
else{
     if(isset($_POST["add"]))
     {
        $name=$_SESSION['name'];
        $blog_id=$_POST['id'];
        $comment=$_POST['comment'];
        $query="INSERT INTO comments(name,blog_id,comment) VALUES('$name','$blog_id','$comment')";
        $result=mysqli_query($con,$query);


        $s_query="SELECT * FROM sort WHERE id='$blog_id'";
            $s_result=mysqli_query($con,$s_query);
            $s_comments=mysqli_num_rows($s_result);
            if($s_comments>=1)
            {
                $query2="SELECT * FROM comments WHERE blog_id='$blog_id'";
                $result2=mysqli_query($con,$query2);
                $c_comments=mysqli_num_rows($result2);
                $c_query="UPDATE sort SET  comments='$c_comments' WHERE id='$blog_id'";
                mysqli_query($con,$c_query);
            }
            else
            {
                $query2="SELECT * FROM comments WHERE blog_id='$blog_id'";
                $result2=mysqli_query($con,$query2);
                $c_comments=mysqli_num_rows($result2);
                $co_query="INSERT INTO sort(id,comments) VALUES('$blog_id','$c_comments')";
                mysqli_query($con,$co_query);
            }

            if($_SESSION['pass']!="admin123")
            {

                header("Location:full_post.php?id=". $blog_id);
            }
            else{
                header("Location:admin_fullpost.php?id=". $blog_id);
            }
       // header("Location:full_post.php?id=". $blog_id);
      }
    } 
?>