<?php
session_start(); // session starts
include("db.php");// database connection
echo $id =$_GET['id'];
echo $c_id=$_GET['c_id'];
$query="DELETE FROM comments WHERE id='$c_id'";
    mysqli_query($con,$query);
    header("Location:admin_fullpost.php?id=". $id);

?>