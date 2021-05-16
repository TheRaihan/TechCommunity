<?php
session_start();
include("db.php"); //data connection
if(!isset($_SESSION['name']))
{
    echo "<script type='text/javascript'>alert('You are not Logged in!!'); window.location.href='userlogin.php'</script>";
}
else
{
    if(isset($_POST["dislike"]))
    {
        $name=$_SESSION['name'];
        $blog_id=$_POST['id'];
        $query1="SELECT * FROM dislikes WHERE blog_id='$blog_id' AND name='$name'";
        $result1=mysqli_query($con,$query1);
        $count_dislikes=mysqli_num_rows($result1);

        
         
        if($count_dislikes>=1)
        {
            // $c_query="INSERT into  sort(id,likes) VALUES('$blog_id','$count_likes')";
            // mysqli_query($con,$c_query);
            if($_SESSION['pass']!="admin123")
            {

                header("Location:full_post.php?id=". $blog_id);
            }
            else{
                header("Location:admin_fullpost.php?id=". $blog_id);
            }
        }
        else
        {
            $query="INSERT INTO dislikes(name,blog_id) VALUES('$name','$blog_id')";
            $result=mysqli_query($con,$query);
                

            $s_query="SELECT * FROM sort WHERE id='$blog_id'";
            $s_result=mysqli_query($con,$s_query);
            $s_dislikes=mysqli_num_rows($s_result);
            if($s_dislikes>=1)
            {
                $query2="SELECT * FROM dislikes WHERE blog_id='$blog_id'";
                $result2=mysqli_query($con,$query2);
                $c_dislikes=mysqli_num_rows($result2);
                $c_query="UPDATE sort SET  dislikes='$c_dislikes' WHERE id='$blog_id'";
                mysqli_query($con,$c_query);
            }
            else
            {
                $query2="SELECT * FROM dislikes WHERE blog_id='$blog_id'";
                $result2=mysqli_query($con,$query2);
                $c_dislikes=mysqli_num_rows($result2);
                $co_query="INSERT INTO sort(id,dislikes) VALUES('$blog_id','$c_dislikes')";
                mysqli_query($con,$co_query);
            }
          //  header("Location:full_post.php?id=". $blog_id);
          if($_SESSION['pass']!="admin123")
            {

                header("Location:full_post.php?id=". $blog_id);
            }
            else{
                header("Location:admin_fullpost.php?id=". $blog_id);
            }
        }  
   
    } 
}
?>