<?php
session_start();
    
    if(isset($_SESSION['name']))
    {
    session_unset();
    session_destroy();
    header('location:../userlogin.php');
    }
    else
    {
    echo "<script type='text/javascript'>alert('You are not logged in!'); window.location.href='../userlogin.php'</script>";
    }
?>