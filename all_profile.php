<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav.css">
    <title>All Profile</title>
    <style>
        .image{
            border-radius: 8px;
            box-shadow: 3px 3px 6px lightgrey;
        }
    </style>
</head>
    <body>
   
        <div class="container" align="center">
            <h1>
            <br>
            <br>
            Hi <?php echo $_SESSION['name'];?>
            </h1>
            <?php echo $_SESSION['email'];?>
            <?php 
            
                $query="SELECT image FROM user WHERE email='{$_SESSION['email']}'";
                $result=mysqli_query($con,$query);
                while ($row = mysqli_fetch_array($result))
                {
                $image=$row["image"];
                }
            ?>
            <br>
            <br>
            <img class="image" src="images/<?php echo $image ?>"width="200px" height="200px">


        </div>
   </body>
</html>