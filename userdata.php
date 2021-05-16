<?php
session_start();
include("db.php"); //database connection
if(isset($_POST["register"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $e_pass= md5($pass);
    $c_pass=$_POST["c_pass"];
    $e_c_pass= md5($c_pass);

    
        $name_query= "SELECT * FROM user WHERE name='$name'";
        $email_query= "SELECT * FROM user WHERE email='$email'";
        $n_result=mysqli_query($con, $name_query); 
        $e_result=mysqli_query($con, $email_query);
        $n_num=mysqli_num_rows($n_result);
        $e_num=mysqli_num_rows($e_result);
   if($e_pass==$e_c_pass)
   {
      if($n_num==1)
         {
            echo "<script type='text/javascript'>alert('Username is already taken'); window.location.href='register.php'</script>";
         }
      else if($e_num==1)
        {
            echo "<script type='text/javascript'>alert('Email is already taken'); window.location.href='register.php'</script>";
        }
         else
         {
            $image="default.png";
            $query1= "INSERT INTO user(name,email,password,image) VALUES('$name','$email','$e_pass','$image')";
            $result1=mysqli_query($con, $query1); 
            echo "<script type='text/javascript'>alert('User is added'); window.location.href='userlogin.php'</script>";
         }
   }     
   else
   {
      echo "<script type='text/javascript'>alert('Confirm password properly.'); window.location.href='register.php'</script>";
   }
        
// }
}
?>

