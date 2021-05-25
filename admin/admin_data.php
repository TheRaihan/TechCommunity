<?php
session_start();
include("../db.php"); //database connection
if(isset($_POST["register"]))
{
   if($_POST['pass']=="admin123")
   {
        $name=$_POST["name"];
        $name_query= "SELECT * FROM admin WHERE name='$name'";
        $n_result=mysqli_query($con, $name_query); 
        $n_num=mysqli_num_rows($n_result);
   
      if($n_num==1)
         {
            echo "<script type='text/javascript'>alert('Username is already taken'); window.location.href='register.php'</script>";
         }
         else
         {
            $pass=$_POST['pass'];
            $name=$name.'_admin';
            $query1= "INSERT INTO admin(name,password) VALUES('$name','$pass')";
            $result1=mysqli_query($con, $query1); 
            echo "<script type='text/javascript'>alert('ADMIN is added'); window.location.href='adminlogin.php'</script>";
         }  

   }
   else
   {
      echo "<script type='text/javascript'>alert('You cannot register without the admin password!!'); window.location.href='adminlogin.php'</script>";

   }
    
        
// }
}
?>

