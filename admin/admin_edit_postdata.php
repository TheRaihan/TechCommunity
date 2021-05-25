<?php
session_start();
include("../db.php"); //data connection
if(isset($_POST['editpost']))
{   
$name=$_SESSION["name"];
$pass=$_SESSION["pass"];
    $id=$_POST["id"];
    $type=$_POST["type"];
    $category=$_POST["category"];
    $title=$_POST["title"];
    $description=$_POST["description"];
    $blog_image=$_FILES["blog_image"]["name"];
    $target = "images/".basename($blog_image);
    $query1= "UPDATE blogs SET type='$type',category='$category',title='$title',description='$description', blog_image='$blog_image' WHERE id='$id'";
    $result1=mysqli_query($con, $query1); 
    if (move_uploaded_file($_FILES['blog_image']['tmp_name'], $target)) 
    {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    header("Location:admin_dashboard.php");
}
?>