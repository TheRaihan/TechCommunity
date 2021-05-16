<?php
session_start();
include("db.php"); //data connection
if(isset($_POST['post']))
{   $pass=$_POST['pass'];
    if(isset($pass))
    {
        if($pass="admin123")
        {
            $name=$_SESSION["name"];
            $type=$_POST["type"];
            $category=$_POST["category"];
            $title=$_POST["title"];
            $description=$_POST["description"];
            $blog_image=$_FILES["blog_image"]["name"];
            $target = "images/".basename($blog_image);
            $query1= "INSERT INTO blogs(name,type,category,title,description) VALUES('$name','$type','$category','$title','$description')";
            $query2= "UPDATE blogs SET blog_image='$blog_image' where name='$name' AND type='$type' AND category='$category' AND title='$title'";
            $result1=mysqli_query($con, $query1); 
            $result2=mysqli_query($con, $query2);
            if (move_uploaded_file($_FILES['blog_image']['tmp_name'], $target)) 
            {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
                }
                $c_likes=0;
                $c_dislike=0;
                $c_comments=0;
                $co_query="INSERT INTO sort(id,likes,dislikes,comments) VALUES('$blog_id','$c_likes','$c_dislikes','$c_comments')";
                mysqli_query($con,$co_query);
                header("Location:admin_dashboard.php");
        }
        else
        {
            echo "<script type='text/javascript'>alert('Your password is wrong!!'); window.location.href='admin_post.php'</script>";
        }
    }
    else
    {

        $name=$_SESSION["name"];
        $type=$_POST["type"];
        $category=$_POST["category"];
        $title=$_POST["title"];
        $description=$_POST["description"];
        $blog_image=$_FILES["blog_image"]["name"];
        $target = "images/".basename($blog_image);
        $query1= "INSERT INTO blogs(name,type,category,title,description) VALUES('$name','$type','$category','$title','$description')";
        $query2= "UPDATE blogs SET blog_image='$blog_image' where name='$name' AND type='$type' AND category='$category' AND title='$title'";
        $result1=mysqli_query($con, $query1); 
        $result2=mysqli_query($con, $query2);
        if (move_uploaded_file($_FILES['blog_image']['tmp_name'], $target)) 
        {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }

        $c_likes=0;
        $c_dislike=0;
        $c_comments=0;
        $co_query="INSERT INTO sort(id,likes,dislikes,comments) VALUES('$blog_id','$c_likes','$c_dislikes','$c_comments')";
        mysqli_query($con,$co_query);
        header("Location:dashboard.php");
    }
    
}

?>