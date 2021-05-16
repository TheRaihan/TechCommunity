<?php
session_start(); // session starts
include("db.php");// database connection
echo $id=$_GET['id'];
if($_SESSION['pass']=="admin123")
{
    $query="DELETE FROM blogs WHERE id='$id'";
    mysqli_query($con,$query);
    $del_comment="DELETE FROM comments WHERE blog_id='$id'";
    mysqli_query($con,$del_comment);
    $del_likes="DELETE FROM likes WHERE blog_id='$id'";
    mysqli_query($con,$del_likes);
    $del_dislikes="DELETE FROM dislikes WHERE blog_id='$id'";
    mysqli_query($con,$del_dislikes);
    header("Location: admin_dashboard.php");
    $del_sort="DELETE FROM sort WHERE id='$id'";
    mysqli_query($con,$del_sort);
}
else{
    echo "<script type='text/javascript'>alert('You are not admin'); window.Location.href='dashboard.php'</script>";
}
?>

